<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PassGen</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    
    .container {
      max-width: 300px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .input-group {
      margin-bottom: 20px;
    }
    
    .input-label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    
    .input-field {
      width: 50%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      font-size: 16px;
    }

    .input{
      width: 25%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      font-size: 16px;
    }
    
    .input-field:focus {
      outline: none;
      border-color: #3498db;
    }
    
    .submit-button {
      background-color: #3498db;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      font-size: 16px;
      cursor: pointer;
    }
    
    .submit-button:hover {
      background-color: #2980b9;
    }
    
    .copy-button {
      background-color: #23272B;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      font-size: 16px;
      cursor: pointer;
    }
    
    .copy-button:hover {
      background-color: #6C757D;
    }
    
    .tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
*{
            margin: 0;
            padding: 0;
            font-family: "Montserrat";
            color: #fff;
        }
        body{
            background: #181818;
        }
        nav{
            background: #222;
            width: calc(100% - 40px);
            padding: 20px;
            display: flex;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 99;
        }
        nav .left .logo{
            display: flex;
            align-items: center;
        }
        nav .left .logo img{
            height: 45px;
        }
    
        nav .left .logo p{
            font-size: 20px;
            display: flex;
            align-items: center;
        }
    
        nav .right a{
            display: flex;
            gap: 10px;
            align-items: center;
        }
    
        nav .right a img{
            filter: invert(0.8);
        }

        .container{
            margin-top: 120px;
        }
  </style>
  <script>
function copyFunction() {
  var copyText = document.getElementById("passwd");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  
  var tooltip = document.getElementById("showTooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}

function tooltipFunction() {
  var tooltip = document.getElementById("showTooltip");
  tooltip.innerHTML = "Copy to clipboard";
}
  </script>
</head>
<body>
  <br><br>
  <nav>
                <div class="left">
                    <div class="logo">
                        <img src="hostingspell-white.png">
                    </div>
                </div>
                <div class="right">
                    <a href="hostingspell.com"><p>HostingSpell Main site</p><img src="link.png"></a>
                </div>
            </nav>
  <center>
    <h2>Password Generator</h2>  
  </center>
  <center>By Mumtahin Qadri: Devs Team <a href="https://hostingspell.com" target=_blank>@HostingSpell</a></center>
  <div class="container">
    <form action='pass' method="post" class="form-inline">
      <div class="input-group">
        
        <input class="input-field" type="text" id="passwd" name="name" placeholder="Password" disabled>
      </div>
       <div class="input-group">
        <label class="input-label" for="name">Enter Length:</label>
        <input class="input" type="number" id="name" value="8" name="length" placeholder="Length" min="4" max="128"><br><br>
        <input type="checkbox" class="form-check-input"  name="0" checked>Lowercase<br>
        <input type="checkbox" class="form-check-input" name="1" checked>Uppercase<br>
        <input type="checkbox" class="form-check-input" name="2" checked>Numbers<br>
        <input type="checkbox" class="form-check-input" name="3">Symbols<br>

      </div>
      <button class="submit-button" type="submit">Generate</button>
      <div class="tooltip">
            <button  class="copy-button" onclick="copyFunction()" onmouseout="tooltipFunction()">
            <span class="tooltiptext" id="showTooltip">Copy to clipboard</span>
            Copy It!
        </button>
        </div>
    </form>
  </div>
</body>
<footer></footer>
</html>

<?php
    
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $length=$_POST['length'];
        
        $len=0;
        $r=0;   
        $pass=[];
        while($len<$length)
        {
                $r=rand(0,3);
                if(isset($_POST['0']))
                {
                    $a=0;
                    if($a==$r)
                    {
                        $pass[]=chr(rand(97,122));
                        $len++;
                    }
                }
                
                if(isset($_POST['1']))
                {
                    $b=1;
                    if($b==$r)
                    {
                        $pass[]=chr(rand(65,90));
                        $len++;
                    }
                }
                
                if(isset($_POST['2']))
                {
                    $c=2;
                    if($c==$r)
                    {   
                        $pass[]=rand(0,9);
                        $len++;
                    }
                }
                
                if(isset($_POST['3']))
                {
                    $d=3;
                    if($d==$r)
                    {
                        $characters ='!@#$%^&**&^%$#@!';
                        $pass[]=$characters[rand(0,strlen($characters)-1)];
                        $len++;
                    }
                }
                
        }
    }
?>

<script>
  passwd.value = "<?php

  for($i=0;$i<count($pass);$i++)
        {
            echo $pass[$i];
        } ?>"
  </script>