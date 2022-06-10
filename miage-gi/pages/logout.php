<?php
session_start();
include("../../../config.php");
$_SESSION['idAdmin']=="";
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="../pages/login.php";
</script>
