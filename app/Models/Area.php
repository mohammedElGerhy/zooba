<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $fillable = ['name', 'citie_id'];

    public function citie_id (){

        return $this->belongsTo('App\Models\Citie', 'citie_id');
    }
}
