<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;
use App\User;
use App\Doctor;
use App\Service;
use App\Hospital;

class RelationsController extends Controller
{
    public function hasOneRelation(){
      $user = \App\User::with(['phone' => function($q){
          $q->select('code','number','user_id');
      }])->find(1);

      //$user = \App\User::find(1);
      //$phone = $user->phone;
      //return response()->json($phone);
      
      return response()->json($user);
    }

    public function hasOneRelationReverse(){

        $phone = Phone::with('user')->find(1);
        $phone->makeVisible(['user_id']);
        $phone->user;
        
        $phone->user->name;
        
        return $phone;
    }

    public function getuserhasphone(){
      return User::whereHas('phone',function($q){
          $q->where('code',96);
      })->get();

    }

    public function getuserhasnotphone(){

        return User::whereDoesntHave('phone')->get();
    }
############################ Sart one to many ###############################################
    public function getHospitalDoctors(){
      $hospitals = Hospital::with('doctor')->find(1);


      //return $hospitals;
      $doctors = $hospitals->doctor;
      foreach($doctors as $doctor){
          echo $doctor->name . '<br>';
      }
      //return $hospitals -> doctor; // hospital`s doctors
    }

    public function hospitals(){
        $hospitals = Hospital::select('id','name','address')->get();

        return view('doctors.hospitals',compact('hospitals'));
    }

    public function doctors($hospital_id){

       $hospital = Hospital::find($hospital_id);
       $hospitalName = $hospital->name;
        $doctors = $hospital->doctor;
        

       return view('doctors.doctors',compact('doctors','hospitalName'));
    }

    public function deleteDoctor($doctor_id){
        $doctor = Doctor::find($doctor_id);
        $doctor->delete();
        return back();
    }

    public function deleteHospital($hospital_id){

        $hospital = Hospital::find($hospital_id);
        if(!$hospital){
            return abort('404');
        }

        $hospital->doctor()->delete();
        $hospital->delete();
        return back();
    }

    //get all hospital which must has doctors
    public function hospitalHasDoctor(){
        $hospital = Hospital::whereHas('doctor')->get();
        return $hospital;
    }

    public function hospitalHasMaleDoctors(){
        $hospital = Hospital::with('doctor')->whereHas('doctor',function($q){
            $q->where('gender',1);
        })->get();

        return $hospital;
    }

    public function hospitalNotHasDoctors(){

        $hospitals = Hospital::whereDoesntHave('doctor')->get();
        return $hospitals;
    }

############################ End one to many ###############################################

############################ Start many to many ###############################################

public function getDoctorsServices(){
    return $doctor = Doctor::with('services')->find(6);
    //return $doctor->services;
}

public function getServicesDoctors(){
    return $services = Service::with(['doctors' => function($q){
        $q->select('doctors.id','name','title');
    }])->find(1);
   

}

############################ Start many to many ###############################################

}
