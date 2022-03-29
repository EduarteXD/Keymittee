<?php
	function get62Base($_n)
	{
		$_arr = "0123456789qwertyuiopasdfghjklzxcvbnmMNBVCXZLKJHGFDSAPOIUYTREWQ";
		$result = "";
		while($_n > 0)
		{
			$result = substr($_arr, $_n % 62, 1) . $result;
			$_n = floor($_n / 62);
		}
		return $result;
	}		
?>