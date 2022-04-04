<?php
    session_start();
	require_once("../../config.php");
    $_connection = mysqli_connect("127.0.0.1", $_db_user, $_db_pswd, $_db_name);
    $_query = "SELECT `nsfw`, `img`, `comment`, `name` from `data` WHERE `id` = '" . $_GET["p"] . "'";
    $result =  mysqli_query($_connection, $_query);
    $dat = mysqli_fetch_row($result);
?>

<!doctype html>
<html>
    <head>
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script>
          window.OneSignal = window.OneSignal || [];
          OneSignal.push(function() {
            OneSignal.init({
              appId: "99611d01-c7e7-4820-9bcf-4cd57dd3642f",
            });
          });
        </script>
        <meta name="description" itemprop="description" content="<?echo $dat[2];?>">
        <meta itemprop="name" content="u/<?echo $dat[3];?> pin了:">
        <meta itemprop="image" content="https://ucarecdn.com/5b6edc46-e040-4d68-a7ea-889287b68ce1/thumbnail.jpg">
        <link rel="icon" type="image/x-icon" href="../img/icon.ico" />
        <title>Keymittee! - <?echo $dat[3];?>: <?echo $dat[2];?></title>
        <meta charset="utf-8">
        <style>
            .container{width:60%;margin:auto;top:90px;padding:2%;display:flex;border-radius:10px}.navi{width:100%;margin:auto;top:0;height:45px;background-color:#ccc}ul{padding-left:20px}ul li{line-height:2.3}a{color:#20a53a}footer{position:absolute;bottom:0;width:100%;height:25px;background-color:#ccc}
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-7G775360SZ"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-7G775360SZ');
        </script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.7/dist/sweetalert2.all.min.js"></script>
    </head>
    <body>
		<?
			if($dat[0] == 1)
			{
				if(!isset($_SESSION["nsfw"]) && (!isset($_SESSION["firstLaunch"]) || $_SESSION["firstLaunch"] == 0))
				{
					echo "
					<script>
						Swal.fire({
						  title: 'NSFW Content',
						  text: '点击确定，你将可以在活跃时间内访问敏感内容',
						  icon: 'warning',
						  showCancelButton: true,
						  cancelButtonText: '取消',
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: '确定'
						}).then((result) => {
						  if (result.isConfirmed) {
							window.location.replace('https://www.socialcredit.icu/acceptNSFW/?original=' + document.URL);
						  }
						  else
						  {
							window.location.replace('https://youtu.be/XqZsoesa55w?t=9');
						  }
						})
					</script>
					";
					$dat[1] = "";
				}
			}
			if(isset($_SESSION["firstLaunch"]) && $_SESSION["firstLaunch"] == 1)
			{
				$_SESSION["firstLaunch"] = 0;
				echo "
				<script>
					Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: '已发布！',
					showConfirmButton: false,
					timer: 1500
				})</script>";
			}
		?>
		<div class="navi">
		</div>
        <div class="container" >
            <div>
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-0"><?echo $dat[3];?>:</h5>
                        <?echo $dat[2];?>
                    </div>
                    <br>
                    <div>
                        <img style="text-align:center;max-width:100%;max-height:70%;margin:auto;position:absolute;top:20px;bottom:0;left:0;right:0;padding: 2% 10% 2% 10%;display: inline-block;vertical-align:middle;" class="mr-3" src="<?echo $dat[1];?>">
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div>
                <p style="text-align:center;color:white;">Posted by: <?echo $dat[3];?> 内容不代表本站立场</p>
            </div>
        </footer>
    </body>
</html>