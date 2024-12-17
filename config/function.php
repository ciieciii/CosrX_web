<?php

function validasiData($data){

    foreach($data as $index => $value){
        $value = trim($value);
        if($value === '' || $value === 0 || $value === null || $value === false){
            return $index;
        }
    }
    return 0;
}

function inputdata($data, $koneksi) {
    // Ambil data dari array
    $nama_product = $_POST['namaProduct'];
    $harga_product = $data['harga'];
    $kode_kategori = $data['jenis'];
    $desk = $data['description'];
    $filename = $data['gambar']; // Perbaiki penulisan dari $filenmae ke $filename

    // Query SQL untuk memasukkan data
    $sql = "INSERT INTO tb_menu (kode_product, nama_product, harga_product, kode_kategori, desk, gambar) 
            VALUES (?,?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt === false) {
        return "failed";
    }

    // Bind parameter
    mysqli_stmt_bind_param($stmt, 'isiiss',$kode_product, $nama_product, $harga_product, $kode_kategori, $desk, $filename);
    
    // Eksekusi pernyataan
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        return false;
    }

    // Tutup pernyataan
    mysqli_stmt_close($stmt);
    return true;
}

function viewProduct ($koneksi){

    $sql = "SELECT tb_menu.nama_product, tb_menu.harga_product, tb_menu.kode_kategori, tb_menu.desk, tb_menu.gambar FROM tb_menu
                    LEFT JOIN tb_kategori ON tb_kategori.kode_kategori = tb_kategori.kode_kategori";
    $stmt = mysqli_query($koneksi,$sql);

    if(mysqli_num_rows($stmt) > 0 ) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false;
}
   



// function ($data, $koneksi){
//     $sql = "SELECT * FROM cosrx_ecii";

//     $start = mysql_quary($koneksi, $sql);

//     if(mysqli_num_rows($start) > 0) return mysqli_fetch_all($start, MYSQLI_ASSOC);
//     else return false;
// }

//function untuk menampilkan data
// function Viewkosmetik($data, $koneksi){
//     $sql = "SELECT * FROM cosrx_ecii";

//     $start = mysql_quary($koneksi, $sql);

//     if(mysqli_num_rows($start) > 0) return mysqli_fetch_all($start, MYSQLI_ASSOC);
//     else return false;
// }
// function Viewbrand($data, $koneksi){
//     $sql = "SELECT * FROM cosrx_ecii";

//     $start = mysql_quary($koneksi, $sql);

//     if(mysqli_num_rows($start) > 0) return mysqli_fetch_all($start, MYSQLI_ASSOC);
//     else return false;
// }
// function Viewcart($data, $koneksi){
//     $sql = "SELECT * FROM cosrx_ecii";

//     $start = mysql_quary($koneksi, $sql);

//     if(mysqli_num_rows($start) > 0) return mysqli_fetch_all($start, MYSQLI_ASSOC);
//     else return false;
// }
// function Viewcartdetail$data, $koneksi){
//     $sql = "SELECT * FROM cosrx_ecii";

//     $start = mysql_quary($koneksi, $sql);

//     if(mysqli_num_rows($start) > 0) return mysqli_fetch_all($start, MYSQLI_ASSOC);
//     else return false;
// }
// function Viewkategori($data, $koneksi){
//     $sql = "SELECT * FROM cosrx_ecii";

//     $start = mysql_quary($koneksi, $sql);

//     if(mysqli_num_rows($start) > 0) return mysqli_fetch_all($start, MYSQLI_ASSOC);
//     else return false;
// }
// function Vieworder($data, $koneksi){
//     $sql = "SELECT * FROM cosrx_ecii";

//     $start = mysql_quary($koneksi, $sql);

//     if(mysqli_num_rows($start) > 0) return mysqli_fetch_all($start, MYSQLI_ASSOC);
//     else return false;
// }
// function Vieworderdetail($data, $koneksi){
//     $sql = "SELECT * FROM cosrx_ecii";

//     $start = mysql_quary($koneksi, $sql);

//     if(mysqli_num_rows($start) > 0) return mysqli_fetch_all($start, MYSQLI_ASSOC);
//     else return false;
// }
// function Viewproduk($data, $koneksi){
//     $sql = "SELECT * FROM cosrx_ecii";

//     $start = mysql_quary($koneksi, $sql);

//     if(mysqli_num_rows($start) > 0) return mysqli_fetch_all($start, MYSQLI_ASSOC);
//     else return false;
// }
// function Viewuser($data, $koneksi){
//     $sql = "SELECT * FROM kosmetik";

//     $start = mysql_quary($koneksi, $sql);

//     if(mysqli_num_rows($start) > 0) return mysqli_fetch_all($start, MYSQLI_ASSOC);
//     else return false;
// }

//
function deleteProduct($koneksi, $id) {
    $sql = "DELETE FROM tb_produk WHERE id_produk = ?";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        $result = mysqli_stmt_execute($stmt);
        
        if (!$result) {
            echo "Error: " . mysqli_error($koneksi);
        }
        
        mysqli_stmt_close($stmt);
        return $result;
    } else {
        echo "Error preparing statement: " . mysqli_error($koneksi);
        return false;
    }
}


?>