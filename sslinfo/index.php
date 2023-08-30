<?php
if(isset($_GET["url"])){
$url = $_GET["url"];
$output = shell_exec("openssl s_client -connect $url:443");
}
function str_contains($haystack, $needle){
	return strpos($haystack, $needle);
}
ini_set("display_errors", "1");
$provider = "";
$algo = "";
$issue = "";
$expire = "";
$type = "";
$ssl_details = "";
$force = "";
$no_cert = false;

if(isset($_GET["url"])){
    // checking if certificate available
    if(str_contains($output, "no peer certificate available")){
        // No certificate found
        $no_cert = true;
    }else{
	    $output = explode("Certificate chain", $output);
	    print_r($output);
        $output = explode("\n", $output[1]);

        $details = $output[2];

        // extracting provider and type
        $details = explode(",", $details);
        $provider = explode(" = ", $details[1])[1];
        $type = explode(" = ", $details[2])[1];

        // extracting algorithm
        $algo = explode("sigalg: ", $output[3])[1];

        // extracting issue date and expiration date
        $issue = explode(";", explode("NotBefore: ", $output[4])[1])[0];

        $expire = explode("NotAfter: ", $output[4])[1];

        // extracting session details
        $ssl_details = $output[array_search("Verification: OK", $output) + 2];

        $url = str_replace("https", "http", $url);
        // Getting force ssl
        $headers = shell_exec("curl -I $url");
        $headers = explode("\n", $headers);

        $force_flag = false;
        foreach ($headers as $header) {
            $parts = explode(":", $header);
            if(str_contains($parts[0], "Location")){
                if(str_contains($parts[1], "https"))
                    $force_flag = true;
            }
        }

        if($force_flag)
            $force = "Using Force SSL";
        else
            $force = "NOT using Force SSL";
    }
}

?>



<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="origin-trial"
        content="Az520Inasey3TAyqLyojQa8MnmCALSEU29yQFW8dePZ7xQTvSt73pHazLFTK5f7SyLUJSo2uKLesEtEa9aUYcgMAAACPeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZS5jb206NDQzIiwiZmVhdHVyZSI6IkRpc2FibGVUaGlyZFBhcnR5U3RvcmFnZVBhcnRpdGlvbmluZyIsImV4cGlyeSI6MTcyNTQwNzk5OSwiaXNTdWJkb21haW4iOnRydWUsImlzVGhpcmRQYXJ0eSI6dHJ1ZX0=">

    <style>
        body {
            background: #181818;
            color: #ddd;
	}

	img{
height: 230px;
width: 230px;
mix-blend-mode: exclusion;
}	

        .container {
            width: 70%;
            margin-left: 15%;
            display: flex;
            flex-direction: column;
            font-family: "Montserrat";
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        form .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        form .form-group label {
            margin-left: 5px;
            opacity: 0.5;
        }

        form .form-group input,
        form .form-group select {
            font: inherit;
            padding: 10px;
            border-radius: 10px;
            outline: none;
            border: 1px solid #333;
            color: #ccc;
            background: #282828 !important;
            transition: 0.2s ease;
        }

        form .form-group input:focus,
        form .form-group select:focus {
            border: 1px solid #555;
        }

        form .form-group:has(input:focus) label,
        form .form-group:has(select:focus) label {
            opacity: 1;
        }

        form input:focus,
        form input:focus-visible,
        form input:focus-within {
            background: #282828;
        }

        button[type="submit"] {
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

        button[type="submit"]:hover {
            cursor: pointer;
            background: #007affaa;
        }

        .console {
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

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 20px;
            border-radius: 20px;
            overflow: hidden;
        }

        tr {
            background: #222;
        }

        td {
            padding: 20px;
        }

        tr td:nth-child(1) {
            width: 300px;
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-dark text-light">

    <div class="container">
	<img src="ssl_logo/SSL.png">
        <form>

            <div class="form-group">
                <label>Server Hostname</label>
                <input type="text" class="form-control bg-dark text-light" name="url" aria-describedby="emailHelp"
                    placeholder="google.com" required value=<?php if(isset($_GET["url"])) echo $_GET["url"]; ?>>
            </div>

            <button type="submit" class="btn btn-primary">Test</button>

            <div>
                <table>
                    <tr>
                        <td>Certificate Provider</td>
                        <td><?php echo $provider; ?></td>
                    </tr>
                    <tr>
                        <td>Certificate Type</td>
                        <td><?php echo $type; ?></td>
                    </tr>
                    <tr>
                        <td>Algorithm</td>
                        <td><?php echo $algo; ?></td>
                    </tr>
                    <tr>
                        <td>Issue Date</td>
                        <td><?php echo $issue; ?></td>
                    </tr>
                    <tr>
                        <td>Expiration Date</td>
                        <td><?php echo $expire; ?></td>
                    </tr>
                    <tr>
                        <td>SSL Details</td>
                        <td><?php echo $ssl_details; ?></td>
                    </tr>
                    <tr>
                        <td>Force SSL</td>
                        <td><?php echo $force; ?></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

</html>
