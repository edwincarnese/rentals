<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    protected $fillable = [
        'owner_id',
        'client_id',
        'property_id',
        'name',
        'email',
        'message',
       
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
    public function property()
    {
        return $this->belongsTo(Property::class);

    }
    
}
