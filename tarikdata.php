<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 06/12/2020
 * Time: 21:47
 */

header("Content-type: application/vnd-ms-excel");

// membuat nama file ekspor "export-to-excel.xls"
header("Content-Disposition: attachment; filename=Data PMB.xls");
header("Pragma: no-cache");
header("Expires: 0");

$servername = "plato-db.id.domainesia.com";
$database = "kuliahon_pmb";
$username = "kuliahon_pmbroot";
$password = "SN2j]e1ihAO]";

$conn=mysqli_connect($servername,$username,$password,$database);
if (!$conn){
    die("Koneksi gagal: ".mysqli_connect_error());
}

?>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nomor WA</th>
        <th>Email</th>
        <th>Prodi</th>
        <th>Sekolah Asal</th>
        <th>Alamat</th>
        <th>KIP</th>
        <th>Nomor KIP</th>
    </tr>
    <?php
    $sql = "SELECT * FROM `pendaftar`";
    $result = mysqli_query($conn, $sql);
    $no = 1;
    while($d = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama']; ?></td>
            <td><?php echo $d['nomorwa']; ?></td>
            <td><?php echo $d['email']; ?></td>
            <td><?php echo $d['prodi']; ?></td>
            <td><?php echo $d['sekolah_asal']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
            <td><?php echo $d['kip']; ?></td>
            <td><?php echo $d['nomor_kip']; ?></td>
        </tr>
        <?php
    }
    ?>
</table>
