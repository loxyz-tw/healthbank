<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Clinic;

class ClinicController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getClinic(Request $request)
    {

   		$json = $request;
		$city = $json['city'];
		$dist = $json['dist'];
		$dept = $json['dept'];
		$clinicName = ($json['clinicName']);
   		
		if (empty($clinicName)) {
			$clinics = Clinic::where([['city', 'like', $city.$dist.'%'], ['clinicName', 'like', '%'.$dept.'%']])->take(5)->get();
		} else {
			$clinics = Clinic::where('clinicName', 'like', '%'.$clinicName.'%')->take(5)->get();
		}
   		
   		$subArray = [];
   		foreach ($clinics as $clinic) {
   		   array_push($subArray, Array($clinic->clinicName, $clinic->address, $clinic->tel));
   		}
   		
   		return $subArray;
    }
}
