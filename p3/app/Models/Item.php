<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;


    public function customer()
    {
        # Item can belong to customer
        #  Showing an inverse one-to-many relationship
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * custom method to find pivot information
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User')
            ->withTimestamps() # Must be added to have Eloquent update the created_at/updated_at columns 
            ->withPivot('comments'); # other field that is added
    }
}