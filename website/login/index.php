<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FISHMO | Login</title>

    <!-- Import Materialize Stylesheet -->
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>

    <!-- Import custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="../css/stylesheet.css"  media="screen,projection"/>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>
    <script type="text/javascript" src="../js/login.js"></script>
  </head>

  <body class="blue accent-1">

    <main>

      <div class="container">
        <div class="card-panel grey lighten-4 z-depth-2">
          <div class="row">
            <div class="col s8 offset-s2">
              <img src="../images/logo.gif" width="70%"></img></br></br>
              </br>
            </div>
          </div>
         <div class="row">
          <form id="login_form" class="col s4 offset-s4 card-panel z-depth-2">
          
            <div class="row blue-text text-accent-2">
              <div class="input-field col s12">
                <input id="username" class="validate" type="text" name="username">
                <label for="username">Username</label>
              </div>
            </div>
            <div class="row blue-text text-accent-2">
              <div class="input-field col s12">
                <input id="password" class="validate" type="password" name="password">
                <label for="password">Password</label>
              </div>
            </div>

            <div class="row">
              <div class="col s12">
                <div class="col s8 offset-s2">
                  <button id="submit" class="btn waves-effect waves-light blue accent-2" name="action">Submit
                    <i class="mdi-content-send right"></i>
                  </button>
                </div>
              </div>
              <div class="col s8 offset-s2">
                <button class="btn waves-effect waves-light blue accent-2" id="openreg">Register</button>
                <?php include "reg.html"; ?>
              </div>
            </div>

          </form>

          </div><!-- End Row -->
        </div>


      </div>

    </main>

    <?php include "../partials/footer.php"; ?>

</body>
</html>