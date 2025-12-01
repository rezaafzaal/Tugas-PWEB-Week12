<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Siswa Baru</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h3>Formulir Pendaftaran Siswa Baru</h3>
    </header>

    <form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">
        <fieldset>
        <p>
            <label for="nis">NRP: </label>
            <input type="text" name="nis" placeholder="NRP" required />
        </p>
        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="Nama lengkap" required />
        </p>
        <p>
            <label for="jenis_kelamin">Jenis Kelamin: </label>
            <label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
        </p>
        <p>
            <label for="telp">Telepon: </label>
            <input type="text" name="telp" placeholder="Nomor HP" />
        </p>
        <p>
            <label for="alamat">Alamat: </label>
            <textarea name="alamat"></textarea>
        </p>
        <p>
            <label for="foto">Foto (3x4): </label>
            <input type="file" name="foto" required />
            <br><small style="color:red">*Format: JPG/PNG, Max 2MB</small>
        </p>
        <p>
            <input type="submit" value="Daftar" name="daftar" />
        </p>
        </fieldset>
    </form>
</body>
</html>