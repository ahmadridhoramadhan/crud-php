<?php

// ============================================================================================
// crud

function crud()
{
	$crud = new crud\crud();
	$crud->file_path = "crud/db_barang.txt";
	$crud->menu();
}

// ============================================================================================
// convert bilangan
function convertBilangan()
{
	$bilangan = new kalkulator_bilangan\kalkulator();
	$bilangan->menu();
}




// ============================================================================================
// fungsi latihan

function latihan1()
{
	echo "\n\nnama kota \t\t: BANJARMASIN \n";
	echo "fungsi kota \t\t: pusat kegiatan nasional(PKN)\n";
	echo "tanggal pembentukan \t: 4 oktober 1526\n";
	echo "klasifikasi ukuran kota : kota besar\n";
	echo "jumlah penduduk \t: 684.183 jiwa\n";
	echo "luas wilayah \t\t: 98,46 km2\n";
	echo "website pemerintahan \t: http://www.banjarmasin.go.id/\n\n";
}

function latihan2()
{
	echo "\t     +----------------------------+\n";
	echo "\t     |\t    daftar inventaris\t  |\n";
	echo "\t     +----------------------------+\n\n";
	echo "\tnama : AHMAD RIDHO RAMADHAN\n";
	echo "\t+-------+---------------+---------------+\n";
	echo "\t| no\t| nama barang\t| jumlah\t|\n";
	echo "\t+-------+---------------+---------------+\n";
	echo "\t| 1\t| meja\t\t| 20 buah\t|\n";
	echo "\t| 2\t| kursi\t\t| 21 buah\t|\n";
	echo "\t| 3\t| papan tulis\t| 1 buah\t|\n";
	echo "\t| 4\t| proyektor\t| 1 buah\t|\n";
	echo "\t| 5\t| ac\t\t| 2 buah\t|\n";
	echo "\t+-------+---------------+---------------+\n";
}

function latihan3()
{
	echo "\n\n\n\n";
	echo "\tmenampilkan tabel dengan loop \n";
	$barang = ["meja\t\t", "kursi\t\t", "papan tulis\t", "proyektor\t", "AC\t\t"];
	$jumlah = ["20 buah\t", "21 buah\t", "1 buah\t", "1 buah\t", "1 buah\t"];
	$index = 1;
	echo "\t+-------+---------------+---------------+\n";
	echo "\t| no\t| nama barang\t| jumlah\t|\n";
	echo "\t+-------+---------------+---------------+\n";
	for ($i = 0; $i < count($barang); $i++) {
		echo "\t| $index\t| $barang[$i]| $jumlah[$i]|\n";
		$index++;
	}
	echo "\t+-------+---------------+---------------+\n";
}

function latihan4()
{
	echo "\n\n\n\n";
	echo "\ttabel dengan loop dan array multidimensi\n";
	$items = [["meja\t\t", "kursi\t\t", "papan tulis\t", "proyektor\t", "AC\t\t"], ["20 buah\t", "21 buah\t", "1 buah\t", "1 buah\t", "1 buah\t"]];
	$index = 1;
	echo "\t+-------+---------------+---------------+\n";
	echo "\t| no\t| nama barang\t| jumlah\t|\n";
	echo "\t+-------+---------------+---------------+\n";
	for ($i = 0; $i < count($items[0]); $i++) {
		echo "\t| " . $index . "\t| " . $items[0][$i] . "| " . $items[1][$i] . "|\n";
		$index++;
	}
	echo "\t+-------+---------------+---------------+\n";

	echo "\n\n\n\n";
}

function latihan5()
{
	echo "\n\n\n\n";

	$nama = "Ahmad Ridho Ramadhan\n";
	$tempatTanggalLahir = "Banjarmasin, 29 september 2006\n";
	$alamat = "Banjarmasin, banjarmasin selatan, kelayan B, gg.baja\n";
	$sekolah = "SMK ISFI BANJARMASIN\n";

	echo "latihan menampilkan variable\n\n";
	echo "nama \t\t\t : $nama";
	echo "tempat tanggal lahir \t : $tempatTanggalLahir";
	echo "alamat \t\t\t : $alamat";
	echo "sekolah \t\t : $sekolah";

	echo "\n\n\n\n";
}

