<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\BMI;

class BMIController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function postBMI(Request $request)
    {

   		$json = $request;
		$height = (int)($json['height']);
		$weight = (int)($json['weight']);
   		
		if ($height < 144) {
			$height = 144;
		} else if ($height > 190) {
			$height = 190;
		} else {
			
		}
		
   		$bmiCol = BMI::where('height', $height)->first();
   		
   		$res = '肥胖';
   		if ($weight < $bmiCol->underweight) {
   			$res = '過輕';
   		} else if ($weight < $bmiCol->normal) {
   			$res = '正常';
   		} else if ($weight < $bmiCol->overweight) {
   			$res = '過胖';
   		} else {
   			
   		}
   		
   		return json_encode(Array('res' => $res));
    }
}
