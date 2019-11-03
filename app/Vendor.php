<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'vendor_profile';
    protected $fillable = [
        'name', 'web_url', 'image', 'contact_no', 'auth_id'
    ];
}
