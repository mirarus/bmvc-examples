<?php require '_meta.php'; ?>
</head>
<body>
User Dashboard
<br>
<hr>
<?php if (auth_check()) { ?>
  <?php echo auth_get('name'); ?> | @<?php echo auth_get('username'); ?> | <?php echo auth_get('email'); ?> | <a
    href="./">Home</a> | <a href="account">Account</a> | <a
    href="logout">Logout</a><?php echo is_admin() ? ' | <a href="admin">Admin Dashboard</a>' : null; ?>
  <br>
  <hr>
<?php } ?>
<?php echo getViewContent(); ?>
<br><br>
<hr>
<a href="bmvc-auth.zip">bmvc-auth.zip</a> | <a href="https://github.com/mirarus/bmvc-examples/tree/main/auth">github/bmvc-auth</a>
<br>

<!-- START: Scripts -->
<script>
  (function ($) {
    $("#signin_form").submit(e => {
      $.ajax({
        url: "auth/signin",
        type: "POST",
        dataType: 'json',
        data: $(e.target).serialize(),
        success: res => {
          if (res && typeof res === 'object') {
            alert(res.message);
            if (res.status) window.setTimeout(() => window.location.reload(), 1000);
          }
        }
      });
    });
    $("#signup_form").submit(() => {
      $.ajax({
        url: "auth/signup",
        type: "POST",
        dataType: 'json',
        data: $("#signup_form").serialize(),
        success: res => {
          if (res && typeof res === 'object') {
            alert(res.message);
            if (res.status) window.setTimeout(() => window.location.reload(), 1000);
          }
        }
      });
    });
    $("#account_form").submit(e => {
      $.ajax({
        url: "auth/change",
        type: "POST",
        dataType: 'json',
        data: $(e.target).serialize(),
        success: res => {
          if (res && typeof res === 'object') {
            alert(res.message);
            if (res.status) window.setTimeout(() => window.location.reload(), 1000);
          }
        }
      });
    });
  })(jQuery);
</script>
<!-- END: Scripts -->
</body>
</html>