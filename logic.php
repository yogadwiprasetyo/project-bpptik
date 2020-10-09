<?php 

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
}

/**
 * Menangani input data form dan 
 * menjadikan associative array. 
 * 
 * @return array
 */
function insertData() {
  // ambil value dari data form
  // dan melakukan pengolahan data.
  $nama = ucwords($_POST['nama']);
  $nik = $_POST['nik'];
  $jenis_kelamin = jenisKelamin($_POST['jenis-kelamin']);
  $tanggal_lahir = $_POST['tanggal-lahir'];
  $total_gaji = totalGaji($_POST['gaji'], $_POST['bonus']);

  // masukkan data form kedalam array.
  $dataForm = array(
    "nama" => $nama,
    "nik" => $nik,
    "jenis_kelamin" => $jenis_kelamin,
    "tanggal_lahir" => $tanggal_lahir,
    "total_gaji" => $total_gaji,
  );

  // kembalikan array yang sudah berisi data form.
  return $dataForm;
}

/**
 * Menentukan huruf dari jenis kelamin.
 * 
 * @param {jenis kelamin} $kelamin
 * 
 * @return string
 */
function jenisKelamin($kelamin) {
  /**
   * Jika jenis kelamin laki-laki -> L.
   * Jika jenis kelamin perempuan -> P.
   */
  return $kelamin == "laki-laki" ? "L" : "P";
}

/**
 * Menghitung total gaji dengan rumus
 * { gaji + bonus - pajak 10% }
 * 
 * @param {gaji karyawan} $gaji
 * @param {bonus karyawan} $bonus
 * 
 * @return integer
 */
function totalGaji($gaji, $bonus) {
  // jumlahkan gaji dan bonus yang didapat.
  // hitung pajak 10% dari jumlah gaji dan bonus.
  // kurangi jumlah gaji dan bonus dengan pajak 10%
  // untuk mendapatkan total gaji.
  $jumlah = $gaji + $bonus;
  $potongan = $jumlah / 10;
  $total = $jumlah - $potongan;

  return $total;
}

?>