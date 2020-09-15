<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>register Form</title>
</head>
<style>
        header{
        background:url(https://www.setaswall.com/wp-content/uploads/2018/04/Abstract-Light-Wallpaper-1080x2280-380x802.jpg);
        background-size: cover;
        background-postion: center;
        min-height: 625px;
        max-width: 1500px;
        
        }
        @media screen and (max-width: 805px){
            header{
                min-height: 500px;
            }
        }
        section{
        padding-top: 10vw;
        padding-bottom: 10vw;
    }
    .signin {
  background-color: transparent;
  text-align: center;
  padding-bottom: 2vw;
  padding-top: 2vw;
}

    </style>
    <body>
            <header>
            <nav class="nav-wrapper transparent">
            <div class="container">
                <h5 class="brand-logo">Password change</h5>            
                </div>
            </nav>
            <h1></h1>
            <section class="container">
            <div class="container">
                <div class="row">
                    <div class="col s12 l6 push-l3">
                    <form action="passwordaction.php" method="POST">
                            
                    <div class="input-field">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" name="oldpassword" id="oldpassword" required >
                                <label for="oldpassword" class="black-text">old Password</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" name="password_1" id="password" required >
                                <label for="password" class="black-text">New Password</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix ">vpn_key</i>
                                <input type="password" name="password_2" id="cnfrmpswd" required>
                                <label for="cnfrmpswd" class="black-text">Confirm Password</label>
                            </div>
                            
                        <div class="container">
                            <h1></h1>
                        </div>
                        
                            <div class="input-field right white-text">
                                <button class="btn" type="submit" onclick="validatePassword()">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </section>
                </div>
        
        </header>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
                $('.materialboxed').materialbox();
                $('.tabs').tabs();
                $('.datepicker').datepicker();
                $('.dropdown-trigger').dropdown();
                $('.modal').modal();
            });

function validatePassword(){
var password = document.getElementById("password_1")
,confirm_password = document.getElementById("password_2");
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("password doesn't match");
  } else {
    confirm_password.setCustomValidity("");
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
        
    </body>
    </html>