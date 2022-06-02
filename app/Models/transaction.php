<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
    
    public function lister()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class);

    }
   
    public function booking()
    {
        return $this->belongsTo(booking::class, 'client_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo(transaction::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    
}
