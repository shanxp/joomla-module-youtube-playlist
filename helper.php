<?php

class modYoutubePlaylist {
	
	public static function getPlaylist($params) {
		if(!function_exists('curl_init')) {
			die('cURL not available!');
		}
		$list = [];
		$url = $params->get('yt_api_url');
		$apiKey = $params->get('yt_api_key');
		$playListId = $params->get('yt_playlist_id');
		$part = $params->get('yt_playlist_response_part');
		
		$fields = array(
			'playlistId' => $playListId,
			'key' => $apiKey,
			'part' => $part,
			'maxResults' => 50,
		);
		
		$curl = curl_init();
		 
		$fieldsString = '?playlistId='.$playListId.'&key='.$apiKey.'&part='.$part.'&maxResults=50' ; //http_build_query($fields);
		$url = $url.$fieldsString;
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		//curl_setopt($curl, CURLOPT_HEADER, true);
		curl_setopt($curl, CURLOPT_VERBOSE, true);
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
		$data = curl_exec($curl);
		$responseInfo = curl_getinfo($curl);
		//echo '<pre>'; print_r($data);
		//echo '<pre>'; print_r($responseInfo);
		//if(curl_errno($ch)){
			//echo 'Curl error: ' . curl_error($ch);
		//}

		
		curl_close($curl);
		
		return $data;
    }
}

?>