<?php
namespace App\Http\API;

use GuzzleHttp\Client;

class OneSignalApiService
{

	public static function sendAllNotification($data)
	{
		$response = self::httpRequestAPI('POST', 'https://onesignal.com/api/v1/notifications', $data);
		return $response;
	}

	public static function registerOneSignal($data)
	{
		$response = self::httpRequestAPI('POST', 'https://onesignal.com/api/v1/players', $data);
		return $response;
	}

	public static function listUsers()
	{
		$response = self::httpRequestAPI('GET', 'https://onesignal.com/api/v1/players?app_id='.env('APP_ID'));
		return $response->getBody()->getContents();
	}

	public static function httpRequestAPI($method, $uri, $data = [])
	{
		$headers = [
			'Authorization' => 'Basic '.env('REST_API_KEY'),
			'Content-Type' => 'application/json'
		];
		$data = array_add($data, 'app_id', env('APP_ID'));
		$client = new Client();
		$response = $client->request($method, $uri, ['headers' => $headers, 'json' => $data]);
		return $response;
	}
}