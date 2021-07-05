<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request_all_use extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'request_all_uses';

    protected  $guarded=[];


    public  function citie (){
        return $this->belongsTo('App\Models\Citie', 'citie_id');
    }

    public  function area (){
        return $this->belongsTo('App\Models\Area', 'area_id');
    }

    public  function service (){
        return $this->belongsTo('App\Models\Service', 'service_id');
    }
    public function artist (){

        return $this->belongsTo('App\Models\Artist','artist_id');
    }
    public function user (){

        return $this->belongsTo('App\Models\User','user_id');
    }


}
