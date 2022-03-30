<?php
	function revoke($reason)
	{
		header("Location:../post/?forbid=1" . $id . "&res=" . $reason);
	}

    	session_start();
	if(!isset($_SESSION["sid"]))
	{
		revoke(0);
	}
	else
	{
		if(isset($_POST["sid"]))
		{
			if($_POST["sid"] != $_SESSION["sid"])
			{
				revoke(1);
			}
		}
		else
		{
			revoke(2);
		}
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require_once("../../notifier.php");
        require_once("../../config.php");
        require_once("../../base62.php");
        $_connection = mysqli_connect("127.0.0.1", $_db_user, $_db_pswd, $_db_name);
        $file = $_POST["file"];
        $nsfw = 0;
        $comment = $_POST["comment"];
        $name = $_POST["name"];
        if (isset($_POST["nsfw"]) && $_POST["nsfw"] == "on")
        {
            $nsfw = 1;
        }
        $_query = "select count(*) from `data`";
        $result =  mysqli_query($_connection, $_query);
        $id = get62base(mysqli_fetch_row($result)[0] + 2022);
        $_query = "insert into `data` (`id`, `nsfw`, `img`, `comment`, `name`) VALUES ('" . $id . "', '" . $nsfw . "', '" . $file . "', '" . $comment . "', '" . $name . "') ";
        mysqli_query($_connection, $_query);
		$_SESSION["firstLaunch"] = 1;
        sendMessage($name . ": " . $comment, "https://www.socialcredit.icu/show/?p=" . $id, $file);
        header("Location:../show/?p=" . $id);
    }
    else
    {
        revoke(3);
    }
?>