function latihan6()
{
	echo "\n\n\n\n";

	echo "nama\t\t\t= ";
	$nama = trim(fgets(STDIN));
	echo "tempat tanggal lahir	= ";
	$tempatTanggalLahir = trim(fgets(STDIN));
	echo "alamat\t\t\t= ";
	$alamat = trim(fgets(STDIN));
	echo "asal sekolah\t\t= ";
	$asalSekolah = trim(fgets(STDIN));
	echo "kelas\t\t\t= ";
	$kelas = trim(fgets(STDIN));

	echo "\n\n\n\n";

	echo "\t\t+-----------------------+\n";
	echo "\t\t|\t data diri \t|\n";
	echo "\t\t+-----------------------+\n";
	echo "\tnama\t\t\t = $nama\n";
	echo "\ttempat tanggal lahir\t = $tempatTanggalLahir\n";
	echo "\tasal sekolah\t\t = $asalSekolah\n";
	echo "\tkelas\t\t\t = $kelas\n";

	echo "\n\n\n\n";
}

function latihan7()
{
	echo "\n\n\n\nimplementasi tipe data ke dunia nyata\n";
	// echo "\n\n\n\ntipe data string dapat digunakan untuk menulis nama barang\n";
	$namaBarang = "pulpen";
	echo "\tbarang dagangan : $namaBarang\n";

	// echo "\ntipe data integer dapat digunakan untuk menulis harga \n";
	$hargaBarang = 2000;
	echo "\tharga barang \t: Rp. $hargaBarang,00\n";

	// echo "\ntipe data float dapat digunakan untuk data berat barang\n";
	$beratBarang = 0.2;
	echo "\tberat barang \t: $beratBarang kg\n";
}

function latihan8()
{
	echo "\n\n\n\n     operasi aritmatika\n";
	$number1 = 32;
	$number2 = 8;
	$penjumlahan = $number1 + $number2;
	$pengurangan = $number1 - $number2;
	$perkalian = $number1 * $number2;
	$pembagian = $number1 / $number2;

	//modulus adalah sisa pembagian
	$number3 = 9;
	$modulus = $number1 % $number3;

	echo "\t" . $number1 . " + " . $number2 . " = " . $penjumlahan . "\n";
	echo "\t" . $number1 . " - " . $number2 . " = " . $pengurangan . "\n";
	echo "\t" . $number1 . " * " . $number2 . " = " . $perkalian . "\n";
	echo "\t" . $number1 . " / " . $number2 . " = " . $pembagian . "\n";
	echo "\t" . $number1 . " % " . $number3 . " = " . $modulus . "\n";
}

function latihan9()
{

	echo "\n\n\n\n\t===== membuat segitiga dengan loop =====\n\n";

	echo "silahkan masukkan panjangnya : ";
	$panjang = trim(fgets(STDIN));

	for ($i = 0; $i < $panjang; $i++) {
		for ($a = $panjang; $a > $i; $a--) {
			echo " ";
		}
		for ($a = 0; $a < $i; $a++) {
			echo "X";
		}
		for ($a = 0; $a < $i; $a++) {
			echo "X";
		}
		echo "\n";
	}
}

function latihan10()
{

	echo "\n\n\n\n\t===== latihan menghitung luas trapesium =====\n\n";

	echo "silahkan masukkan panjang A\t : ";
	$panjangA = trim(fgets(STDIN));
	echo "silahkan masukkan panjang B\t : ";
	$panjangB = trim(fgets(STDIN));
	echo "silahkan masukkan tinggi\t : ";
	$tinggi = trim(fgets(STDIN));

	$luas = (($panjangA + $panjangB) * $tinggi) / 2;

	echo "\n\n\tpanjang A\t = $panjangA";
	echo "\n\tpanjang B\t = $panjangB";
	echo "\n\ttinggi\t\t = $tinggi\n";
	echo "\n\tluas\t\t = $luas\n";
}
