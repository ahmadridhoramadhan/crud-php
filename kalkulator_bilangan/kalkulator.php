<?php

namespace kalkulator_bilangan;

class kalkulator
{

    public function menu()
    {
        popen('cls', 'w');

        $confirm = true;
        while ($confirm) {
            popen('cls', 'w');

            echo "\n\n====================convert bilangan====================\n";
            echo "1.from binary to ...\n";
            echo "2.from decimal to ...\n";
            echo "3.from oktal to ...\n";
            echo "4.fromheksadecimal to ...\n";
            echo "5.exit\n";
            echo "====================convert bilangan====================\n";

            echo "masukkan pilihan : ";
            $input = trim(fgets(STDIN));

            switch ($input) {
                case 1:
                    $this->fromBinay();
                    break;
                case 2:
                    $this->fromDecimal();
                    break;
                case 3:
                    $this->fromOktal();
                    break;
                case 4:
                    $this->fromHeksa();
                    break;
                case 5:
                    goto keluar;
                    break;
                case 6:
                    echo "masukkan angka heksa : ";
                    var_dump($this->is_heksa(trim(fgets(STDIN))));
                    break;

                default:
                    echo "pilihan anda tidak tersedia !\n";
                    break;
            }

            $confirm = $this->confirm("lanjutkan");
        }
        keluar:
    }

