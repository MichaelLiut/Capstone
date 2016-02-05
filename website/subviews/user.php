<div class="row acct-title">
    <h5 class="col s10 acct-name blue-text text-accent-2 left">Admin</h5>
    <form action="../index.php" method="post">
      <input type="hidden" name="logout" value="1">
      <button class="btn waves-effect waves-light col s2 acct-logout right" type="submit">Logout</button>
    </form>
</div><hr>

<ul class="collapsible" data-collapsible="accordion">
  <li>
    <div class="collapsible-header"><i class="mdi-action-lock"></i>Password</div>
      <form class="collapsible-body container">
          <div class="input-field">
            <input id="curr-password" type="text" class="validate">
            <label for="curr-password">Current Password</label>
          </div>
          <div class="input-field">
            <input id="new-password" type="text" class="validate">
            <label for="new-password">New Password</label>
          </div>
          <div class="input-field">
            <input id="conf-password" type="text" class="validate">
            <label for="conf-password">Confirm Password</label>
          </div>
          <button id="save" class="btn col s4 offset-s4 waves-effect waves-light blue accent-2 center" name="action">Save</button>
      </form>
  </li>
  <li>
    <div class="collapsible-header"><i class="mdi-action-info"></i>Fish Tank Information</div>
    <div class="collapsible-body"><p>Name: Tanksy</p></div>
    <div class="collapsible-body"><p>Model: Aquarium - 10 Gallon</p></div>
    <div class="collapsible-body"><p>12"L x 12"W x 54"H</p></div>
  </li>
</ul>