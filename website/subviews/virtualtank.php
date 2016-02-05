<?php
  
  // Assigning proper tank ID
  $tankID = $_SESSION['tankID'];

  $sql2 = "SELECT DISTINCT Type FROM Fish, InTank WHERE InTank.TankID='$tankID' and Fish.ID=InTank.FishID";
  $result2 = $conn->query($sql2);
  $type = $result2->fetch_assoc();
  $tanktype = $type['Type'];
  $row2 = $result2->num_rows;


?>

<section class="container vTank">
  <div class="card-panel grey lighten-4 z-depth-1">

    <?php

      if ($row2 > 1) {                          // Multiple Types of fish in the tank
        echo "<section class='card-panel red accent-2'>";
      }
      else {
        echo "<section class='card-panel'>";
      }

    ?>
      <h4>Current Fish in your Tank</h4>
    </section>

    <section>
      <div class="row current-tank">
        <?php include "vtank.php" ?>
      </div>
    </section>

  </div>
</section>

