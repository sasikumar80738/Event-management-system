<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    // App\Models\Event.php
public function users()
{
    return $this->belongsToMany(User::class, 'event_accepts', 'event_id', 'user_id');
}




}
