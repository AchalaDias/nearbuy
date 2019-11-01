<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get the user that owns the phone.
     */
    public function admin()
    {
        return $this->belongsTo('App\Admin', 'foreign_key');
    }
}
