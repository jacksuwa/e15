<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function items()
    {
        ## Customer can have multiple orders
        #  Showing a one-to-many relationship
        return $this->hasMany('App\Models\Item');
    }
}