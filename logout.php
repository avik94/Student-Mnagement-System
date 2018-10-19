<?php
session_start();
session_destroy();
?>
<script>
  alert("Perfectly Logout");
  window.open('login.php','_self');
</script>
