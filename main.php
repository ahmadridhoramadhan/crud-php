<?php

require('utilities.php');


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
	"10.latihan membuat segitiga dengan loop",
	"11.latihan menghitung luas trapesium",
];


// ============================================================================================
// main menu

popen('cls', 'w');

$is_lanjut = true;
while ($is_lanjut) {
	kembali:

	$input = home($container);

	if ($input == "crud") {
		crud();
		goto kembali;
	} elseif ($input == "conbil") {
		convertBilangan();
		goto kembali;
	}

	// cek apakah yang dimasukkan itu int atau string
	// jika string maka anggap itu adalah keyword untuk mencari sesuatu
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
		case 10:
			latihan9();
			break;
		case 11:
			latihan10();
			break;
		default:
			echo "\n\n\n\n";
			echo "pilihan yang anda masukkan tidak tersedia\n";
	}
	echo "\n\n\n\n";

	$is_lanjut = confirm('lanjutkan');
	popen('cls', 'w');
}
