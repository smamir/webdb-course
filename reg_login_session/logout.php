<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: main.php");
   }
mysqli_close($conn);
?>