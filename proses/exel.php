<?php
session_start();
?>
<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan Harian.xls");
?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <div>
            <h5>Laporan Harian</h5>
            <table id="example1" class="table table-bordered table-striped" style="text-align:center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <!-- <th>Opsi</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "../proses/koneksi.php";
                    $no = 1;
                    $tgl=date("Y-m-d");
                    $tampil=mysqli_query($koneksi,"select * from pengaduan where tgl_pengaduan='$tgl'");
                    while($data=mysqli_fetch_array($tampil)) {                  
                ?>
                    <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $data['nik'] ?></td>
                        <td><?php echo $data['tgl_pengaduan'] ?></td>
                        <td><?php echo $data['isi_laporan'] ?></td>
                        <td><?php echo $data['foto'] ?></td>
                        <td>
                            <?php  
                                if($data['status'] == '0'){
                                    echo "Belum diproses";
                                }else if($data['status'] == 'proses'){
                                    echo "Sudah diverifikasi";
                                }else{
                                    echo "Selesai";
                                }
                            ?>
                    </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
