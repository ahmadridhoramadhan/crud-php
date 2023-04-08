<?php

namespace crud;

class crud
{

    protected $file_path = "db_barang.txt";

    public function menu()
    {

        $is_continue = true;
        while ($is_continue) {
            popen('cls', 'w');
            $this->cekFileAda();

            echo "\n\n\n\n========== crud ==========\n";
            echo "1.tampilkan data stock barang\n";
            echo "2.tambah data stock barang\n";
            echo "3.hapus data stock barang\n";
            echo "4.ubah data stock barang\n";
            echo "5.cari data barang\n";
            echo "6.exit\n";
            echo "==========================\n";
            echo "masukkan input : ";
            $input = trim(fgets(STDIN));

            switch ($input) {
                case 1:
                    echo "\n\n\n\n\n\n";
                    $this->read();
                    echo "\n\n\n\n\n\n";
                    break;
                case 2:
                    echo "\n\n\n\n\n\n";
                    $this->write();
                    echo "\n\n\n\n\n\n";
                    break;
                case 3:
                    echo "\n\n\n\n\n\n";
                    $this->delete();
                    echo "\n\n\n\n\n\n";
                    break;
                case 4:
                    echo "\n\n\n\n\n\n";
                    $this->update();
                    echo "\n\n\n\n\n\n";
                    break;
                case 5:
                    echo "\n\n\n\n\n\n";
                    echo "masukkan nama yang ingin di cari : ";
                    $this->search(trim(fgets(STDIN)));
                    echo "\n\n\n\n\n\n";
                    break;
                case 6:
                    goto keluar;
                    break;
                default:
                    echo "pilihan yang anda masukkan tidak tersedia !\n";
                    break;
            }

            $is_continue = $this->konfirm("lanjutkan");
        }
        keluar:
    }

    // ===================fungsi inti===============================================================================================================================================
    private function read()
    {
        popen('cls', 'w');

        if ($this->cekFileAda(true)) {
            return $this->menu();
        }
        $barang = fopen("db_barang.txt", "r");

        while (!feof($barang)) {
            $text = fgets($barang,);
            $baris[] = explode(";", $text);
        }

        $this->table($baris);

        fclose($barang);
    }

    private function write()
    {
        popen('cls', 'w');

        // ambil input
        $data = $this->form();

        // simpan data yang sudah di konfirmasi
        $this->save($data);

        // tampilkan table untuk mengetahui data berhasil dimasukkan
        $this->read();
    }

    private function update()
    {
        $this->read();

        echo "\n\n\n";

        $id = $this->requiredInput("masukkan id yang ingin anda cari");

        $this->search(null, $id);

        $is_update = $this->konfirm("yakin ingin mengubah data");

        if ($is_update) {
            $data = $this->form();
            $this->save($data, $id);
            $this->read();
        }
    }

