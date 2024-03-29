<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function auther() {
        return $this->belongsTo(Auther::class, 'auther_id', 'id');
    }
}
