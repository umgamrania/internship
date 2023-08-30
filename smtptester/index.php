<?php
    $response = "Logs will be displayed here";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $from = $_POST["from"];
        $to = $_POST["to"];
        $host = $_POST["host"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email_port = $_POST["email_port"];
        $ssl = $_POST["ssl"];

        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080?from=$from&to=$to&host=$host&username=$username&password=$password&email_port=$email_port&ssl=$ssl"); // Set the URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response instead of outputting it

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);
    }

?>


<head>
	<link rel="shortcut icon" href="smtp-icon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
    function onSubmit(token) {
	      alert('thanks ' + document.getElementById('field').value);
	      }

    function validate(event) {
      event.preventDefault();
      if (!document.getElementById('field').value) {
        alert("You must add text to the required field");
      } else {
        grecaptcha.execute();
      }
    }

    function onload() {
      var element = document.getElementById('find-btn');
      element.onclick = validate;
    }
    form.onSubmit = (e) => {
        e.preventDefault();
    }
  </script>    
    <style>
        body{
            background: #181818;
            color: #ddd;
        }
        .container{
            width: 70%;
            margin-left: 15%;
            display: flex;
            flex-direction: column;
            font-family: "Montserrat";
        }

        form{
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        form .form-group{
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        form .form-group label{
            margin-left: 5px;
            opacity: 0.5;
        }

        form .form-group input, form .form-group select{
            font: inherit;
            padding: 10px;
            border-radius: 10px;
            outline: none;
            border: 1px solid #333;
            color: #ccc;
            background: #282828 !important;
            transition: 0.2s ease;
        }
        
        form .form-group input:focus, form .form-group select:focus{
            border: 1px solid #555;
        }

        form .form-group:has(input:focus) label, form .form-group:has(select:focus) label{
            opacity: 1;
        }

        form input:focus,
        form input:focus-visible,
        form input:focus-within{
            background: #282828;
        }

        button[type="submit"]{
            font: inherit;
            padding: 10px;
            margin-top: 10px;
            border-radius: 10px;
            outline: none;
            border: 1px solid #55a4f999;
            background: #007aff88;
            color: #fff;
            font-size: 20px;
            font-weight: 700;
        }
        button[type="submit"]:hover{
            cursor: pointer;
            background: #007affaa;
        }
        .console{
            margin-top: 20px;
            width: calc(70% - 30px);
            border-radius: 10px;
            margin-left: 15%;
            background: #000;
            padding: 15px;
            font-size: 18px;
            font-family: "JetBrains Mono", "Monospace";
	    border: 1px solid #444;
	    word-break: break-all;
            height: 400px;
	    overflow-y: scroll;
	}

	
    </style>
</head>

<body class="bg-dark text-light">
    <img src="smtp-logo.png" style="height: 70px; margin: 50px 0 30px 15%">
    <div id="recaptcha" class="g-recaptcha"
          data-sitekey="6LfVl-MnAAAAAGhFSEGZiVKQ8tCLDcDFJ-kPIiJr"
          data-callback="onSubmit"
          data-size="invisible">
    </div>
	<div class="container">
        <form method="POST" action="mail.php#console">
            <div class="form-group">
                <label>SMTP Server</label>
                <input type="text" class="form-control bg-dark text-light" name="host" aria-describedby="emailHelp" placeholder="your.site.com" required>
            </div>
            <div class="form-group">
                <label>Port</label>
                <input type="number" class="form-control bg-dark text-light" name="email_port" value="465" required>
            </div>
            <div class="form-group">
                <label>Security</label>
                <select name="ssl" class="form-control bg-dark text-light">
                  <option value="true">On</option>
                  <option value="false">Off</option>
                </select>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control bg-dark text-light" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control bg-dark text-light" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label>From email address</label>
                <input type="email" class="form-control bg-dark text-light" name="from" placeholder="From email" required>
            </div>
            <div class="form-group">
                <label>To email address</label>
                <input type="email" class="form-control bg-dark text-light" name="to" placeholder="To email" required>
            </div>

            <button type="submit" class="btn btn-primary">Send test mail</button>
        </form>
    </div>

    <div class="console" id="console">
        <?php if(isset($response)) echo $response; ?>
    </div>
    <script>

	let console = document.querySelector(".console");
	console.scrollTop = console.scrollHeight;

</script>
</body>