    // =================binary===========================================================================================================
    private function binaryToDecimal($biner)
    {
        $finalresult = 0;
        if (is_numeric($biner) && !strstr($biner, '2') && !strstr($biner, '3') && !strstr($biner, '4') && !strstr($biner, '5') && !strstr($biner, '6') && !strstr($biner, '7') && !strstr($biner, '8') && !strstr($biner, '9')) {
            $biner = str_split($biner);
            $pangkatAsal = count($biner);
            foreach ($biner as $key => $value) {
                $pangkat = $pangkatAsal - ($key + 1);
                $hasil = $value * $this->perpangkatan($pangkat, 2);
                $finalresult = $finalresult + $hasil;
            }
            return $finalresult;
        } else {
            echo "this input must numeric and only has 0 and 1!\n";
            return false;
        }
    }
    private function binaryToOktal($biner)
    {
        $finalresult = '';
        if (is_numeric($biner) && !strstr($biner, '2') && !strstr($biner, '3') && !strstr($biner, '4') && !strstr($biner, '5') && !strstr($biner, '6') && !strstr($biner, '7') && !strstr($biner, '8') && !strstr($biner, '9')) {
            if ((strlen($biner) % 3) != 0) {
                if ((strlen($biner) % 3) == 1) {
                    $biner = '00' . $biner;
                } elseif ((strlen($biner) % 3) == 2) {
                    $biner = '0' . $biner;
                }
            }
            $biner = str_split($biner, 3);
            foreach ($biner as $key => $value) {
                if ($value == '000') {
                    $hasil = '0';
                } elseif ($value == '001') {
                    $hasil = '1';
                } elseif ($value == '010') {
                    $hasil = '2';
                } elseif ($value == '011') {
                    $hasil = '3';
                } elseif ($value == '100') {
                    $hasil = '4';
                } elseif ($value == '101') {
                    $hasil = '5';
                } elseif ($value == '110') {
                    $hasil = '6';
                } elseif ($value == '111') {
                    $hasil = '7';
                }
                $finalresult = $finalresult . $hasil;
            }
            return $finalresult;
        } else {
            echo "this input must numeric and only has 0 and 1!\n";
            return false;
        }
    }
    private function binaryToHeksa($biner)
    {
        $finalresult = '';
        if (is_numeric($biner) && !strstr($biner, '2') && !strstr($biner, '3') && !strstr($biner, '4') && !strstr($biner, '5') && !strstr($biner, '6') && !strstr($biner, '7') && !strstr($biner, '8') && !strstr($biner, '9')) {
            if ((strlen($biner) % 4) != 0) {
                if ((strlen($biner) % 4) == 1) {
                    $biner = '000' . $biner;
                } elseif ((strlen($biner) % 4) == 2) {
                    $biner = '00' . $biner;
                } elseif ((strlen($biner) % 4) == 3) {
                    $biner = '0' . $biner;
                }
            }
            $biner = str_split($biner, 4);
            foreach ($biner as $key => $value) {
                if ($value == '0000') {
                    $hasil = '0';
                } elseif ($value == '0001') {
                    $hasil = '1';
                } elseif ($value == '0010') {
                    $hasil = '2';
                } elseif ($value == '0011') {
                    $hasil = '3';
                } elseif ($value == '0100') {
                    $hasil = '4';
                } elseif ($value == '0101') {
                    $hasil = '5';
                } elseif ($value == '0110') {
                    $hasil = '6';
                } elseif ($value == '0111') {
                    $hasil = '7';
                } elseif ($value == '1000') {
                    $hasil = '8';
                } elseif ($value == '1001') {
                    $hasil = '9';
                } elseif ($value == '1010') {
                    $hasil = 'A';
                } elseif ($value == '1011') {
                    $hasil = 'B';
                } elseif ($value == '1100') {
                    $hasil = 'C';
                } elseif ($value == '1101') {
                    $hasil = 'D';
                } elseif ($value == '1110') {
                    $hasil = 'E';
                } elseif ($value == '1111') {
                    $hasil = 'F';
                }

                $finalresult = $finalresult . $hasil;
            }
            return $finalresult;
        } else {
            echo "this input must numeric and only has 0 and 1!\n";
            return false;
        }
    }
    // =================binary===========================================================================================================
    // =================decimal===========================================================================================================
    private function decimalToBinary($decimal)
    {
        if (is_numeric($decimal)) {
            $hasil = $decimal;
            $finalresult = '';
            while ($hasil > 1) {
                $hasilKalkulus = $hasil % 2;
                $hasil = $hasil / 2;
                $finalresult = $hasilKalkulus . $finalresult;
            }
            return $finalresult;
        } else {
            echo "this input must numeric!\n";
            return false;
        }
    }
    private function decimalToOktal($decimal)
    {
        if (is_numeric($decimal)) {
            $hasil = $decimal;
            $finalresult = '';
            while ($hasil > 1) {
                $hasilKalkulus = $hasil % 8;
                $hasil = $hasil / 8;
                $finalresult = $hasilKalkulus . $finalresult;
            }
            return $finalresult;
        } else {
            echo "this input must numeric!\n";
            return false;
        }
    }
    private function decimalToHeksa($decimal)
    {
        if (is_numeric($decimal)) {
            $hasil = $decimal;
            $finalresult = '';
            while ($hasil > 1) {
                $hasilKalkulus = $hasil % 16;
                $hasil = $hasil / 16;

                if ($hasilKalkulus == 10) {
                    $hasilKalkulus = 'A';
                } elseif ($hasilKalkulus == 11) {
                    $hasilKalkulus = 'B';
                } elseif ($hasilKalkulus == 12) {
                    $hasilKalkulus = 'C';
                } elseif ($hasilKalkulus == 13) {
                    $hasilKalkulus = 'D';
                } elseif ($hasilKalkulus == 14) {
                    $hasilKalkulus = 'E';
                } elseif ($hasilKalkulus == 15) {
                    $hasilKalkulus = 'F';
                }

                $finalresult = $hasilKalkulus . $finalresult;
            }
            return $finalresult;
        } else {
            echo "this input must numeric!\n";
            return false;
        }
    }
    // =================decimal===========================================================================================================
    // =================oktal===========================================================================================================
    private function oktalToDecimal($oktal)
    {
        $finalresult = 0;
        if (is_numeric($oktal) && !strstr($oktal, '8') && !strstr($oktal, '9')) {
            $oktal = str_split($oktal);
            $pangkatAsal = count($oktal);
            foreach ($oktal as $key => $value) {
                $pangkat = $pangkatAsal - ($key + 1);
                $hasil = $value * $this->perpangkatan($pangkat, 8);
                $finalresult = $finalresult + $hasil;
            }
            return $finalresult;
        } else {
            echo "this input must numeric and only has 0 and 1!\n";
            return false;
        }
    }
    private function oktalToBinary($oktal)
    {
        $finalresult = '';
        if (is_numeric($oktal) && !strstr($oktal, '8') && !strstr($oktal, '9')) {
            $oktal = str_split($oktal);
            foreach ($oktal as $key => $value) {
                if ($value == '0') {
                    $hasil = '000';
                } elseif ($value == '1') {
                    $hasil = '001';
                } elseif ($value == '2') {
                    $hasil = '010';
                } elseif ($value == '3') {
                    $hasil = '011';
                } elseif ($value == '4') {
                    $hasil = '100';
                } elseif ($value == '5') {
                    $hasil = '101';
                } elseif ($value == '6') {
                    $hasil = '110';
                } elseif ($value == '7') {
                    $hasil = '111';
                }
                $finalresult = $finalresult . $hasil;
            }
            return $finalresult;
        } else {
            echo "this input must numeric and only has 0 and 1!\n";
            return false;
        }
    }
    private function oktalToHeksa($oktal)
    {
        $finalresult = '';
        if (is_numeric($oktal) && !strstr($oktal, '8') && !strstr($oktal, '9')) {
            $finalresult = $this->oktalToBinary($oktal);

            $finalresult = $this->binaryToHeksa($finalresult);

            return $finalresult;
        } else {
            echo "this input must numeric and only has 0 and 1!\n";
            return false;
        }
    }
    // =================oktal===========================================================================================================
    // =================heksadecimal===========================================================================================================
    private function heksaToDecimal($heksa)
    {
        $finalresult = 0;
        if ($this->is_heksa($heksa)) {
            $heksa = strtolower($heksa);
            $heksa = str_split($heksa);
            $pangkatAsal = count($heksa);
            foreach ($heksa as $key => $value) {

                if ($value == 'a') {
                    $value = 10;
                } elseif ($value == 'b') {
                    $value = 11;
                } elseif ($value == 'c') {
                    $value = 12;
                } elseif ($value == 'd') {
                    $value = 13;
                } elseif ($value == 'e') {
                    $value = 14;
                } elseif ($value == 'f') {
                    $value = 15;
                }

                $pangkat = $pangkatAsal - ($key + 1);
                $hasil = $value * $this->perpangkatan($pangkat, 16);
                $finalresult = $finalresult + $hasil;
            }
            return $finalresult;
        } else {
            echo "this input must be filled with hexadecimal!\n ";
            return false;
        }
    }
    private function heksaToBinary($heksa)
    {
        $finalresult = '';
        if ($this->is_heksa($heksa)) {
            $heksa = strtolower($heksa);
            $heksa = str_split($heksa);
            foreach ($heksa as $key => $value) {
                if ($value == '0') {
                    $hasil = '0000';
                } elseif ($value == '1') {
                    $hasil = '0001';
                } elseif ($value == '2') {
                    $hasil = '0010';
                } elseif ($value == '3') {
                    $hasil = '0011';
                } elseif ($value == '4') {
                    $hasil = '0100';
                } elseif ($value == '5') {
                    $hasil = '0101';
                } elseif ($value == '6') {
                    $hasil = '0110';
                } elseif ($value == '7') {
                    $hasil = '0111';
                } elseif ($value == '8') {
                    $hasil = '1000';
                } elseif ($value == '9') {
                    $hasil = '1001';
                } elseif ($value == 'a') {
                    $hasil = '1010';
                } elseif ($value == 'b') {
                    $hasil = '1011';
                } elseif ($value == 'c') {
                    $hasil = '1100';
                } elseif ($value == 'd') {
                    $hasil = '1101';
                } elseif ($value == 'e') {
                    $hasil = '1110';
                } elseif ($value == 'f') {
                    $hasil = '1111';
                }

                $finalresult = $finalresult . $hasil;
            }
            return $finalresult;

            return $finalresult;
        } else {
            echo "this input must be filled with hexadecimal!\n ";
            return false;
        }
    }
    private function heksaToOktal($heksa)
    {
        $finalresult = '';
        if ($this->is_heksa($heksa)) {
            $finalresult = $this->heksaToBinary($heksa);

            $finalresult = $this->binaryToOktal($finalresult);

            return $finalresult;
        } else {
            echo "this input must be filled with hexadecimal!\n ";
            return false;
        }
    }
    // =================heksadecimal===========================================================================================================
    // =================fungsi menampilkan===========================================================================================================
    private function fromBinay()
    {
        echo "masukkan angka binary : ";
        $biner = trim(fgets(STDIN));
        if (is_numeric($biner) && !strstr($biner, '2') && !strstr($biner, '3') && !strstr($biner, '4') && !strstr($biner, '5') && !strstr($biner, '6') && !strstr($biner, '7') && !strstr($biner, '8') && !strstr($biner, '9')) {
            echo "\n\tdecimal \t= " . $this->binaryToDecimal($biner) . "\n";
            echo "\toktal \t\t= " . $this->binaryToOktal($biner) . "\n";
            echo "\theksadecimal \t= " . $this->binaryToHeksa($biner) . "\n";
        } else {
            echo "this input must numeric and only has 0 and 1!\n";
            return false;
        }
    }
    private function fromDecimal()
    {
        echo "masukkan angka decimal : ";
        $decimal = trim(fgets(STDIN));
        if (is_numeric($decimal)) {
            echo "\n\tbinary \t\t= " . $this->decimalToBinary($decimal) . "\n";
            echo "\toktal \t\t= " . $this->decimalToOktal($decimal) . "\n";
            echo "\theksadecimal \t= " . $this->decimalToHeksa($decimal) . "\n";
        } else {
            echo "this input must numeric and only has 0 and 1!\n";
            return false;
        }
    }

