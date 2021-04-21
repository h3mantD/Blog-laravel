<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auther extends Model
{
    use HasFactory;

    public function profile() {
        return $this->hasOne(Profile::class);
    }
}
