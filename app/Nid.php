<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nid extends Model
{
    protected $table="nids";
    protected $fillable=[
        'name','name_eng','fathers_name',
        'mothers_name','img','district',
        'division','upuzilla','dob','sex'
    ];
    protected $hidden=[
        'num'
    ];

}
