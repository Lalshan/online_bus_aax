<?php

namespace App;
class SendCode
{
	public static function sendCode($phone){
		$code = rand(1111,9999);
		$nexmo = app('Nexmo\Client');
		$nexmo->message()->send([
		    'to'   => '+880'.(int) $phone,
		    'from' => '16105552344',
		    'text' => 'Verfy code: '.$code,
			]);
		return $code;
	}
}


?>