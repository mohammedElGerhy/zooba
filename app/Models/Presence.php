<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    protected $table = 'presences';
    protected $guarded = [];


    public function artist (){

        return $this->belongsTo('App\Models\Artist','artist_id');
    }
}
