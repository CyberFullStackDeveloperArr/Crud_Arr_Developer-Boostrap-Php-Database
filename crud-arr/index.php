<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arr Developer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-info-subtle">
        <span class="navbar-brand mb-0 h1 p-3 text-black fw-bold">Data Arr Developer</span>
    </nav>
    <div class="container">
        <br>
        <h4>
            <center class="text-center text-info fw-bold">DAFTAR DATA SISWA ARR DEVELOPER</center>
        </h4>
        <?php 
            include "koneksi.php";

            if (isset($_GET['id_peserta'])) {
                $id_peserta = htmlspecialchars($_GET["id_peserta"]);
                $sql = "delete from peserta where id_peserta='$id_peserta' ";
                $hasil = mysqli_query($kon, $sql);

                if ($hasil) {
                    header("Location:index.php");
                } else {
                    echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
                }
            }
        ?>
        <br>
        <table class="my-3 table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Sekolah</th>
                    <th>Jurusan</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th colspan='2'>UD</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include "koneksi.php";
                    $sql = "select * from peserta order by id_peserta desc";
                    $hasil = mysqli_query($kon, $sql);
                    $no = 0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $no++;
                ?>
                <tr>
                    <td class="text-warning fw-bold"><?php echo $no; ?></td>
                    <td class="text-success fw-bold"><?php echo $data["nama"]; ?></td>
                    <td class="text-info fw-bold"><?php echo $data["sekolah"]; ?></td>
                    <td class="text-primary fw-bold"><?php echo $data["jurusan"]; ?></td>
                    <td class="text-secondary fw-bold"><?php echo $data["no_hp"]; ?></td>
                    <td  class="text-success fw-bold"><?php echo $data["alamat"]; ?></td>
                    <td>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">
                         <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                        </a>
                        <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning" role="button">
                         <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-120q-75 0-140.5-28.5t-114-77q-48.5-48.5-77-114T120-480q0-75 28.5-140.5t77-114q48.5-48.5 114-77T480-840q82 0 155.5 35T760-706v-94h80v240H600v-80h110q-41-56-101-88t-129-32q-117 0-198.5 81.5T200-480q0 117 81.5 198.5T480-200q105 0 183.5-68T756-440h82q-15 137-117.5 228.5T480-120Zm112-192L440-464v-216h80v184l128 128-56 56Z"/></svg>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <div class="pb-2 text-center">
         <a href="create.php" class="btn btn-primary px-5" role="button">Tambah Data</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
