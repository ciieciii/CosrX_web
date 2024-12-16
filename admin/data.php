<?php

require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the file was uploaded without errors
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $namaProduct = $_POST['namaProduct'];
        $jenis = $_POST['jenis'];
        $description = $_POST['description'];
        $hargaProduct = $_POST['harga'];

        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        // Array associative data
        $data = [
            'namaProduct' => $namaProduct,
            'jenis' => $jenis,
            'namaProduct' => $namaProduct,
            'description' => $description,
            'hargaProduct' => $hargaProduct,
            'image' => $fileName // perbaikan variabel yang sesuai
        ]; 

        $validasi = validasiData($data);

        if ($validasi == 0) {
            // Data sudah lengkap, siap diinputkan
            $result = inputdata($data, $koneksi);
            $folderTujuan = $rootDir . "upload/";

            if ($result) {
                $upload = tambahGambar($folderTujuan, $_FILES['image']);
                if ($upload) {
                    header("Location: view.cosrxeci.php?status=1");
                    exit();
                } else {
                    header("Location: form_cosrx.php?status=1&errno=2");
                    exit();
                }
            } else {
                header("Location: form_cosrx.php?errno=1");
                exit();
            }
        } else {
            echo "Data $validasi kurang";
        }
    } 
}else if(isset($_GET['del'])){
    $id = $_GET['del'] ?? null;

    if($id === null || !ctype_digit($id)){
        header("location:view.cosrxeci.php?errno=3");
    }
    else {
        // function delete
        $result = deleteProduct($koneksi, $id);
        if($result) 
            header("location:view.cosrxeci.php?success=1");
        else 
            header("location:view.cosrxeci.php?errno=5");
    }
}
?>