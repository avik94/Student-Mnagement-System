<?php
session_start();
session_destroy();
?>
<script>
  alert("Perfectly Logout");
  window.open('index.php','_self');
</script>
