<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }
}
