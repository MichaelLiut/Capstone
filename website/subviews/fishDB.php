<!-- Populate the fish database -->
<?php 

  $sql = "SELECT * FROM Fish";
  $result = $conn->query($sql);

  $sql2 = "SELECT DISTINCT Type FROM Fish, InTank WHERE InTank.TankID=1 and Fish.ID=InTank.FishID";
  $result2 = $conn->query($sql2);
  $type = $result2->fetch_assoc();
  $tanktype = $type['Type'];
  $row2 = $result2->num_rows;

  
  while ($row = $result->fetch_assoc()) {

    if ($row2 == 0) {                                       // No fish in the Tank
      echo "<div class='card-panel fishDB-card'>";
    }
    else if ($row2 == 1) {                                  // One Type of fish in the Tank
      if ($row['Type'] == $tanktype) {
        echo "<div class='card-panel fishDB-card green accent-3'>";
      } else {
        echo "<div class='card-panel fishDB-card red accent-2'>";
      }
    } else {                                                // Multiple Types of fish in the tank
      echo "<div class='card-panel fishDB-card red accent-2'>";
    }
    
?>
    
      <div class="row">
        <!-- IMAGE -->
        <div class="col s3">
          <img class="fishDB-img" src=<?php echo $row['Picture']; ?>></img>
        </div> <!-- END PICTURE DIVISION -->

        <!-- INFO -->
        <div class="col s9">
          <div class="row">
            <div class="col s12 left"> <!-- NAME -->
              <label class="fishDB-card-title grey-text text-darken-4"><?php echo $row['Name']; ?></label>
            </div> <!-- END NAME -->

            <div class="col s12 left"> <!-- TEMPERATURE -->
              <label class="grey-text text-darken-4">
                Optimal Temperature: <?php echo $row['TempLow']; ?> - <?php echo $row['TempHigh']; ?>&deg;C
              </label>
            </div> <!-- END TEMPERATURE -->

            <div class="col s12 left"> <!-- DESCRIPTION -->
              <p><?php echo $row['Description']; ?></p>
            </div> <!-- END DESCRIPTION -->

            <!-- FORM FOR ADDING FISH TO THE VIRTUAL TANK -->
            <form class="col s12" action="#">
              <button class="btn waves-effect waves-light addToTank" id=<?php echo $row['ID']; ?>>Add To Tank</button>
            </form> <!-- END FORM -->

          </div> <!-- END ROW -->
        </div> <!-- END INFO DIVISION -->

      </div> <!-- END ROW -->
    </div> <!-- END CARD -->
<?php } ?> <!-- END WHILE LOOP -->