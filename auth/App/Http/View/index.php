<?php if (auth_check()) { ?>
  Dashboard
  <br>
  <hr>
  <div>
    <?php echo auth_get('name'); ?> | @<?php echo auth_get('username'); ?> | <?php echo auth_get('email'); ?> | <a
      href="<?php url('logout', 1); ?>">Logout</a><?php echo is_admin() ? ' | <a href="' . url('admin') . '">Admin Dashboard</a>' : null; ?>
    <br>
    <hr>
    <div>
      <h3>Change</h3>
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
    </div>
  </div>
<?php } else { ?>
  Auth
  <br>
  <hr>
  <br>Login<hr>

  <div>
    <form role="form" id="signin_form" action="" onsubmit="return false;" novalidate="novalidate">
      <div>
        <label for="for-un_email">Username or Email</label>
        <input id="for-un_email" type="text" name="un_email" required>
      </div>
      <div>
        <label for="for-password">Password</label>
        <input id="for-password" type="password" name="password" required>
      </div>
      <br>
      <button>Login</button>
    </form>
    <br><br>Signup<hr>
    <form role="form" id="signup_form" action="" onsubmit="return false;" novalidate="novalidate">
      <div>
        <label for="for-name">Name</label>
        <input id="for-name" type="text" name="name" required>
      </div>
      <div>
        <label for="for-username">Username</label>
        <input id="for-username" type="text" name="username" required>
      </div>
      <div>
        <label for="for-email">Email</label>
        <input id="for-email" type="email" name="email" required>
      </div>
      <div>
        <label for="for-password">Password</label>
        <input id="for-password" type="password" name="password" required>
      </div>
      <br>
      <button>Signup</button>
    </form>
  </div>
<?php } ?>