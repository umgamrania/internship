<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="style.css">
</head>

<?php
    $nav_file = fopen("nav.code", "r");
    $nav_data = fread($nav_file, filesize("nav.code"));

    echo $nav_data;
?>

<div class="tool-container">
    <a href="dnsinfo" target="_blank">
        <div class="tool">
            <div class="logo">
                <img src="logos/logo-dnsinfo-trans.png">
            </div>
            <div class="title">DNS Info</div>
        </div>
        <div class="tool-border"></div>
    </a>
    <a href="http://apps.hostingspell.net:8000"  target="_blank">
        <div class="tool">
            <div class="logo">
                <img src="img/xt-logo.png" style="width: 80%;">
            </div>
            <div class="title">Expense Tracker</div>
        </div>
        <div class="tool-border"></div>
    </a>
    <a href="smtptester" target="_blank">
        <div class="tool">
            <div class="logo">
                <img src="img/smtp-logo.png" style="width: 80%;">
            </div>
            <div class="title">SMTP Tester</div>
        </div>
        <div class="tool-border"></div>
    </a>
    <a href="http://apps.hostingspell.com/pass" target="_blank">
        <div class="tool">
            <div class="logo">
                <img src="logos/pass.png" style="mix-blend-mode: exclusion">
            </div>
            <div class="title">Password Generator</div>
        </div>
        <div class="tool-border"></div>
    </a>
    <a href="http://apps.hostingspell.com/qrgen" target="_blank">
        <div class="tool">
            <div class="logo">
                <img src="logos/logo-qr-trans.png">
            </div>
            <div class="title">QR Code Generator</div>
        </div>
        <div class="tool-border"></div>
    </a>
    <a href="sslinfo" target="_blank">
        <div class="tool">
            <div class="logo">
                <img src="sslinfo/ssl_logo/SSL.png" style="mix-blend-mode: exclusion">
            </div>
            <div class="title">SSL Info</div>
        </div>
        <div class="tool-border"></div>
    </a>
</div>

<footer>
    <style>
        body{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
        }
        footer{
            background: #222;
            margin-top: 50px;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #ccc;
            padding: 25px;
        }

        @media(max-width: 720px){
            footer{
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
        }

        footer a{
            color: #ccc;
        }
    </style>
    <p>©&nbsp;<a target="_blank" href="https://hostingspell.com">HostingSpell</a></p>
    <p>Developed by HostingSpell Dev Team</p>
</footer>

<script>
    const handleMouse = e => {
        let target = e.target;

        let rect = target.getBoundingClientRect();
        let x = e.clientX - rect.left;
        let y = e.clientY - rect.top;

        target.parentElement.style.setProperty("--mouse-x", x+"px");
        target.parentElement.style.setProperty("--mouse-y", y+"px");
    }

    for(const tool of document.querySelectorAll(".tool")){
        tool.onmousemove = e => handleMouse(e);
    }
</script>