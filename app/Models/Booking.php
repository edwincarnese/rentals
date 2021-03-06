<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class);

    }

    public function cient()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function booking()
    {
        return $this->belongsTo(booking::class, 'client_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
