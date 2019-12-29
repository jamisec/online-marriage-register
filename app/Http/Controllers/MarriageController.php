<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarriageController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function register(){
        return view('admin.pages.bride_groom');
    }

    public function PostRegister(Request $request){
        if (isset($request)) {
            $this->validate($request, [
              'groom_name'=>'required',
              'groom_dob'=>'required|date_format:Y-m-d',
              'groom_nid'=>'required',
              'groom_father_name'=>'required',
              'prev_wife'=>'required',
              'prev_wife_nid'=>'required',
              'bride_name'=>'required',
              'bride_dob'=>'required|date_format:Y-m-d',
              'bride_nid'=>'required',
              'bride_father_name'=>'required',
              'prev_hus'=>'required',
              'prev_hus_nid'=>'required'
            ]);
            $data=$request->all();
            $put_session_data=$request->session()->push('step',$data);
            $get_session_data=$request->session()->get('step');
            return redirect('/govt/kazi/marriage/witness');
          }
          else{
              return redirect('/govt/kazi/marriage');
          }
    }

    public function witness(){
        return view('admin.pages.witness');
    }

    public function PostWitness(Request $request){
        if (isset($request)) {
            $this->validate($request, [
              'witness1_name'=>'required',
              'witness1_dob'=>'required|date_format:Y-m-d',
              'witness1_nid'=>'required',
              'witness1_father_name'=>'required',
              'witness1_mother_name'=>'required',

              'witness2_name'=>'required',
              'witness2_dob'=>'required|date_format:Y-m-d',
              'witness2_nid'=>'required',
              'witness2_father_name'=>'required',
              'witness2_mother_name'=>'required',
            ]);
            $data=$request->all();
            $put_session_data=$request->session()->push('step',$data);
            $get_session_data=$request->session()->get('step');
            return redirect('/govt/kazi/marriage/religion');
          }
          else{
              return redirect('/govt/kazi/marriage/witness');
          }
          
    }
    public function religion(){
        return view('admin.pages.religion');
    }

    public function PostReligion(Request $request){
        if (isset($request)) {
            if($request->religion==1){
                $this->validate($request,[
                    'religion'=>'required',
                    'ability_of_divorce'=>'required',
                    'divorce_condition'=>'required',
                    'dowry'=>'required',
                    'divorce_'=>'required'
                ]);
            $data=$request->all();
            $put_session_data=$request->session()->push('step',$data);
            $get_session_data=$request->session()->get('step');
            return redirect('/govt/kazi/marriage/payment');
            }
            else{
                $this->validate($request,['religion'=>'required']);

            $data=$request->all();
            $put_session_data=$request->session()->push('step',$data);
            $get_session_data=$request->session()->get('step');
            return redirect('/govt/kazi/marriage/payment');
            }
          }
          else{
              return redirect('/govt/kazi/marriage/religion');
          }
    }

    public function payment(){ 
        return view('admin.pages.payment');
    }

    public function PostPayment(){
        
    }
   
}
