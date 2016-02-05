<?php 

  $tankId = $_SESSION['tankID'];

  $sql = "SELECT * FROM Fish INNER JOIN InTank ON Fish.ID=InTank.FishID and InTank.TankID='$tankId'";
  $result = $conn->query($sql);

  $row_num = $result->num_rows;

  if ($row_num == 0) { 
    echo "<p><h5>There are no fish in your tank.</h5></p>";
  } else {

    while ($row = $result->fetch_assoc()) {

?>
      <div class="col s2 vtank">
        <div class="card-panel fish-card">
          <a class="fish-tank-remove btn-floating waves-effect waves-light red rmFromTank" id=<?php echo $row['ID']; ?>><i class="mdi-content-clear"></i></a>
          <!-- <i class="fish-tank-remove small mdi-navigation-close red-text rmFromTank" id=<?php echo $row['ID']; ?>></i> -->
          <img width="80%" src=<?php echo $row['Picture']; ?>></img><hr>
          
          <table class="striped centered">
            <thead>
              <tr><th><?php echo $row['Name']; ?></th></tr>
            </thead>
            <tbody>
              <tr><td>Optimal Temp: <br><?php echo $row['TempLow']; ?> - <?php echo $row['TempHigh']; ?>&deg;C</td></tr>
              <tr><td>Compatible with:<br>
              <?php $compatible = explode(',', $row['Compatible']); ?>
              <ul>
                <?php 
                  $count = 0; 
                  while ($count < count($compatible)): ?>
                    <li><?php echo $compatible[$count]; ?></li>
                    <?php $count = $count + 1; 
                  endwhile; ?>
              </ul>
              </td></tr> 
            </tbody>
          </table>
        </div>
      </div>
<?php } } ?>