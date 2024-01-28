<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arr Developer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
         include "koneksi.php";
            function input($data) {
             $data = trim($data);
             $data = stripslashes($data);
             $data = htmlspecialchars($data);
             return $data;
            }
            if (isset($_GET['id_peserta'])) {
                $id_peserta=input($_GET["id_peserta"]);
                $sql="select * from peserta where id_peserta=$id_peserta";
                $hasil=mysqli_query($kon,$sql);
                $data = mysqli_fetch_assoc($hasil);
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_peserta=htmlspecialchars($_POST["id_peserta"]);
                $nama=input($_POST["nama"]);
                $sekolah=input($_POST["sekolah"]);
                $jurusan=input($_POST["jurusan"]);
                $no_hp=input($_POST["no_hp"]);
                $alamat=input($_POST["alamat"]);

                $sql="update peserta set 
                 nama='$nama',
                 sekolah='$sekolah',
                 jurusan='$jurusan',
                 no_hp='$no_hp',
                 alamat='$alamat'
                 where id_peserta=$id_peserta";
                $hasil=mysqli_query($kon,$sql);

                if ($hasil) {
                    header("Location:index.php");
                } else {
                    echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
                }
                
            }
        ?>
        <h2 class="text-center text-info fw-bold">Memperbarui Data Arr Developer</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
             <label class="text-primary fw-bold">Nama</label>
             <input type="text" name="nama" class="form-control border-0 border-bottom border-black" placeholder="Input Name..." required />
            </div>
            <div class="form-group">
             <label class="text-primary fw-bold">Sekolah</label>
             <input type="text" name="sekolah" class="form-control border-0 border-bottom border-black" placeholder="Input Sekolah..." required />
            </div>
            <div class="form-group">
             <label class="text-primary fw-bold">Jurusan</label>
             <input type="text" name="jurusan" class="form-control border-0 border-bottom border-black" placeholder="Input Jurusan..." required />
            </div>
            <div class="form-group">
             <label class="text-primary fw-bold">No Hp</label>
             <input type="text" name="no_hp" class="form-control border-0 border-bottom border-black" placeholder="Input No Hp..." required />
            </div>
            <div class="form-group">
             <label class="text-primary fw-bold">Alamat</label>
             <textarea rows="5" name="alamat" class="form-control border-0 border-bottom border-black" placeholder="Input Alamat..." required></textarea>
            </div>
 
            <input type="hidden" name="id_peserta" value="<?php echo $data['id_peserta']; ?>" />
            <div class="p-1 text-center fw-bold">
             <button name="submit" type="submit" class="btn btn-success px-5">SUBMIT</button>
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>