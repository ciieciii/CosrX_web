<?php
require_once "../config/config.php";

if (isset($_POST['submit'])) {
    $nama_product = $_POST['namaProduct'];
    $desk = $_POST['description'];
    $harga = $_POST['harga'];
    $gambar = basename($_FILES['gambar']['name']);
    $kode_kategori = $_POST['jenis'];
    
    $Data = [
        'namaProduct' => $nama_product,
        'description' => $desk,
        'harga' => $harga,
        'jenis' => $kode_kategori,
        'gambar' => $gambar,
    ];

    $validasi = ValidasiData($Data);

    if ($validasi == 0) {
        echo "data sudah lengkap siap di inputkan";
        $result = inputdata($Data, $koneksi);
        $folderTujuan = $rootDir . "uploads";
        if ($result) {
            $upload = tambahGambar($folderTujuan, $_FILES['gambar']);
            if ($upload)
                header("location:form_cosrx.php?status=1");
            else
                header("location:form_cosrx.php?errno=1");
        } else header("location:form_cosrx.php?errno=1");
    } else {
        echo "data $validasi kurang";
    }
}

else if(isset($_GET['del'])){
    $id = $_GET['del'] ?? null;

    if($id === null || !ctype_digit($id)){
        header("location:view_cosrxeci.php?errno=3");
    }
    else {
        // function delete
        $result = delMenu($koneksi, $id);
        if($result) 
            header("location:view_cosrxeci.php?success=1");
        else 
            header("location:view_cosrxeci.php?errno=5");
    }
}
?>