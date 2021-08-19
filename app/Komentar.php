<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Komentar extends Model
{
    protected $table = "komentar";

    protected $fillable = [
        'user_id', 'komentar', 'id_pengaduan', 'created_at'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
