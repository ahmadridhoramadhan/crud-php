<?php

// ini adalah variable global
$container = [
	"1.exit",
	"2.tampilkan nama kota",
	"3.tampilkan tabel biasa",
	"4.tampilkan tabel menggunakan array",
	"5.tampilkan tabel yang menggunakan loop dan array multidimensi",
	"6.latihan membuat variable",
	"7.latihan input membuat data diri",
	"8.latihan implementasi tipe data di dunia nyata",
	"9.operasi aritmatika",
];


// ============================================================================================
// fungsi utama

function readContainer($container)
{
	for ($i = 0; $i < count($container); $i++) {
		echo $container[$i] . "\n";
	}
}

function searchContainer($key)
{
	global $container;
	$is_exist = true;
	echo "\n\t\tmungkin maksud anda \n\n";
	for ($i = 0; $i < count($container); $i++) {
		if (strstr($container[$i], $key)) {
			echo "\t" . $container[$i] . "\n";
			$is_exist = false;
		}
	}
	if ($is_exist) {
		echo "\tkeyword yang anda cari tidak tersedia\n";
	}
	echo "\n silahkan masukkan nomor atau keyword :";
	return trim(fgets(STDIN));
}


function home($container)
{
	echo "\n\n\n\n";
	echo "untuk running program silahkan tulis nomor program \n";
	echo "jika ingin mencari silahkan msukkan keyword\n";
	echo "~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+\n";
	readContainer($container);
	echo "~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+~+\n";
	echo "masukkan input : ";
	return trim(fgets(STDIN));
}

function confirm($massage)
{
	while (true) {
		echo $massage . ' (Y/N)? : ';
		$input = trim(fgets(STDIN));
		if ($input == 'y' || $input == 'Y') {
			return true;
		} elseif ($input == 'n' || $input == 'N') {
			return false;
		} else {
			echo "pilihan yang anda masukkan tidak tersedia!\n";
		}
	}
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



// ============================================================================================
// main menu

popen('cls', 'w');

$is_lanjut = true;
while ($is_lanjut) {

	$input = home($container);

	$cek = is_numeric($input);

	while (!$cek) {

		$input = searchContainer($input);
		if (is_numeric($input)) {
			$input = $input;
			break;
		}
	}

	popen('cls', 'w');

	switch ($input) {
		case 1:
			die;
			break;
		case 2:
			latihan1();
			break;
		case 3:
			latihan2();
			break;
		case 4:
			latihan3();
			break;
		case 5:
			latihan4();
			break;
		case 6:
			latihan5();
			break;
		case 7:
			latihan6();
			break;
		case 8:
			latihan7();
			break;
		case 9:
			latihan8();
			break;
		default:
			echo "\n\n\n\n";
			echo "pilihan yang anda masukkan tidak tersedia\n";
	}
	echo "\n\n\n\n";
	$is_lanjut = confirm('lanjutkan');
	popen('cls', 'w');
}
