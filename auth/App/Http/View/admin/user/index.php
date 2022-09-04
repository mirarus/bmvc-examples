<br>
Users | <a href="<?php url('admin/users/add', 1); ?>">User Create</a>
<br>
<br>
<table>
  <thead>
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>Username</th>
    <th>Email</th>
    <th>Role</th>
    <th>Status</th>
    <th>Date</th>
    <th>Edit Date</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach (getViewData('data') as $d) {
    echo '<tr data-id="' . $d['id'] . '">
                                <td>' . $d['id'] . '</td>
                                <td>' . $d['name'] . '</td>
                                <td>' . $d['username'] . '</td>
                                <td>' . $d['email'] . '</td>
                                <td>' . ($d['role'] == 'user' ? 'User' : 'Admin') . '</td>
                                <td>' . ($d['status'] == 1 ? "Active" : "Passive") . '</td>
                                <td>' . date("d.m.Y - H:i:s", $d['time']) . '</td>
                                <td>' . date("d.m.Y - H:i:s", $d['edit_time']) . '</td>
                                <td><a href="' . url('admin/users/edit/' . $d['id']) . '">Edit</a> | <button class="user_delete" data-id="' . $d['id'] . '">Delete</button></td>
                            </tr>';
  } ?>
  </tbody>
</table>