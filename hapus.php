<?php
include("config.php");

if( isset($_GET['id']) ){

    $id = $_GET['id'];

    $sql_foto = "SELECT foto FROM calon_siswa WHERE id=$id";
    $query_foto = mysqli_query($db, $sql_foto);
    $data = mysqli_fetch_array($query_foto);
    
    if($data){
        $file = "images/".$data['foto'];
        if(is_file($file)){
            unlink($file); 
        }
    }

    $sql = "DELETE FROM calon_siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if($query){
        header('Location: list-siswa.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}
?>