<?php
session_start();
session_destroy();
echo'<script>
alert("Session ended");
window.location = "../index.php";
</script>';

?>