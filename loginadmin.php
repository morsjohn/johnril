<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

$stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($password === $user['password']) {
        $_SESSION['admin_username'] = $username;
        
        echo '
        <!DOCTYPE html>
        <html>
        <head>
          <title>Access Successful</title>
          <style>
          @font-face {
            font-family: "myfont";
            src: url("modern\ M.ttf");
          }
            body {
              text-align: center;
              background-image: url("19651.jpg");
              font-family: "myfont";    
              background-blend-mode: multiply;
              background-color: rgba(0, 0, 0, 0.834);  
              background-size:cover;
            }
            p {
              
              color: #fff;
              position: absolute;
              top: 52%;
              font-size: 16px;
              left: 47%;
              font-family: "myfont", sans-serif;
              animation: blink .3s infinite;
              filter:drop-shadow( 10px 10px 10px rgba(59, 157, 255, 0.696));
            }
            
@keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
          </style>
          <script>
            setTimeout(function() {
              window.location.href = "adminhome.php";
            }, 2000);
          </script>
        </head>
        <body>
          <script>
            var audio = new Audio("admin.m4a");
            audio.play();
          </script>
          <img src="wave.gif" style="width: 200px; margin-top: 20%;">
          <p>Welcome Back</p>
          <img src="light.png" style="height: 140px;width:250px;position: absolute;top: 44%;left:42%;margin-bottom:30px;animation: blink .01s infinite;">
        </body>
        </html>
        ';
    } else {
        echo '
        <!DOCTYPE html>
        <html>
        <head>
          <title>Access Successful</title>
          <style>
          @font-face {
            font-family: "myfont";
            src: url("modern\ M.ttf");
          }
            body {
              text-align: center;
              background-image: url("19651.jpg");
              font-family: "myfont";    
              background-blend-mode: multiply;
              background-color: rgba(0, 0, 0, 0.834);  
              background-size:cover;
            }
            p {
              
              color: #fff;
              position: absolute;
              top: 52%;
              font-size: 16px;
              left: 47%;
              font-family: "myfont", sans-serif;
              animation: blink .3s infinite;
              filter:drop-shadow( 10px 10px 10px rgba(59, 157, 255, 0.696));
            }
            
@keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
          </style>
          <script>
            setTimeout(function() {
              window.location.href = "admin.php";
            }, 2000);
          </script>
        </head>
        <body>
          <script>
            var audio = new Audio("access denied.m4a");
            audio.play();
          </script>
          <img src="wave.gif" style="width: 200px; margin-top: 20%;">
          <p>Access Denied</p>
          <img src="light.png" style="height: 140px;width:250px;position: absolute;top: 45%;left:42%;margin-bottom:30px;animation: blink .01s infinite;">
        </body>
        </html>
        ';
    }
} else {
    echo '
        <!DOCTYPE html>
        <html>
        <head>
          <title>Access Successful</title>
          <style>
          @font-face {
            font-family: "myfont";
            src: url("modern\ M.ttf");
          }
            body {
              text-align: center;
              background-image: url("19651.jpg");
              font-family: "myfont";    
              background-blend-mode: multiply;
              background-color: rgba(0, 0, 0, 0.834);  
              background-size:cover;
            }
            p {
              
              color: #fff;
              position: absolute;
              top: 52%;
              font-size: 16px;
              left: 47%;
              font-family: "myfont", sans-serif;
              animation: blink .3s infinite;
              filter:drop-shadow( 10px 10px 10px rgba(59, 157, 255, 0.696));
            }
            
@keyframes blink {
0% {
  opacity: 1;
}
50% {
  opacity: 0;
}
100% {
  opacity: 1;
}
}
        </style>
        <script>
          setTimeout(function() {
            window.location.href = "admin.php";
          }, 2000);
        </script>
      </head>
      <body>
        <script>
          var audio = new Audio("access denied.m4a");
          audio.play();
        </script>
        <img src="wave.gif" style="width: 200px; margin-top: 20%;">
        <p>Access Denied</p>
        <img src="light.png" style="height: 140px;width:250px;position: absolute;top: 45%;left:42%;margin-bottom:30px;animation: blink .01s infinite;">
      </body>
      </html>
      ';
}
?>
<?php
} else {
    // If accessed directly without POST, redirect or show error
    header("Location: adminhome.php"); // Or login page
    exit();
}
?>