    private function delete()
    {
        $this->read();

        $id = $this->requiredInput("masukkan id yang ingin anda hapus");

        $this->search(null, $id);

        $is_delete = $this->konfirm("yakin ingin hapus data ini");

        if ($is_delete) {
            $barang = fopen("db_barang.txt", "a+");

            while (!feof($barang)) {

                $row = fgets($barang);
                $row = explode(";", $row, -4)[0];
                if ($id == 1) {
                    rewind($barang);

                    $dataFile = fgets($barang);

                    fclose($barang);
                    $content = file_get_contents('db_barang.txt');
                    $content = str_replace($dataFile, "", $content);
                    file_put_contents('db_barang.txt', $content);
                    break;
                } elseif ($row == $id) {
                    if ($id == $this->lastId('')) {
                        $pos = ftell($barang) - 1;
                        while (fgetc($barang) != "\n") {
                            fseek($barang, $pos--);
                        }

                        $dataFile = "\n" . fgets($barang);

                        fclose($barang);
                        $content = file_get_contents('db_barang.txt');
                        $content = str_replace($dataFile, "", $content);
                        file_put_contents('db_barang.txt', $content);
                        break;
                    } else {
                        $pos = ftell($barang) - 1;
                        while (fgetc($barang) != "\n") {
                            fseek($barang, $pos--);
                        }
                        while (fgetc($barang) != "\n") {
                            fseek($barang, $pos--);
                        }

                        $dataFile = fgets($barang);

                        fclose($barang);
                        $content = file_get_contents('db_barang.txt');
                        $content = str_replace($dataFile, "", $content);
                        file_put_contents('db_barang.txt', $content);
                        break;
                    }
                }
            }
            $this->read();
        }
    }
    // ================== utilities =============================================================================================================================================
    private function konfirm($messege)
    {
        while (true) {
            echo "$messege " . "(N/Y)?";
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

    // public function MencariAngkaTertinggi(array $judul, array $isi)
    // {
    //     // ubah string isi menjadi panjang string nya
    //     for ($i = 0; $i < count($isi); $i++) {
    //         $panjang[] = strlen($isi[$i]);
    //     }

    //     // fungsi mencari yang paling panjang
    //     $tmp = $panjang[0];
    //     for ($i = 0; $i < count($panjang); $i++) {
    //         if ($tmp < $panjang[$i]) {
    //             $tmp = $panjang[$i];
    //         }
    //     }

    //     echo $tmp;
    // }

    private function tableDynamis(int $panjang, string $data)
    {
        if ($panjang == 31) {
            if (strlen($data) < 5) {
                $output = " $data \t\t\t\t|";
                return $output;
            } elseif (strlen($data) >= 5 && strlen($data) < 13) {
                $output = " $data \t\t\t|";
                return $output;
            } elseif (strlen($data) >= 13 && strlen($data) < 21) {
                $output = " $data \t\t|";
                return $output;
            } elseif (strlen($data) >= 21 && strlen($data) < 29) {
                $output = " $data \t|";
                return $output;
            } elseif (strlen($data) == 29) {
                $output = " $data |";
                return $output;
            }
        } elseif ($panjang == 15) {
            if (strlen($data) < 5) {
                $output = " $data \t\t|";
                return $output;
            } elseif (strlen($data) >= 5 && strlen($data) < 13) {
                $output = " $data \t|";
                return $output;
            } elseif (strlen($data) == 13) {
                $output = " $data |";
                return $output;
            }
        } elseif ($panjang == 23) {
            if (strlen($data) < 5) {
                $output = " $data \t\t\t|";
                return $output;
            } elseif (strlen($data) >= 5 && strlen($data) < 13) {
                $output = " $data \t\t|";
                return $output;
            } elseif (strlen($data) >= 13 && strlen($data) < 21) {
                $output = " $data \t|";
                return $output;
            } elseif (strlen($data) == 21) {
                $output = " $data |";
                return $output;
            }
        } elseif ($panjang == 7) {
            if (strlen($data) < 6) {
                $output = "| $data\t|";
                return $output;
            }
        }
    }

    private function save(string $data, string $numOfData = "0")
    {
        $barang = fopen("db_barang.txt", "a+");

        if ($numOfData == "0") {
            // cari id
            fseek($barang, -1, SEEK_END);
            $pos = ftell($barang);
            // Loop backword util "\n" is found.
            while (((fgetc($barang)) != "\n") && ($pos > 0)) {
                fseek($barang, $pos--);
            }

            // ambil nomor terakhir
            $id = (explode(";", fgets($barang), -4)[0]) + 1;

            // ini agar data yang masuk pertama tidak menggunakan enter
            rewind($barang);
            if (fgets($barang) == "") {
                $id = 1;
                // gabungkan data dengan id
                $data = $id . ";" . $data;
            } else {
                // gabungkan data dengan id
                $data = "\n" . $id . ";" . $data;
            }

            // simpan datanya di file
            fwrite($barang, $data);
            fclose($barang);
        } else {
            while (!feof($barang)) {

                $row = fgets($barang);
                $row = explode(";", $row, -4)[0];
                if ($numOfData == 1) {
                    rewind($barang);

                    $dataFile = fgets($barang);
                    $dataTMP = explode(';', $dataFile);
                    $dataFile = $dataTMP[0] . ";" . $dataTMP[1] . ";" . $dataTMP[2] . ";" . $dataTMP[3];
                    $id = $dataTMP[0];
                    $data = $id . ";" . $data;

                    fclose($barang);
                    $content = file_get_contents('db_barang.txt');
                    $content = str_replace($dataFile, $data, $content);
                    file_put_contents('db_barang.txt', $content);
                    break;
                } elseif ($row == $numOfData) {
                    $pos = ftell($barang) - 1;
                    fseek($barang, -1, SEEK_END);
                    while (fgetc($barang) != "\n") {
                        fseek($barang, $pos--);
                    }
                    while (fgetc($barang) != "\n") {
                        fseek($barang, $pos--);
                    }

                    $dataFile = fgets($barang);
                    $dataTMP = explode(';', $dataFile);
                    $dataFile = $dataTMP[0] . ";" . $dataTMP[1] . ";" . $dataTMP[2] . ";" . $dataTMP[3] . ";";
                    $id = $dataTMP[0];
                    $data = $id . ";" . $data;

                    fclose($barang);
                    $content = file_get_contents('db_barang.txt');
                    $content = str_replace($dataFile, $data, $content);
                    file_put_contents('db_barang.txt', $content);
                    break;
                }
            }
        }
    }

    private function form()
    {

        $konfirm = false;

        while (!$konfirm) {

            // ambil data
            $input1 = $this->requiredInput("masukkan nama barang\t");
            $input2 = $this->requiredInput("masukkan stok barang\t");
            $input3 = $this->requiredInput("masukkan harga barang\t");

            // konfirmasi data yang di masukkan
            echo "\n\nnama barang\t : $input1\n";
            echo "stok barang\t : $input2\n";
            echo "harga barang\t : $input3\n\n";
            $konfirm = $this->konfirm("yakin");

            popen('cls', 'w');
        }

        $data = $input1 . ";" . $input2 . ";" . $input3 . ";";

        return $data;
    }

    private function requiredInput($messege)
    {
        $lanjut = true;
        while ($lanjut) {
            echo $messege . " : ";
            $input = trim(fgets(STDIN));

            if ($input !== "") {
                $lanjut = false;
            }
            if ($input == "") {
                echo "you must fill this!\n";
            }
        }
        return $input;
    }

    private function search($key = null, $id = 0)
    {
        $barang = fopen("db_barang.txt", "a+");

        $data = [];
        if (($key == null) && ($id != 0)) {
            while (!feof($barang)) {
                $dataTMP = explode(';', fgets($barang));
                $id_data = $dataTMP[0];
                if ($id_data == $id) {
                    $data[] = $dataTMP;
                    break;
                }
            }
            $this->table($data);
        } elseif (($key != null) && ($id == 0)) {
            while (!feof($barang)) {
                $dataTMP = explode(';', fgets($barang));
                $nama_data = $dataTMP[1];
                if (strstr($nama_data, $key)) {
                    $data[] = $dataTMP;
                }
            }
            $this->table($data);
        }

        fclose($barang);
    }

    private function table($baris)
    {
        echo "\t+-------+-------------------------------+---------------+-----------------------+\n";
        echo "\t|  NO\t|\tnama barang\t\t|\tstok\t|\tharga\t\t|\n";
        echo "\t+-------+-------------------------------+---------------+-----------------------+\n";
        foreach ($baris as $value) {
            if (!file_exists("db_barang.txt") || $baris[0] == "") {
                return $this->menu();
            }
            echo "\t" . $this->tableDynamis(7, $value[0]) . $this->tableDynamis(31, $value[1]) . $this->tableDynamis(15, $value[2]) . $this->tableDynamis(23, $value[3]) . "\n";
        }
        echo "\t+-------+-------------------------------+---------------+-----------------------+\n";
    }

    private function cekFileAda(bool $kembalian = false)
    {
        if (!file_exists("db_barang.txt")) {
            echo "file tidak ada anda harus memasukkan data !";
            if ($kembalian) {
                return true;
            }
        }
    }

    private function lastId($barang, bool $returnData = false)
    {
        $barang = fopen("db_barang.txt", "r");
        fseek($barang, -1, SEEK_END);
        $pos = ftell($barang);
        // Loop backword util "\n" is found.
        while (((fgetc($barang)) != "\n") && ($pos > 0)) {
            fseek($barang, $pos--);
        }
        $id = explode(';', fgets($barang), -4)[0];
        fclose($barang);
        return $id;
    }
}


$crud = new crud;
$crud->menu();
