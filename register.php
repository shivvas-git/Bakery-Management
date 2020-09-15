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
                <h5 class="brand-logo">registration</h5>            
                </div>
            </nav>
            <h1></h1>
            <section class="container">
            <div class="container">
                <div class="row">
                    <div class="col s12 l6 push-l3">
                    <form action="regaction.php" method="POST">
                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="name" id="name" required>
                                <label for="name" class="black-text">Name</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="username" id="username" required>
                                <label for="username" class="black-text">Username</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" name="password_1" id="password" required >
                                <label for="password" class="black-text">Password</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix ">vpn_key</i>
                                <input type="password" name="password_2" id="cnfrmpswd" required>
                                <label for="cnfrmpswd" class="black-text">Confirm Password</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">phone_iphone</i>
                                <input type="text" name="phone" id="number" required>
                                <label for="number" class="black-text">Mobile No.</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input type="email" name="email" id="email" required>
                                <label for="email" class="black-text">Email</label>
                                <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                                
                            </div>
                            <!-- <div class="input-field">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" id="date" name="" class="datepicker">
                                <label for="date" class="black-text">Date of birth</label>
                            </div> -->
                        <div class="container">
                            <h1></h1>
                        </div>
                        <hr>
                        <p>By creating an account you agree to our <a href="#Terms" class="modal-trigger">Terms & Conditions</a>.</p>
                        <div class="modal" id="Terms">
                                <div class="modal-content">
                                    <h4>Terms & Conditions</h4>
                                    <p>Under the Distance Selling Regulations for non-personalised or non-food items you have the right 
                                        to cancel your order for any reason within 7 days of placing your order. However, as our cakes 
                                        and other food products are made to order and personalised to your specifications, orders cannot
                                        be cancelled once the cake has been made. However, should you wish to change or cancel your order 
                                        at any time please contact us in writing immediately and we will do our best to meet your needs.
                                        We reserve the right to charge an administration fee charge of £10 on non-wedding cake orders if
                                        you cancel your order or amend it. There will be no refund for cakes cancelled less than five days
                                        before collection or delivery. For wedding cake orders there will be a 10% charge for orders 
                                        cancelled more than 60 days before the event, 50% charge for orders cancelled 30 to 59 days before 
                                        the event, 75% charge for orders cancelled 14 to 29 days before the event and 100% charge for orders
                                        cancelled 13 days or less before the event.</p>
                                    <div class="modal-footer">
                                        <a href="#" class="modal-close btn orange">Agree & Close</a>
                                    </div>
                                </div>
                            </div>
                            <div class="input-field right white-text">
                                <button class="btn" type="submit" onclick="validatePassword()">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container signin">
                        <p>Already have an account? <a href="login.html">Sign in</a>.</p>
                      </div><
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
var password = document.getElementById("password")
,confirm_password = document.getElementById("cnfrmpswd");
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