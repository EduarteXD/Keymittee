<?PHP
	function sendMessage($msg, $url, $img) {
		$content      = array(
			"en" => $msg
		);
		$headings     = array(
		    "en" => "Keymittee! - 新k文"
		);
		$fields = array(
			'app_id' => "[*SENSITIVE*]",
			'included_segments' => array(
				'Subscribed Users'
			),
			'data' => array(
				"foo" => "bar"
			),
			'contents' => $content,
			'headings' => $headings,
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
			'Authorization: Basic [*SENSITIVE*]'
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