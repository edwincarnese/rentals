<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'owner_id',
        'client_id',
        'property_id',
   
       
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
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


    
}
