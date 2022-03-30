<?
    session_start();
    if(isset($_GET["token"]))
    {
        if($_GET["token"] == "[token]")
        {
            $return = array("status" => "success");
            echo json_encode($return);
            $_SESSION["uid"] = $_GET["token"];
            die();
        }
        else 
        {
            $return = array("status" => "fail");
            echo json_encode($return);
            header("HTTP/1.1 403 Forbidden");
            die();
        }
    }
?>

<!doctype html>
<html>
    <head>
        <title>登录</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.7/dist/sweetalert2.all.min.js"></script>
        <link rel="icon" type="image/x-icon" href="../img/thumbnail.jpg" />
    </head>
    <body>
        <script>
          Swal.fire({
          title: 'token: ',
          input: 'text',
          inputAttributes: {
            autocapitalize: 'off'
          },
          showCancelButton: true,
          confirmButtonText: 'Login',
          showLoaderOnConfirm: true,
          preConfirm: (login) => {
            return fetch(`https://www.socialcredit.icu/login/?token=${login}`)
              .then(response => {
                if (!response.ok) {
                  throw new Error(response.statusText)
                }
                return response.json()
              })
              .catch(error => {
                Swal.showValidationMessage(
                  `Request failed: ${error}`
                )
              })
          },
          allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.replace("https://www.socialcredit.icu/post/");
          }
        })
        </script>
    </body>
</html>
