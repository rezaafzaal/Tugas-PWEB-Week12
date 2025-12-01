<?php
include("config.php");

if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Siswa | SMK Coding</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h3>Formulir Edit Siswa</h3>
    </header>

    <form action="proses-edit.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

            <p>
                <label for="nis">NIS: </label>
                <input type="text" name="nis" value="<?php echo $siswa['nis'] ?>" />
            </p>
            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" value="<?php echo $siswa['nama'] ?>" />
            </p>
            <p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <?php $jk = $siswa['jenis_kelamin']; ?>
                <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked": "" ?>> Perempuan</label>
            </p>
            <p>
                <label for="telp">Telepon: </label>
                <input type="text" name="telp" value="<?php echo $siswa['telp'] ?>" />
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"><?php echo $siswa['alamat'] ?></textarea>
            </p>
            <p>
                <label>Foto Saat Ini:</label>
                <img src="uploads/<?php echo $siswa['foto'] ?>" class='img-preview'>
            </p>
            <p>
                <label for="foto">Ganti Foto (Biarkan kosong jika tidak ingin mengganti): </label>
                <input type="file" name="foto" />
            </p>
            <p>
                <input type="submit" value="Simpan Perubahan" name="simpan" />
            </p>
        </fieldset>
    </form>
</body>
</html>