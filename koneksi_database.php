<?php
 /* nama server kita */
   $servername = "localhost";

   /* nama database kita */
   $database = "mikrotik_os"; 

   /* nama user yang terdaftar pada database (default: root) */
   $username = "root";

   /* password yang terdaftar pada database (default : "") */ 
   $password = ""; 

   /* membuat koneksi */
   $conn = new mysqli($servername, $username, $password, $database);

   /* membuat koneksi */
   $table = "tb_admin";

   /* mengecek koneksi */
   //if (!$conn) {
      //die("Maaf koneksi anda gagal : " . mysqli_connect_error());
   //}else{
      //echo "<h1>Yes! Koneksi Berhasil..</h1>";
   //}
?>