<?php
session_start();
session_destroy();
header('Location: login.php');
echo "<script>
alert('You have been logged out.')
</script>";
exit();