    private function fromOktal()
    {
        echo "masukkan angka oktal : ";
        $oktal = trim(fgets(STDIN));
        if (is_numeric($oktal)) {
            echo "\n\tdecimal \t= " . $this->oktalToDecimal($oktal) . "\n";
            echo "\tbiner \t\t= " . $this->oktalToBinary($oktal) . "\n";
            echo "\theksadecimal \t= " . $this->oktalToHeksa($oktal) . "\n";
        } else {
            echo "this input must numeric and only has 0 and 1!\n";
            return false;
        }
    }

    private function fromHeksa()
    {
        echo "masukkan angka hexadecimal : ";
        $heksa = trim(fgets(STDIN));
        if ($this->is_heksa($heksa)) {
            echo "\n\tdecimal \t= " . $this->heksaToDecimal($heksa) . "\n";
            echo "\tbiner \t\t= " . $this->heksaToBinary($heksa) . "\n";
            echo "\toktal \t\t= " . $this->heksaToOktal($heksa) . "\n";
        } else {
            echo "this input must hexadecimal!\n";
            return false;
        }
    }

    // =================fungsi menampilkan===========================================================================================================

    private function confirm($messege)
    {
        while (true) {
            echo "$messege " . "(N/Y)? : ";
            $input = trim(fgets(STDIN));

            if ($input == "Y" || $input == "y") {
                return true;
            } elseif ($input == "N" || $input == "n") {
                return false;
            } else {
                echo "pilihan yang anda masukkan tidak tersedia!\n";
            }
        }
    }

    private function perpangkatan($pangkat, $angka)
    {
        $angkaAsal = $angka;

        if ($pangkat != 0) {
            for ($i = 0; $i < $pangkat - 1; $i++) {
                $angka = $angka * $angkaAsal;
            }
        } else {
            $angka = 1;
        }

        return $angka;
    }

    private function is_heksa($heksadecimal)
    {
        $heksadecimal = strtolower($heksadecimal);
        $heksadecimal = str_split($heksadecimal);
        foreach ($heksadecimal as $key => $value) {
            if (($value != 'a') && ($value != 'b') && ($value != 'c') && ($value != 'd') && ($value != 'e') && ($value != 'f') && ($value != '0') && ($value != '1') && ($value != '2') && ($value != '3') && ($value != '4') && ($value != '5') && ($value != '6') && ($value != '7') && ($value != '8') && ($value != '9')) {
                return false;
            }
        }
        return true;
    }
}
