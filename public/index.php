<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="Social Credit,键委之家">
        <title>键委之家</title>
        <link rel="icon" type="image/x-icon" href="/img/thumbnail.jpg" />
        <style>
            .container{width:60%;margin:auto;top:0;bottom:0;left:0;right:0;margin-top:9%;padding:2% 5%;border-radius:10px}ul{padding-left:20px}ul li{line-height:2.3}a{color:#20a53a}.link{color:#555;font-family:"Microsoft YaHei",Courgette,cursive;font-size:30px;line-height:25px;display:inline-block;position:relative;z-index:1;transition:all .5s}.font-other{font-family:"Microsoft YaHei","Microsoft JhengHei","Segoe UI","Lucida Grande",Helvetica,Arial,sans-serif}.link:hover{color:transparent}.link:after,.link:before{content:attr(data-hover);white-space:nowrap;position:absolute;left:0;top:0;height:100%;width:100%;transition:all .5s}.link:after{color:#1da493;opacity:0;left:-10px}.link:hover:before{left:15px;opacity:0}.link:hover:after{left:0;opacity:1;transition-delay:.1s}@media only screen and (max-width:990px){.link span{font-size:20px}}@media only screen and (max-width:767px){.link{margin:0 0 30px}}
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.7/dist/sweetalert2.all.min.js"></script>
		<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script>
          window.OneSignal = window.OneSignal || [];
          OneSignal.push(function() {
            OneSignal.init({
              appId: "99611d01-c7e7-4820-9bcf-4cd57dd3642f",
            });
          });
        </script>
        <script>
            console.log(' __   __     ______     ______   __  __     __     __   __     ______    \n/\\ "-.\\ \\   /\\  __ \\   /\\__  _\\ /\\ \\_\\ \\   /\\ \\   /\\ "-.\\ \\   /\\  ___\\   \n\\ \\ \\-.  \\  \\ \\ \\/\\ \\  \\/_/\\ \\/ \\ \\  __ \\  \\ \\ \\  \\ \\ \\-.  \\  \\ \\ \\__ \\  \n \\ \\_\\\\"\\_\\  \\ \\_____\\    \\ \\_\\  \\ \\_\\ \\_\\  \\ \\_\\  \\ \\_\\\\"\\_\\  \\ \\_____\\ \n  \\/_/ \\/_/   \\/_____/     \\/_/   \\/_/\\/_/   \\/_/   \\/_/ \\/_/   \\/_____/ \n                                                                         \n __  __     ______     ______     ______                                 \n/\\ \\_\\ \\   /\\  ___\\   /\\  == \\   /\\  ___\\                                \n\\ \\  __ \\  \\ \\  __\\   \\ \\  __<   \\ \\  __\\                                \n \\ \\_\\ \\_\\  \\ \\_____\\  \\ \\_\\ \\_\\  \\ \\_____\\                              \n  \\/_/\\/_/   \\/_____/   \\/_/ /_/   \\/_____/                              \n\n');function logout(){document.cookie="PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";return"logged out"};
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-7G775360SZ"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-7G775360SZ');
        </script>
    </head>
    <body>
        <div class="container">
            <center>
                <a href="#" class="link" data-hover="键委之家" style="font-size:800%;margin-top:20vh;text-decoration:none;">键委之家</a>
            </center>
        </div>
        <?
            $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
            if(!(strpos($agent, 'iphone') || strpos($agent, 'ipad') || strpos($agent, 'android')))
            {
                echo '<div style="position:absolute;bottom:90px;right:23px">
            点击订阅，获取更新👇
        </div>';
                echo "\n";
            }
        ?>
        <footer style="position:absolute;bottom:0;width:100%;height:25px;">
            <div style="text-align:center">
                Made with my <a href="https://www.socialcredit.icu/show/?p=vZ" style="text-decoration:none;">🐱</a> and <span style="color:salmon">♥</span> + some <a href="#" style="text-decoration:none;color:black;" onclick="Swal.fire('Buy me a cup of Coffee?','ETH:0xf841Bb4F8C4B85aD9B3A0C029581C12D23A2aB64','question')"><b>Coffee</b></a>
            </div>
        </footer>
    </body>
</html>