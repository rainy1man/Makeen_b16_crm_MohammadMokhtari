<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     title="User",
 *     required={"first_name", "last_name", "phone_number", "email", "password"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="User ID"
 *     ),
 *     @OA\Property(
 *         property="first_name",
 *         type="string",
 *         description="User's first name"
 *     ),
 *     @OA\Property(
 *         property="last_name",
 *         type="string",
 *         description="User's last name"
 *     ),
 *     @OA\Property(
 *         property="phone_number",
 *         type="string",
 *         description="User's phone number"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="User's email address"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         description="User's password"
 *     ),
 *     @OA\Property(
 *         property="team_id",
 *         type="integer",
 *         description="Team ID the user belongs to"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Timestamp when the user was created"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Timestamp when the user was last updated"
 *     )
 * )
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'password',
        'team_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * Get the user's full name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn () => $this->first_name . ' ' . $this->last_name
        );
    }

    /**
     * Get the user's profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get the user's orders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the team the user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->BelongsTo(Team::class);
    }

    /**
     * Get the tasks assigned to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function tasks(): MorphMany
    {
        return $this->MorphMany(Task::class, 'taskable');
    }

    /**
     * Get the user's ticket.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticket(): HasOne
    {
        return $this->HasOne(Ticket::class);
    }

    /**
     * Get the labels assigned to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function labels(): MorphToMany
    {
        return $this->morphToMany(Label::class, 'labelable');
    }

    /**
     * Get the factors related to the user's orders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function userFactors(): HasManyThrough
    {
        return $this->HasManyThrough(Factor::class, Order::class);
    }
}
