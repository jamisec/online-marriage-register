<?php

use Illuminate\Http\Request;
use App\Nid;
use App\Marriage;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/dist',function(Request $request){
    $div=Division::where('bn_name','=',$request->division)->first()->id;
    $dist=District::where('division_id',$div)->get();
    return $dist;
});

Route::get('/upuzila',function(Request $r){
    $dist=District::where('bn_name','=',$r->district)->first()->id;
    $upu=Upazila::where('district_id','=',$dist)->get();
    return $upu;
});


Route::get('/get-nid',function(Request $r){#
    $nid=Nid::where('num',$r->nid)->first();
    $marriage=Marriage::where('bride_id',$nid->num)->orWhere('groom_id',$nid->num)->first();
    $temp=['nid'=>$nid,'marriage'=>$marriage];
    return $temp;
});