<?php require(dirname(__DIR__, 2) . '/Layout/_meta.php'); ?>
</head>
<body>
Admin Dashboard
<br>
<hr>
<a href="<?php url('admin', 1); ?>">Home</a> | <a href="<?php url('admin/users', 1); ?>">Users</a> | <a
  href="<?php url('logout', 1); ?>">Logout</a> | <a href="<?php url(null, 1); ?>">User Dashboard</a>
<br>
<hr>
<?php echo getViewContent(); ?>
<br><br>
<hr>
<a href="bmvc-auth.zip">bmvc-auth.zip</a> | <a href="https://github.com/mirarus/bmvc-examples/tree/main/auth">github/bmvc-auth</a>
<br>

<!-- START: Scripts -->
<script>
  (function ($) {
    $("#user_add_form").submit(e => {
      $.ajax({
        url: "admin/users/add",
        type: "POST",
        dataType: 'json',
        data: $(e.target).serialize(),
        success: res => {
          if (res && typeof res === 'object') {
            alert(res.message);
            if (res.status) window.setTimeout(() => (window.location.href = 'admin/users'), 1000);
          }
        }
      });
    });
    $("#user_edit_form").submit(e => {
      $.ajax({
        url: "admin/users/edit",
        type: "POST",
        dataType: 'json',
        data: $(e.target).serialize(),
        success: res => {
          if (res && typeof res === 'object') {
            alert(res.message);
            if (res.status) window.setTimeout(() => (window.location.href = 'admin/users'), 1000);
          }
        }
      });
    });
    $(".user_delete").click(e => {
      if (e.target.dataset.id) {
        $.ajax({
          url: "admin/users/get",
          type: "POST",
          dataType: 'json',
          data: {id: e.target.dataset.id},
          success: res => {
            if (res && typeof res === 'object') {
              if (res.status) {
                if (window.confirm(res.lang.confirm)) {
                  $.ajax({
                    url: "admin/users/delete",
                    type: "POST",
                    dataType: 'json',
                    data: {id: res.message},
                    success: res => {
                      if (res && typeof res === 'object') {
                        alert(res.message);
                        if (res.status) window.setTimeout(() => window.location.reload(), 1000);
                      }
                    }
                  });
                } else {
                  alert(res.lang.cancel);
                }
              }
            }
          }
        });
      }
    });
  })(jQuery);
</script>
<!-- END: Scripts -->
</body>
</html>