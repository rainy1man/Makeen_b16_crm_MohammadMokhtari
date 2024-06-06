<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class File extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'file_name',
        'size',
        'ext',
        'path'
    ];

    public function profiles(): MorphToMany
    {
        return $this->morphedByMany(Profile::class, 'fileable');
    }
    public function products(): MorphToMany
    {
        return $this->morphedByMany(Product::class, 'fileable');
    }
    public function messages(): MorphToMany
    {
        return $this->morphedByMany(Message::class, 'fileable');
    }

}
