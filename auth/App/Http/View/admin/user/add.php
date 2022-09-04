<br>
User Create | <a href="<?php url('admin/users', 1); ?>">Users</a>
<br>
<br>
<form role="form" id="user_add_form" action="" onsubmit="return false;" novalidate="novalidate">
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
    <input id="for-password" type="password" value="" name="password" required>
  </div>
  <div>
    <label>Admin</label>
    <input type="checkbox" name="role">
  </div>
  <div>
    <label>Status</label>
    <input type="checkbox" name="status" checked>
  </div>
  <br>
  <button>Add</button>
</form>