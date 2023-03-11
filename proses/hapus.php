<?php
    include "koneksi.php";
    $id=$_GET['id'];

    $delete=mysqli_query($koneksi,"delete from pengaduan where id_pengaduan='$id'");
    header("location:../landing page/masyarakat.php#why-us")

?>