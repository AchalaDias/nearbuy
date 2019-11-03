<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image', 'status', 'category_id', 'promo_start', 'promo_until', 'user_id'
    ];
}
