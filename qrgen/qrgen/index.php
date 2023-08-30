            <!DOCTYPE html>
            <html>

            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>QR Code</title>
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
                  padding: 20px;
                  border-radius: 10px;
                  box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
                  width: 300px;
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
                
                .input-group input {
                  width: 100%;
                  padding: 8px;
                  border: none;
                  background-color: #333;
                  color: #fff;
                  border-radius: 5px;
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
            </head>
            <body>
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
              <div class="login-container">
                <h2>QR Code Generator</h2>
                <form action="image"method="POST">
                  <div class="input-group">
                    <label for="username">Enter String / URL</label>
                    <input type="text" name="url" required>
                  </div>
                  <input type="submit" class="login-btn" value="Generate">
                </form>
              </div>
            </body>
            </html>