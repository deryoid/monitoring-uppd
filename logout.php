<?php

session_start();  
   $_SESSION['role'];

   if ($_SESSION['role'] == "Admin") {
       	$_SESSION['id_user'];  
     	unset($_SESSION["id_user"]);

     }elseif ($_SESSION['role'] == "Mahasiswa") {
     	$_SESSION['id_user'];   
        $_SESSION['id_mhs'];
     	unset($_SESSION["id_user"]);
     	unset($_SESSION["id_mhs"]);

     }elseif ($_SESSION['role'] == "Dosen") {
     	$_SESSION['id_user'];  
        $_SESSION['id_dosen'];
     	unset($_SESSION["id_user"]);
		unset($_SESSION["id_dosen"]);
     } 





session_unset();
session_destroy();

echo "<meta http-equiv='refresh' content='0; url=login'>";

?>
  