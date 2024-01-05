<?php
include('config_query.php');
$db = new database();

session_start();
$id_users = $_SESSION['id_users'];

$aksi = $_GET['aksi'];
if ($aksi == "add") {

    // echo "<pre>";
    // print_r($_FILES);
    // echo "<pre>";
    // die;

    // Cek File Sudah dipilih atau belum
    if ($_FILES["header"]["name"] != '') {
        $tmp = explode('.', $_FILES["header"]["name"]); //Memecah Nama File Dan Extension
        $ext = end($tmp); // Mengambil extension
        $filename = $tmp[0]; // Mengambil nilai nama file tanpa extension
        $allowed_ext = array("jpg", "png", "jpeg"); //Extension File Yang Diisi

        // Cek Validasi Extension
        if (in_array($ext, $allowed_ext)) {
            // Cek ukuran gambar maks 5MB
            if ($_FILES["header"]["size"] <= 5120000) {
                $name = $filename . '_' . rand() . '.' . $ext; //Rename Nama File Gambar
                $path = "../files/" . $name; //Lokasi Upload File
                $uploaded = move_uploaded_file($_FILES["header"]["tmp_name"], $path); //Memindahkan File

                if ($uploaded) {
                    $insertData = $db->tambah_data($name, $_POST["judul_artikel"], $_POST["isi_artikel"], $_POST["status_publish"], $id_users); //Query Insert Data
                    if ($insertData) {
                        echo "<script>alert('Data Berhasil Ditambahkan');document.location.href = 'index.php';</script>";
                    } else {
                        echo "<script>alert('Upss! Data Gagal Ditambahkan');document.location.href = 'index.php';</script>";
                    }
                } else {
                    echo "<script>alert('Upss! Upload File Gagal!');document.location.href = 'tambah_data.php';</script>";
                }
            } else {
                echo "<script>alert('Ukuran Gambar Lebih Dari 5MB!');document.location.href = 'tambah_data.php';</script>";
            }
        } else {
            echo "<script>alert('Extensi File Tidak Sesuai!');document.location.href = 'tambah_data.php';</script>";
        }
    } else {
        echo "<script>alert('Silahkan Pilih File Gambar!');document.location.href = 'tambah_data.php';</script>";
    }
} else if ($aksi == "update") {
    $id_artikel = $_POST['id_artikel'];
    if (!empty($id_artikel)) {
        if ($_FILES['header']['name'] != '') {
            $data = $db->get_by_id($id_artikel);

            // Operasi Hapus File
            if (file_exists('../files/' . $data['header']) && $data['header']) 
                unlink('../files/' . $data['header']);
           
            $tmp = explode('.', $_FILES["header"]["name"]); //Memecah Nama File Dan Extension
            $ext = end($tmp); // Mengambil extension
            $filename = $tmp[0]; // Mengambil nilai nama file tanpa extension
            $allowed_ext = array("jpg", "png", "jpeg"); //Extension File Yang Diisi

            // Cek Validasi Extension
            if (in_array($ext, $allowed_ext)) {
                // Cek ukuran gambar maks 5MB
                if ($_FILES["header"]["size"] <= 5120000) {
                    $name = $filename . '_' . rand() . '.' . $ext; //Rename Nama File Gambar
                    $path = "../files/" . $name; //Lokasi Upload File
                    $uploaded = move_uploaded_file($_FILES["header"]["tmp_name"], $path); //Memindahkan File

                    if ($uploaded) {
                        $updateData = $db->update_data($name, $_POST["judul_artikel"], $_POST["isi_artikel"], $_POST["status_publish"], $_POST['id_artikel'], $id_users); //Query Update Data
                        if ($updateData) {
                            echo "<script>alert('Data Berhasil DiUbah');document.location.href = 'index.php';</script>";
                        } else {
                            echo "<script>alert('Upss! Data Gagal DiUbah');document.location.href = 'index.php';</script>";
                        }
                    } else {
                        echo "<script>alert('Upss! Upload File Gagal!');document.location.href = 'edit.php?id=". $id_artikel ."';</script>";
                    }
                } else {
                    echo "<script>alert('Ukuran Gambar Lebih Dari 5MB!');document.location.href = 'edit.php?id=". $id_artikel ."';</script>";
                }
            } else {
                echo "<script>alert('Extensi File Tidak Sesuai!');document.location.href = 'edit.php?id=". $id_artikel ."';</script>";
            }
                
        } else {
            $updatedData = $db->update_data('not_set', $_POST['judul_artikel'], $_POST['isi_artikel'], $_POST['status_publish'], $_POST['id_artikel'], $id_users);
            if ($updatedData) {
                echo "<script>alert('Data Berhasil Diubah!');document.location.href = 'index.php';</script>";
            } else {
                echo "<script>alert('Data Gagal Diubah!');document.location.href = 'index.php';</script>";
            }
        }
    } else {
        echo "<script>alert('Anda Belum Memilih Artikel!');document.location.href = 'index.php';</script>";
    }
} else if ($aksi == "delete") {
    $id_artikel = $_GET['id'];
    if(!empty($id_artikel)) {
        $data = $db->get_by_id($id_artikel);
        
        // Operasi Hapus File
        if (file_exists('../files/' . $data['header']) && $data['header'])
            unlink('../files/' . $data['header']);

        $deleteData = $db->delete_data($id_artikel);
        if ($deleteData) {
            echo "<script>alert('Data Berhasil Dihapus!');document.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Data Gagal Dihapus!');document.location.href = 'index.php';</script>";
        }    
    } else {
        echo "<script>alert('Anda Belum Memilih Artikel!');document.location.href = 'index.php';</script>";
    }
} else {
    echo "<script>alert('Anda tidak mendapatkan akses untuk operasi ini!');document.location.href = 'index.php';</script>";
}
