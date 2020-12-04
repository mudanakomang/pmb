<?php

$servername = "plato-db.id.domainesia.com";
$database = "kuliahon_pmb";
$username = "kuliahon_pmbroot";
$password = "SN2j]e1ihAO]";

$conn=mysqli_connect($servername,$username,$password,$database);
if (!$conn){
    die("Koneksi gagal: ".mysqli_connect_error());
}

$formdata=$_POST['formdata'];
parse_str($formdata,$data);


$nama=$data['nama'];
$nowa=$data['nowa'];
$email=$data['email'];
$sekolah=$data['sekolah'];
$alamat=$data['alamat'];
$kip=isset($data['kip']) ? "Y":"N";
$nomorkip=$data['nomorkip'];


$stmt = $conn->prepare("INSERT INTO `pendaftar` (`nama`,`nomorwa`, `email`, `sekolah_asal`,`alamat`,`kip`,`nomor_kip`) VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param('sssssss',$nama,$nowa,$email,$sekolah,$alamat,$kip,$nomorkip);

$stmt->execute();
$stmt->close();
$conn->close();

$text = "Saya telah mendaftar melalui website Penerimaan Mahasiswa Baru STKIP Suar Bangli".PHP_EOL;
$text.="dengan detail sebagai berikut:".PHP_EOL.PHP_EOL;
$text.="*Nama:* ".$nama.PHP_EOL;
$text.="*Nomor WhatsApp:* ".$nowa.PHP_EOL;
$text.="*Email:* ".$email.PHP_EOL;
$text.="*Sekolah Asal:* ".$sekolah.PHP_EOL;
$text.="*Alamat:* ".$alamat.PHP_EOL;

if (!empty($nomorkip)) {
    $text .= "*KIP:*  " . $nomorkip . PHP_EOL;
}
$text=urlencode($text);
$nomorhpadmin="6281238749696";
$url="https://wa.me/".$nomorhpadmin.'?text='.$text;

header('Content-Type: application/json');
echo json_encode(['url'=>$url]);