<?php
include '../partials/dangerchar.php';
include '../partials/dbconnect.php';

if (!isset($_SESSION['username'])) {
  header("location:../login/");
  exit();
}

include 'lightpull.php';

?>

<!DOCTYPE html>
<html>
    <head>

      <title>FISHMO | Dashboard</title>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
      <!--Import custom CSS-->
      <link type="text/css" rel="stylesheet" href="../css/stylesheet.css"  media="screen,projection"/>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.js"></script>
      <script type="text/javascript" src="../js/fishscripts.js"></script>
    </head>

    <body class="blue accent-1">

      <?php include "../subviews/menu.php"; ?>
     
      <main class="content">

        <!-- TANK CONTROL CARD -->
        <section class="container tank-main">
          <div class="tank-settings card-panel grey lighten-4 z-depth-2 ">

            <div class="row">

              <!-- SETTINGS -->
              <section class="col s6">

                  <div class="card-panel tank-settings-info">
                    <label class="tank-info-display-title grey-text text-darken-4">Current Readings</label><hr>
                    <div class="row display">
                      <label class="col s6 tank-info-display grey-text text-darken-4">Temperature: <a id="degree" class="blue-text text-accent-2">21 C</a></label>
                      <label class="col s6 tank-info-display grey-text text-darken-4">Lights: <a id="lighttxt" class="blue-text text-accent-2"><?php echo $lights; ?></a></label>
                      <label class="col s6 tank-info-display grey-text text-darken-4">Water Flow Level: <a id="waterflowtext" class="blue-text text-accent-2">OFF</a></label>
                      <label id="lctxt" class="col s6 tank-info-display grey-text text-darken-4">Light Colour: <a class="<?php echo $lightRef; ?>-text text-accent-2"><?php echo $lightColour; ?></a></label>
                    </div>
                  </div>
    
                  <div class="card-panel tank-settings-info">
                    <label class="tank-info-display-title grey-text text-darken-4">Controls</label><hr>
                    <div class="row display">
                      <label class="col s6 tank-info-display grey-text text-darken-4"> Temperature </label>
                      <label class="col s6 tank-info-display grey-text text-darken-4"> Lights </label>
                      
                      <form action="#">

                        <?php include "../subviews/tempslider.php" ?>
                      </form>
                        <div class="switch col s6">
                          <label>
                            Off
                            <?php if ($lights == "ON") { ?>
                              <input id="lightctrl" type="checkbox" checked="checked">
                            <?php } else { ?>
                              <input id="lightctrl" type="checkbox">
                            <?php } ?>
                            <span class="lever"></span>
                            On
                          </label>
                        </div>
                      
                    </div>

                    <div class="row display">
                      <label class="col s6 tank-info-display grey-text text-darken-4"> Water Flow Level </label>
                      <label class="col s6 tank-info-display grey-text text-darken-4"> Light Colour </label>
                      <form action="#">
                       
                        <div class="switch col s6">
                          <label>
                            Off
                            <input id="waterflowctrl" type="checkbox">
                            <span class="lever"></span>
                            On
                          </label>
                        </div>

                        <select class="browser-default col s3 offset-s1-5">
                          <?php 
                            if ($lightColour == "Red") { 
                              echo "<option value='1' id='red' selected>RED</option>".
                              "<option value='2' id='green'>GREEN</option> ".
                              "<option value='3' id='blue'>BLUE</option>" .
                              "<option value='4' id='white'>WHITE</option>" .
                              "<option value='5' id='yellow'>YELLOW</option>" .
                              "<option value='6' id='purple'>PURPLE</option>";
                            } else if ($lightColour == "Green") { 
                              echo "<option value='1' id='red'>RED</option>".
                              "<option value='2' id='green' selected>GREEN</option> ".
                              "<option value='3' id='blue'>BLUE</option>" .
                              "<option value='4' id='white'>WHITE</option>" .
                              "<option value='5' id='yellow'>YELLOW</option>" .
                              "<option value='6' id='purple'>PURPLE</option>" ;
                            }
                            else if ($lightColour == "Blue") { 
                              echo "<option value='1' id='red'>RED</option>".
                              "<option value='2' id='green'>GREEN</option> ".
                              "<option value='3' id='blue' selected>BLUE</option>" .
                              "<option value='4' id='white'>WHITE</option>" .
                              "<option value='5' id='yellow'>YELLOW</option>" .
                              "<option value='6' id='purple'>PURPLE</option>" ;
                            }
                            else if ($lightColour == "White") { 
                              echo "<option value='1' id='red'>RED</option>".
                              "<option value='2' id='green'>GREEN</option> ".
                              "<option value='3' id='blue'>BLUE</option>" .
                              "<option value='4' id='white' selected>WHITE</option>" .
                              "<option value='5' id='yellow'>YELLOW</option>" .
                              "<option value='6' id='purple'>PURPLE</option>" ;
                            }
                            else if ($lightColour == "Yellow") { 
                              echo "<option value='1' id='red'>RED</option>".
                              "<option value='2' id='green'>GREEN</option> ".
                              "<option value='3' id='blue'>BLUE</option>" .
                              "<option value='4' id='white'>WHITE</option>" .
                              "<option value='5' id='yellow' selected>YELLOW</option>" .
                              "<option value='6' id='purple'>PURPLE</option>" ;
                            }
                            else if ($lightColour == "Purple") { 
                              echo "<option value='1' id='red'>RED</option>".
                              "<option value='2' id='green'>GREEN</option> ".
                              "<option value='3' id='blue'>BLUE</option>" .
                              "<option value='4' id='white'>WHITE</option>" .
                              "<option value='5' id='yellow'>YELLOW</option>" .
                              "<option value='6' id='purple' selected>PURPLE</option>" ;
                            }
                          

                          ?>
                        </select>
                      </form>
                    </div>
                        
                  </div>

              </section>

              <!-- VIDEO FEED -->
              <section class="col s6">
                <div id="tank-video-placeholder" class="tank-video-placeholder card-panel"> 
                  <h3>Video Feed</h3>
                  <!-- INSERT PLACEHOLDER IMAGE -->
                  <!-- <a id="video-btn-play" class="video-btn-center btn-floating btn-large waves-effect waves-light red"><i class="mdi-av-play-arrow"></i></a> -->
                </div>


                <div style="display: table; display: table-cell; vertical-align: middle;" id="tank-video-feed" class="video-container card-panel tank-video-feed">
                </div>
                <a id="video-btn-play" class="video-btn-center btn-floating btn-large waves-effect waves-light red"><i id="video-btn-icon" class="mdi-av-play-arrow"></i></a>
              </section>

            </div>

          </div>
        </section>

        <!-- Virtual Tank-->
        <?php include "../subviews/virtualtank.php"; ?>
      

      </main>

      <?php include "../partials/footer.php"; ?>


      
    </body>
</html>