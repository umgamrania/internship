<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {

      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #121212;
      color: #fff;
      font-family: Arial, sans-serif;
    }
    
    .login-container {
      background-color: #1e1e1e;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
      width: 300px;
      height: 300px;
    }
    
    .login-container h2 {
      margin-bottom: 20px;
    }
    
    .input-group {
      margin-bottom: 15px;
    }
    
    .input-group label {
      display: block;
      margin-bottom: 5px;
    }
    .invalid-text{
      display: block;
    }
    
    /*.input-group input {
      width: 100%;
      padding: 8px;
      border: none;
      background-color: #333;
      color: #fff;
      border-radius: 5px;
    }*/

    .input-group .jp{
        width: 60%;
        margin-left: 20%;
    }
    
    .login-btn {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    
    .login-btn:hover {
      background-color: #0056b3;
    }
  </style>

</head>
<body>
  <div class="login-container">
    <h3>QR Code</h3>
    <form method="POST">
      


<?php
    echo '<form method="POST">';

    session_start();
    include('phpqrcode/qrlib.php');
    $url=$_POST['url'];
    $tempDir = 'qrcodes/';
     echo "<h3>$url</h3>";
    
    $codeContents = $url;
    
    $fileName = '005_file_'.md5($codeContents).'.png';
    
    $pngAbsoluteFilePath = $tempDir.$fileName;
    $urlRelativeFilePath = $tempDir.$fileName;
    
    // generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath);
         
    } else {
    }
    
    echo '<hr />';
    echo '<div class="input-group">';
    echo '<img class="jp " src="'.$urlRelativeFilePath.'" />';
    echo ' </div>';
    echo '
        </form>
        </div>
        </body>
        </html>';


?>