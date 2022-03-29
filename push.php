<?PHP
	function sendMessage($msg, $url, $img) {
		$content      = array(
			"en" => $msg
		);
		$fields = array(
			'app_id' => "99611d01-c7e7-4820-9bcf-4cd57dd3642f",
			'included_segments' => array(
				'Subscribed Users'
			),
			'data' => array(
				"foo" => "bar"
			),
			'contents' => $content,
			'url' => $url,
			'chrome_web_image' => $img
		);
		
		$fields = json_encode($fields);
		print("\nJSON sent:\n");
		print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=utf-8',
			'Authorization: Basic NWQxYmRmZTMtYzFjYi00YzRkLWE0NWQtZWE0ODAxZDliNjVi'
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		
		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
?>