<?php

require('latihan.php');
require('kalkulator_bilangan/kalkulator.php');
require('crud/main.php');


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
