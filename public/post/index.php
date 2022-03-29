<?php
	session_start();
	if(!isset($_SESSION["uid"]))
	{
	    header("Location:../login/");
	}
	
	if(!isset($_SESSION["sid"]))
	{
	    require_once("../../base62.php");
		$_SESSION["sid"] = get62Base(time());
	}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Save the Image</title>
        <link rel="icon" type="image/x-icon" href="../img/thumbnail.jpg" />
        <style>
            .container{width:60%;margin:9% auto 0;padding:2% 5%;border-radius:10px}ul{padding-left:20px}ul li{line-height:2.3}a{color:#20a53a}
        </style>
        <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
        <script src="https://ucarecdn.com/libs/widget-tab-effects/1.x/uploadcare.tab-effects.lang.en.min.js"></script>
        <script>
            UPLOADCARE_LOCALE = "zh"
            UPLOADCARE_LOCALE_TRANSLATIONS = {
                buttons: {
                    choose: {
                        files: {
                            one: 'Choose a photo'
                        }
                    }
                }
            }
            document.addEventListener("DOMContentLoaded", () => {
                uploadcare.Widget('[name="file"]', {
                    "publicKey": "c2abc615c3bbde64ba44",
                    "tabs": "file url",
                    "effects": "crop",
                    "UPLOADCARE_STORE": 1
                })
            });
        </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.7/dist/sweetalert2.all.min.js"></script>
    </head>
    <body>
		<?
			if(isset($_GET["forbid"]) && $_GET["forbid"] == 1)
			{
				$reason = array( "别吃放太久的食物！", "珍珠披萨？你认真的？", "你的披萨怎么不加起司？", "？？？你在做什么" );
				echo "
				<script>
					Swal.fire({icon:'error',title:'请求被拒绝',text:'" . $reason[$_GET["res"]] . "',footer:'tips. 刷新解决99%的问题'}).then((result)=>{window.location.replace('https://www.socialcredit.icu/post')})
				</script>
				";
			}
		?>
        <div class="container">
            <form action="../launch/" method="post">
				<input type="hidden" name="sid" value="<?echo $_SESSION["sid"]?>">
                <div class="input-group-prepend">
                    <h2>STEP#1 图片描述</h2>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Say sth.</span>
                    </div>
                    <input 
                        type="text"
                        name="comment"
                        class="form-control" 
                        aria-label="Default" 
                        aria-describedby="inputGroup-sizing-default"
                    />
                </div>
                <div class="input-group-prepend">
                    <h2>STEP#2 你的名字</h2>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nickname</span>
                    </div>
                    <input 
                        type="text"
                        name="name"
                        class="form-control" 
                        aria-label="Default" 
                        aria-describedby="inputGroup-sizing-default"
                        value="nobody"
                    />
                </div>
                <div class="input-group-prepend">
                    <h2>STEP#3 上传图片</h2>
                </div>
                <div class="input-group mb-3">
                    <input
                        type="hidden"
                        name="file"
                    />
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="nsfw">
                    <label class="form-check-label" for="nsfw">NSFW</label>
                </div>
                <div class="input-group-prepend">
                    <h2>STEP#4 发布</h2>
                </div>
                <div class="input-group mb-3">
                    <input 
                        type="submit"
                        class="uploadcare--widget__button uploadcare--widget__button_type_open"
                        value="Submit"
                        id="submit"
                    />
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="agreement" id="agreement">
                    <label class="form-check-label" for="agreement">我明白帖子不能被删除。</label>
                </div>
                <div class="form-check mb-3">
                    <a href="mailto:info@socialcredit.icu" style="text-decoration:none;">有任何问题，请致信</a>
                </div>
            </form>
            <script>
                window.onload=function(){var submitBtn=document.getElementById("submit");submitBtn.onclick=function(){if(!document.getElementById("agreement").checked){alert("请阅读并同意条款！");return false}}}
            </script>
        </div>
        <footer style="position:absolute;bottom:0;width:100%;height:25px;">
            <div style="text-align:center">
                Made with my <a href="https://www.socialcredit.icu/show/?p=vZ" style="text-decoration:none;">🐱</a> and <span style="color:salmon">♥</span> + some <a href="#" style="text-decoration:none;color:black;" onclick="Swal.fire('Buy me a cup of Coffee?','ETH:0xf841Bb4F8C4B85aD9B3A0C029581C12D23A2aB64','question')"><b>Coffee</b></a>
            </div>
        </footer>
    </body>
</html>