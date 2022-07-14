<?php 
exec('python3 health_main.py'); 
header("Location: index_ready.php");
exit();
?>