<?php

session_start();  
   $_SESSION['role'];

   if ($_SESSION['role'] == "Admin") {
       	$_SESSION['id_user'];  
     	unset($_SESSION["id_user"]);

     }elseif ($_SESSION['role'] == "Peserta") {
     	$_SESSION['id_user'];   
        $_SESSION['id_peserta'];
     	unset($_SESSION["id_user"]);
     	unset($_SESSION["id_peserta"]);

     }





session_unset();
session_destroy();

echo "<meta http-equiv='refresh' content='0; url=login'>";

?>
  