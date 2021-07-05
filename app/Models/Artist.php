<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Artist extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'artists';
   // protected $fillable = ['name','email','password'];
    protected $guarded =[];

    public  function citie (){
        return $this->belongsTo('App\Models\Citie', 'citie_id');
    }

    public  function area (){
        return $this->belongsTo('App\Models\Area', 'area_id');
    }

    public  function rating (){
        return $this->belongsTo('App\Models\Rating', 'rating_id');
    }

    public  function service (){
        return $this->belongsTo('App\Models\Service', 'service_id');
    }
}
