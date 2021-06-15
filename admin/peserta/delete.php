
<?php 
  include '../../config/koneksi.php';
  session_start();

   $id    = $_GET['id'];

   $cek_pst  = $koneksi->query("SELECT * FROM  peserta  WHERE id_peserta = '$id'")->fetch_array();
   $cek_user = $koneksi->query("SELECT * FROM user WHERE id_user = '$cek_pst[id_user]'");

   // echo "<pre>";
   // var_dump(mysqli_num_rows($cek_user));
   // die();

   if (mysqli_num_rows($cek_user) === 1) {
  		$_SESSION['notif'] = "Data Tidak Bisa dihapus karena Data User Masih ada !!";
        echo "<script>window.location.replace('../peserta/');</script>";   		
   }else{

   $hapus = $koneksi->query("DELETE FROM peserta WHERE id_peserta = '$id'");

   if ($hapus) {
  		$_SESSION['pesan'] = "Data Berhasil Dihapus";
        echo "<script>window.location.replace('../peserta/');</script>";
    }
}
   
 ?>