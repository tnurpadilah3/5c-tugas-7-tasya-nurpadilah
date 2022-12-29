<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pelayans(){
        return $this->belongsToMany('App\Models\Pelayan') -> withTimestamps();
}
}
