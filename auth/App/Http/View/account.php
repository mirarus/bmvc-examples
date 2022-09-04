<br>
Profile Edit
<br>
<br>
<form role="form" id="account_form" action="" onsubmit="return false;" novalidate>
  <div>
    <label for="for-name">Name</label>
    <input id="for-name" type="text" name="name" value="<?php echo auth_get('name'); ?>" required>
  </div>
  <div>
    <label for="for-email">Email</label>
    <input id="for-email" type="email" name="email" value="<?php echo auth_get('email'); ?>" required>
  </div>
  <div>
    <label for="for-password">Password</label>
    <input id="for-password" type="password" name="password">
  </div>
  <br>
  <button>Save Changes</button>
</form>