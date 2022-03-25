<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'address',
        'status',
        'period',
        'type',
        'area',
        'area',
        'bedroom',
        'bathroom',
        'kitchen',
        'images',
        'videos',
        'amenities',
        'latitude',
        'longitude',
        'availability_at',
    ];

    public function getPropertyStatusAttribute()
    {
        if($this->status == 1) {
            return 'For Rent';
        }
        else {
            return 'For Sale';
        }
    }

    public function getMainPhotoAttribute()
    {
        $images = json_decode($this->images, true);

        if($images) {
            return $images[0];
        } 
        
        return null;
    }
}
