<?php
    include "koneksi.php";

    $id=$_POST['id_pengaduan'];

    $nik=$_POST['nik'];
    $laporan=$_POST['laporan'];
    $foto=$_FILES['foto']['name'];
    $format=explode(".",$foto);
    $extensi=strtolower(end($format));
    $ukuran=$_FILES['foto']['size'];
    $file_tmp=$_FILES['foto']['tmp_name'];
    $extensi_diperbolehkan=array("jpg","png","gif");

    //if(in_array($extensi,$extensi_diperbolehkan)===true){
        if($ukuran<1044070000){
            move_uploaded_file($file_tmp,'../img_laporan/'.$foto);
            
            if(!empty($foto)){
            $query=mysqli_query($koneksi,"update pengaduan set tgl_pengaduan=NOW(),
            isi_laporan='$laporan',
            foto='$foto' where id_pengaduan='$id'");
            }
            else{
                $query=mysqli_query($koneksi,"update pengaduan set tgl_pengaduan=NOW(),
                isi_laporan='$laporan'
                where id_pengaduan='$id'");

            }


            if($query){
                header("location:../landing page/masyarakat.php?pesan=inputberhasil");
            }else{
                header("location:input_datapengaduan.php?pesan=inputgagal");
            }
        }else{
            header("location:input_datapengaduan.php?pesan=ukuransalah");
        }
   // }else{
   //     header("location:input_datapengaduan.php?pesan=extensisalah");
   // }
?>