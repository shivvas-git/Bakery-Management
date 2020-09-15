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
  <title>AdminLogin</title>
</head>
<style>
        header{
        background:url(https://www.setaswall.com/wp-content/uploads/2018/04/Abstract-Light-Wallpaper-1080x2280-380x802.jpg);
        background-size: cover;
        background-postion: center;
        min-height: 700px;
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
    </style>
    <body>
            <header>
            <nav class="nav-wrapper transparent">
            <div class="container">
                <h5 class="brand-logo">Login GateWay</h5>            
                </div>
            </nav>
            <h1></h1>
            <section class="container">
            <div class="container">
                <div class="row">
                    <div class="col s12 l6 push-l3">
                    <form action="Adlogincheck.php" method="POST">
                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                <input type="text" name="username" id="Username">
                                <label for="Username" class="black-text">UserAdmin</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password" name="password" id="password">
                                <label for="password" class="black-text">Password</label>
                            </div>
                            <div class="input-field center white-text">
                                <button class="btn" type="submit">submit</button>
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
                $('.tooltipped').tooltip();
            });
        </script>
    </body>
    </html>