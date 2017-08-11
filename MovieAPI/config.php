<?php

define('APIKEY', 'd6ed539a741ec0415b9f5118b1645d93');

session_start();

$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.themoviedb.org/3/configuration?api_key=".APIKEY,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "{}",
		));

		$responseConfig = json_decode(curl_exec($curl), true);
		$error = curl_error($curl);

		curl_close($curl);

		if ($error) {
		  echo "cURL Error #:" . $error;
		}

define('BASEURL', $responseConfig['images']['base_url']);

