<?php require '_meta.php'; ?>
</head>
<body>
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