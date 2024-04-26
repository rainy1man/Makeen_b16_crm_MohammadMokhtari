<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Label extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'label_name'
    ];

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'labelable');
    }

    public function teams(): MorphToMany
    {
        return $this->morphedByMany(Team::class, 'labelable');
    }

    public function products(): MorphToMany
    {
        return $this->morphedByMany(Product::class, 'labelable');
    }
}
