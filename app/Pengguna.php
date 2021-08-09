<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = "penggunas";

    public function telepon()
    {
        return $this->hasOne('App\Telepon');
    }
}
