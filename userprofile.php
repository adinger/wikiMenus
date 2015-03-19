<?php

include "head.php";
require "db/connect.php"; 
include "functions/userfunctions.php";
prevent_intruders();

?>

<h3>Welcome, <?php echo $_SESSION['username'] ?></h3>

</body>
</html>