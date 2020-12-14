<?php

//logout fucntion work here.

   session_start();
   
   if(session_destroy()) {
      header("Location: index.php");
   }
?>