<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa PENS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Data Mahasiswa PENS</a>
        </div>
    </nav>
    
    <!-- <?php
        // include "connection.php";

        // if(isset($_GET['id'])){
        //     $id = $_GET["id"];

        //     $sql = "DELETE FROM mahasiswa WHERE id = '$id'";
            
        //     if(mysqli_query($con, $sql)){
        //         header("Location: index.php?message=remove");
        //         exit;
        //     }else{
        //         echo "<div class='alert alert-danger'>Data gagal dihapus</div>";
        //     }
        // }
    ?> -->

    <div class="container py-5">
        <?php
            session_start();

            if(isset($_SESSION['success'])) {
                echo "<div class='alert alert-success d-flex align-items-center alert-dismissible fade show mb-3' role='alert'>
                    <i class='bi bi-check-circle-fill me-2'></i>
                    <div><strong>Success!</strong> {$_SESSION['success']}</div>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                unset($_SESSION['success']);
            }
            
            // if(isset($_GET['message'])){
            //     $message = $_GET['message'];
            //     if($message == "insert_success"){
            //         echo "<div class='alert alert-success d-flex align-items-center alert-dismissible fade show' role='alert'>
            //             <div>
            //                 <i class='i bi-check-circle-fill'></i>
            //                 <strong>Success! </strong>Student data added successfully.
            //             </div>
            //             <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            //         </div>";
            //     }elseif($message == "update_success"){
            //         echo "<div class='alert alert-success d-flex align-items-center alert-dismissible fade show' role='alert'>
            //                 <strong>Berhasil!</strong> Data mahasiswa berhasil ditambahkan.
            //                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            //             </div>";
            //     }
            // }
        ?>

        <nav class="navbar bg-body-secondary px-5 py-3 mb-3">
            <div class="container-fluid justify-content">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
                <button class="btn btn-dark me-2" type="button" onclick="window.location.href='insert.php'">Tambah Data</a></button>
            </div>
        </nav>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NRP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">TTL</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. HP</th>
                        <th scope="col">Email</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Mata Kuliah Favorit</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "connection.php";
                            
                        // $sql = "SELECT * FROM mahasiswa ORDER BY id DESC";
                        // $sql = "SELECT *, CONCAT(temp_lahir, ', ', DATE_FORMAT(tgl_lahir, '%d-%m-%Y')) AS ttl FROM mahasiswa ORDER BY nrp ASC";

                        $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($con, $_GET['keyword']) : '';
                        $sql = "SELECT *, CONCAT(temp_lahir, ', ', DATE_FORMAT(tgl_lahir, '%d-%m-%Y')) AS ttl FROM mahasiswa";

                        if (!empty($keyword)) {
                            $sql .= " WHERE 
                                nrp        LIKE '%$keyword%' OR
                                nama       LIKE '%$keyword%' OR
                                prodi      LIKE '%$keyword%' OR
                                temp_lahir LIKE '%$keyword%' OR
                                tgl_lahir  LIKE '%$keyword%' OR 
                                lp         LIKE '%$keyword%' OR 
                                alamat     LIKE '%$keyword%' OR 
                                no_hp      LIKE '%$keyword%' OR 
                                email      LIKE '%$keyword%' OR 
                                sekolah    LIKE '%$keyword%' OR 
                                matkul_fav LIKE '%$keyword%'";
                        }

                        $sql .= " ORDER BY nrp ASC";
                                                    
                        $yield = mysqli_query($con, $sql);
                        $no = 0;
    
                        while($data = mysqli_fetch_array($yield)){
                            $no++;
                    ?>
                    <tr>
                        <th><?php echo $no;?></th>
                        <td><?php echo $data["nrp"]?></td>
                        <td>
                            <a href="profile.php?id=<?php echo $data['id']; ?>" class="text-decoration-none text-black"><?php echo $data["nama"]; ?></a>
                        </td>
                        <td><?php echo $data["prodi"]?></td>
                        <td><?php echo $data["ttl"]; ?></td>
                        <td><?php echo $data["lp"]; ?></td>
                        <td><?php echo $data["alamat"]; ?></td>
                        <td><?php echo $data["no_hp"]; ?></td>
                        <td><?php echo $data["email"]; ?></td>
                        <td><?php echo $data["sekolah"]; ?></td>
                        <td><?php echo $data["matkul_fav"]; ?></td>
                        <td>
                            <i class="bi bi-pencil-square set-icon" role="button" onclick="window.location.href='update.php?id=<?php echo $data['id']?>'"></i>
                            <i class="bi bi-trash3-fill set-icon" role="button" onclick="confirmDelete(<?php echo $data['id']; ?>)"></i>
                        </td>
                    </tr>
                </tbody>
                <?php
                        }
                ?>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const searchBox = document.querySelector('input[name="keyword"]');

        searchBox.addEventListener('input', function () {
            if (this.value === '') {
                // Reload halaman tanpa parameter keyword
                window.location.href = 'index.php';
            }
        });
    </script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#000000",
                cancelButtonColor: "#6C757D",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'delete.php?id=' + id;
                }
            });
        }
    </script>
</body>
</html>