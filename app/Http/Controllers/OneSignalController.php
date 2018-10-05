<?php

namespace App\Http\Controllers;

use App\Http\API\OneSignalApiService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class OneSignalController extends Controller
{
	public function send()
	{
		return view('send');
	}

	public function sendAllNotification()
	{
		/*$data = [
			"included_segments" => ["All"],
			"data" =>  ["foo" => "Boa noite"],
			"contents" => ["en" => "Teste JSON"],
			"android_sound" => 'notification'
		];*/

		$data = [
			"template_id" => '2798332b-d7aa-492b-93aa-5b925e57d87f',
			"included_segments" => ["All"],
			"data" =>  ["foo" => "Boa noite"]
		];

		$response = OneSignalApiService::sendAllNotification($data);

		return redirect()->back()->withSuccess('Notificações enviadas');
	}

	public function register()
	{
		$userAgent = $_SERVER["HTTP_USER_AGENT"];
		
		$data = [
			'device_type' => 6,
			'notification_types' => 1
		];

		$response = OneSignalApiService::registerOneSignal($data);
		dd($response);
	}


	public function list()
	{
		$response = OneSignalApiService::listUsers();
		dd($response);
	}
}
