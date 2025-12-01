<?php
include("config.php");

if(isset($_POST['simpan'])){

    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    if($_FILES['foto']['name'] != "") {

        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $fotobaru = date('dmYHis').$foto;
        $path = "images/".$fotobaru;

        $query_get_foto = "SELECT foto FROM calon_siswa WHERE id=$id";
        $data_foto = mysqli_fetch_array(mysqli_query($db, $query_get_foto));
        $foto_lama = "images/".$data_foto['foto'];
        if(is_file($foto_lama)){ unlink($foto_lama); }

        if(move_uploaded_file($tmp, $path)){
            $sql = "UPDATE calon_siswa SET nis='$nis', nama='$nama', jenis_kelamin='$jk', telp='$telp', alamat='$alamat', foto='$fotobaru' WHERE id=$id";
        }
    } else {
        $sql = "UPDATE calon_siswa SET nis='$nis', nama='$nama', jenis_kelamin='$jk', telp='$telp', alamat='$alamat' WHERE id=$id";
    }

    $query = mysqli_query($db, $sql);

    if($query) {
        header('Location: list-siswa.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }

} else {
    die("Akses dilarang...");
}
?>