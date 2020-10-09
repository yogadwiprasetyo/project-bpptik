<?php 

// import file logic.php, yang berisi 
// kumpulan fungsi yang akan menangani
// input dari user.
require "logic.php";

// Tempat penyimpanan data karyawan baru
$DaftarKaryawan = array();

// Pengecekan tombol submit apakah sudah ditekan
$isSubmit = isset($_POST['submit']);

/**
 * Jika tombol submit sudah ditekan,
 * panggil fungsi dataForm yang akan 
 * mengembalikkan array berisi input 
 * yang sudah diisi user.
 * 
 * lalu tambahkan dataform ke DataKaryawan.
 */
if ($isSubmit) {
  $dataKaryawan = insertData();
  array_push($DaftarKaryawan, $dataKaryawan);
}

?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title>Project Pendaftaran Karyawan Baru</title>
</head>
<body>
  
  <div class="container">

    <!-- HEADER TITLE -->
    <header class="py-5">
      <h1 class="text-center">Form Pendaftaran Karyawan Baru</h1>
    </header>

    <main>
      <!-- AWAL SECTION FORM METHOD POST -->
      <section>
        <form action="/Project_Yoga Dwi Prasetyo/index.php" method="POST">

          <!-- Field NAME type text -->
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="nama" required>
              </div>
            </div>

          <!-- Field NIK type text -->
            <div class="form-group row">
              <label for="nik" class="col-sm-2 col-form-label">NIK</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nik" name="nik" minlength="16" required>
              </div>
            </div>

          <!-- Field JENIS KELAMIN type radio -->
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                <div class="col-sm-10">
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis-kelamin" id="jenis-kelamin-l" value="laki-laki" checked required>
                    <label class="form-check-label" for="jenis-kelamin-l">
                      Laki - Laki
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis-kelamin" id="jenis-kelamin-p" value="perempuan" required>
                    <label class="form-check-label" for="jenis-kelamin-p">
                      Perempuan
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>

          <!-- Field TANGGAL LAHIR type date -->
            <div class="form-group row">
              <label for="tanggal-lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal-lahir" name="tanggal-lahir" required>
              </div>
            </div>

          <!-- Field GAJI type number -->
            <div class="form-group row">
              <label for="gaji" class="col-sm-2 col-form-label">Gaji</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="gaji" name="gaji" required>
              </div>
            </div>

          <!-- Field BONUS type number -->
            <div class="form-group row">
              <label for="bonus" class="col-sm-2 col-form-label">Bonus</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="bonus" name="bonus" required>
              </div>
            </div>

          <!-- Button submit -->
            <div class="form-group">
              <div class="float-md-right">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </div>
            </div>
        </form>
      </section>
      <!-- AKHIR SECTION FORM METHOD POST -->

      <!-- AWAL SECTION TABLE DAFTAR KARYAWAN -->
      <section>
        <!-- Header title table -->
        <header class="pt-5 pb-3">
          <h2 class="text-center">Daftar Karyawan</h2>
        </header>

        <!-- Table responsive -->
        <div class="table-responsive">
          <table class="table table-hover">
            <!-- Head of table -->
            <thead class="thead-light">
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Total Gaji</th>
              </tr>
            </thead>

            <!-- Body of table -->
            <tbody>
              <?php foreach($DaftarKaryawan as $karyawan): ?>
                <tr>
                  <?php foreach($karyawan as $key => $data): ?>
                    <td><?php echo $data; ?></td>
                  <?php endforeach; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>
      <!-- AKHIR SECTION TABLE DAFTAR KARYAWAN -->

    </main>
  </div>

</body>
</html>

