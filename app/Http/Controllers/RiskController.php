<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiskController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getRisk(Request $request)
    {

   		$json = $request;
   		$score = 0;
   		$res = '< 1%';
   		
		$gender = (int)$json['gender'];
		$age = (int)($json['age']);
   		$sgpt = (int)($json['sgpt']);
   		$hbeag = (int)$json['hbeag'];
		
   		if ($gender == 1) {
   			$score += 2;
   		}
   		
		if ($age >= 60) {
			$score += 6;
		} else if ($age >= 55) {
			$score += 5;
		} else if ($age >= 50) {
			$score += 4;
		} else if ($age >= 45) {
			$score += 3;
		} else if ($age >= 40) {
			$score += 2;
		} else if ($age >= 35) {
			$score += 1;
		} else {
			
		}
		
		if ($sgpt >= 45) {
			$score += 3;
		} else if ($sgpt >= 15) {
			$score += 1;
		} else {
			
		}
		
		if ($hbeag == 1) {
			$score += 4;
		}
		
		
		if ($score <= 4) {
		
		} else if ($score <= 9) {
			$res = '1% ~ 10%';
		} else if ($score <= 12) {
			$res = '10% ~ 25%';
		} else if ($score <= 14) {
			$res = '30% ~ 50%';
		} else {
			$res = '65%';
		}
   		
   		return json_encode(Array('res' => $res));
    }
}
