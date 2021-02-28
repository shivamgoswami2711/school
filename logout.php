<?php
session_start();
session_destroy();
echo "<script>alert('log out')</script>";
echo "<script>location.href='index.php'</script>";
?>