<!--**************************
        NAVBAR
************************* -->
<header class="head">
  <div class="card-panel z-depth-1">
    <div class="row title-header blue-text text-accent-2">
      <div class="col s3">
        <button id="toggle-fishDB" class="btn waves-effect waves-light left">Fish Database</button>
      </div>  
      <div class="col s2 offset-s2">
        <img src="../images/logo.gif" width="100%"></img>
      </div>
      <div class="col s2 offset-s3">
        <button id="toggle-account" class="btn waves-effect waves-light right">Account</button>
      </div>
    </div>
  </div>
</header>

<!--**************************
  SIDE MENUS
************************* -->
<!-- FISH DATABASE LIST -->
<section class="fishDB card-panel grey lighten-3 z-depth-2"> 
  <?php include "fishDB.php"; ?>
</section>
 
<!-- ACCOUNT -->
<section id="close-acct" class="acctlist card-panel grey lighten-3 z-depth-2">
  <?php include "user.php"; ?>
</section>

<div class="gap"></div>
