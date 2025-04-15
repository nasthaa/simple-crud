<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa PENS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Data Mahasiswa PENS</a>
        </div>
    </nav>
    <div class="container py-5">
        <div class="pb-3">
            <h2><i class="bi bi-arrow-left-circle-fill set-icon" role="button" onclick="window.location.href='index.php'"></i> <strong>Edit Data</strong> Mahasiswa</h2>
            <!-- <p class="thin-text text-body-secondary">Kami tidak akan pernah membagikan data Anda dengan orang lain.</p> -->
        </div>
        <?php
            include "connection.php";

            function input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if(isset($_GET['id'])){
                $id    = input($_GET['id']);

                $sql   = "SELECT * FROM mahasiswa WHERE id = '$id'";
                $yield = mysqli_query($con, $sql);
                $data  = mysqli_fetch_assoc($yield); 
            // }else{
            //     echo "ID tidak ditemukan!";
            //     exit;
            }

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $nrp        = input($_POST["nrp"]);
                $nama       = input($_POST["nama"]);
                $prodi      = input($_POST["prodi"]);
                $temp_lahir = input($_POST["temp_lahir"]);
                $tgl_lahir  = input($_POST["tgl_lahir"]);
                $lp         = input($_POST["lp"]);
                $alamat     = input($_POST["alamat"]);
                $no_hp      = input($_POST["no_hp"]);
                $email      = input($_POST["email"]);
                $sekolah    = input($_POST["sekolah"]);
                $matkul_fav = input($_POST["matkul_fav"]);

                // if(isset($id)){
                    $sql = "UPDATE mahasiswa SET
                        nrp        = '$nrp',
                        nama       = '$nama',
                        prodi      = '$prodi',
                        temp_lahir = '$temp_lahir',
                        tgl_lahir  = '$tgl_lahir',
                        lp         = '$lp',
                        alamat     = '$alamat',
                        no_hp      = '$no_hp',
                        email      = '$email',
                        sekolah    = '$sekolah',
                        matkul_fav = '$matkul_fav'
                    WHERE id = '$id'";
    
                    $yield = mysqli_query($con, $sql);
    
                    if($yield){
                        session_start();
                        $_SESSION['success'] = "Student data updated successfully!";
                        header("Location: index.php");
                        exit;                        
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>
                            Failed to update student data!
                        </div>";
                    } 
                // }
            }
        ?>

        <form action="update.php?id=<?php echo $data['id']; ?>" method="POST">
            <div class="mb-3 row">
                <label for="nrp" class="col-sm-2 col-form-label">NRP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nrp" name="nrp" value="<?php echo $data['nrp']; ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $data['prodi']; ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="temp_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="temp_lahir" name="temp_lahir" value="<?php echo $data['temp_lahir']; ?>" required>
                </div>
                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="lp" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-control" id="lp" name="lp" required>
                        <option value="Laki-laki" <?php echo ($data['lp'] == 'Laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                        <option value="Perempuan" <?php echo ($data['lp'] == 'Perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="alamat" name="alamat" required><?php echo $data['alamat']; ?></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="no_hp" class="col-sm-2 col-form-label">No. HP</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
                </div>
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="sekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?php echo $data['sekolah']; ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="matkul_fav" class="col-sm-2 col-form-label">Mata Kuliah Favorit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="matkul_fav" name="matkul_fav" value="<?php echo $data['matkul_fav']; ?>" required>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
            <div class="pt-3">
                <!-- <button type="button" class="btn btn-secondary text-dark" onclick="window.location.href='index.php'">Kembali</button> -->
                <button type="submit" class="btn btn-dark">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>