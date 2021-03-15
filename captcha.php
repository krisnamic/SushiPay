<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Captcha Generator</title>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Kanit:300,300i,400,400i,600,600i,700,700i|Varela:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <style>
            .box {
            width: 50vh;
            background-color: #f1f2f2;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            border-radius: 5px;
            padding-top: 15px;
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 10px;
            border: 1px solid gray;
            }

            .captcha {
            font-family: "Comic Sans MS", cursive, sans-serif;
            font-style: italic;
            font-weight: bold;
            font-size: 2em;
            padding: 3px;
            border-radius: 5px;
            text-decoration: line-through;
            color: white;
            opacity: 0.3;
            -ms-transform: skewY(-5deg); /* IE 9 */
            transform: skewY(-5deg);
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
            }

            .noise {
            background-image: url(data:image/png;base64,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);
            background-color: #61a5e0;
            }

            .restart a {
            text-decoration: none;
            }

            .errmsg {
            padding-top: 5px;
            /* color: red; */
            /* padding: 5px; */
            transition: 0.5s ease;
            }

            input {
                display: inline-block;
                width: 100%;
            }
        </style>
        <script src="app.js"></script>
    </head>
    <body>
        <div class="">
            <div class="box" id="captcha-box">
                <div class="noise" style="text-align: center; border-radius:5px; margin-bottom: 10px;">
                    <div id="captcha" class="captcha"><script>createCaptcha();</script></div>
                </div>

                <div class="row" style="margin-bottom: 10px;">
                    <div class="input col-8" style="padding-right: 0px; border-radius: 2px;">
                        <input
                        type="text"
                        name="reCaptcha"
                        id="reCaptcha"
                        placeholder="Type The Captcha"
                        style="font-size: 16px; line-height: 30px; text-align: center;"
                        />
                    </div>
                    <div class="restart col-4" style="cursor: pointer; padding-left: 4px; text-align:end;">
                        <a onclick="createCaptcha()"><img src="assets/img/reload.png" height="36px" style=" border: 1px solid grey; border-radius: 2px;"/></a>
                    </div>
                </div>

                <div>
                    <input type="button" value="Submit Captcha" onclick="validateCaptcha()" style="background-color: #0069D9; color: white; font-family: Kanit; border-radius: 5px; border: 1px solid white; font-size: 1.2em; border: 1px solid grey;" onmouseover="this.style.color='white';this.style.backgroundColor='cornflowerblue'" onmouseout="this.style.color='white';this.style.backgroundColor='#0069D9'"/>
                <div>
                <div id="errCaptcha" class="errmsg" style="text-align: center;"></div>
            </div>
        </div>
    </body>
</html>
