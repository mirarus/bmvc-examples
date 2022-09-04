<br>
<?php echo sprintf("User #%s Edit", (getViewData('data')['id'] . ':' . getViewData('data')['username'])); ?> | <a
  href="<?php url('admin/users', 1); ?>">Users</a>
<br>
<br>
<form role="form" id="user_edit_form" action="" onsubmit="return false;" novalidate="novalidate">
  <div>
    <label for="for-name">Name</label>
    <input id="for-name" type="text" value="<?php echo getViewData('data')['name']; ?>" name="name" required>
  </div>
  <div>
    <label for="for-username">Username</label>
    <input id="for-username" type="text" value="<?php echo getViewData('data')['username']; ?>" name="username" required
           disabled>
  </div>
  <div>
    <label for="for-email">Email</label>
    <input id="for-email" type="email" value="<?php echo getViewData('data')['email']; ?>" name="email" required>
  </div>
  <div>
    <label for="for-password">Password</label>
    <input id="for-password" type="password" value="" name="password" required>
  </div>
  <div>
    <label>Admin</label>
    <input type="checkbox" name="role" <?php echo(getViewData('data')['role'] == 'admin' ? 'checked' : null); ?>>
  </div>
  <div>
    <label>Status</label>
    <input type="checkbox" name="status" <?php echo(getViewData('data')['status'] == 1 ? 'checked' : null); ?>>
  </div>
  <input type="hidden" name="id" value="<?php echo getViewData('data')['id']; ?>">
  <br><button>Save Changes</button>
</form>