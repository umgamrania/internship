<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNS Info</title>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="shortcut icon" href="logo.png" type="image/png">
</head>
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
<body>

	<?php
		$nav_file = fopen("../nav.code", "r");
		echo fread($nav_file, filesize("../nav.code"));
	?>
    <center>

        <div class="head">
            <img src="logo.png" alt="">
        </div>

    </center>
    <div class="container" style="width: 40vw">

        <form class="form-inline" id="form">
            <label class="sr-only" for="inlineFormInputName2">Domain Name</label>
            <input type="text" class="form-control mb-2 mr-sm-2 bg-dark text-light" id="url_input" placeholder="Domain Name" required>

            <label class="sr-only" for="inlineFormInputGroupUsername2">DNS</label>
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                </div>

                <select class="form-control bg-dark text-light" name="dns" id="dns_input">
                    <option value="8.8.8.8">Google DNS</option>
                    <option value="1.1.1.1">Cloudflare DNS</option>
                    <option value="208.67.222.222">OpenDNS</option>
                </select>
            </div>

            <center>
                <button type="button" id="find-btn" class="btn btn-primary mb-2" onclick="get_data()">Find Records</button>
            </center>
        </form>
    </div>
    <div id="recaptcha" class="g-recaptcha"
          data-sitekey="6LfVl-MnAAAAAGhFSEGZiVKQ8tCLDcDFJ-kPIiJr"
          data-callback="onSubmit"
          data-size="invisible">
    </div>
    <div class="results">
        <div class="A">
            <h3>A Records</h3>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Results</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="AAAA">
            <h3>AAAA Records</h3>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Results</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <div class="MX">
            <h3>MX Records</h3>
            <table class="table table-striped  table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Results</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="NS">
            <h3>NS Records</h3>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Results</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="CNAME">
            <h3>CNAME Records</h3>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Results</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="TXT">
            <h3>TXT Records</h3>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Results</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
