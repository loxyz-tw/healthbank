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
		
		$bmi = $weight / ($height / 100) / ($height / 100);
		$bmi1ps = number_format($bmi, 1);
   		$bmiCol = BMI::where('height', $height)->first();
   		
   		$res = 'BMI有'.$bmi1ps.'，太~太~太肥了吧!昨天的地震是你造成的嗎?'.'\\n我告訴你齁，要吃營養點的食物啦，太輕了風一吹，咻~的你就不見了';
   		if ($weight < $bmiCol->underweight) {
   			$res = '哎唷~這樣不行捏!BMI只有'.$bmi1ps.'，太輕了啦!'.'\\n我告訴你齁，要吃營養點的食物啦，太輕了風一吹，咻~的你就不見了';
   		} else if ($weight < $bmiCol->normal) {
   			$res = '你全身發出耀眼的光芒，BMI是'.$bmi1ps.'，太完美了'.'\\n繼續維持這令人羨慕的身材吧!';
   		} else if ($weight < $bmiCol->overweight) {
   		    $res = '你是不是也自己覺得有點胖了!BMI有'.$bmi1ps.'\\n乖一點別再黑白亂吃了好嗎(啾咪~)';
   		} else {
   			
   		}
   		
   		return json_encode(Array('res' => $res));
    }
}
