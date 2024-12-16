<?php 
require '../config/config.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cosrx_ecii : Input Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
            <h2>Input Data Product </h2>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="namaProduct" class="form-label">Name Produk</label>
                        <input type="text" class="form-control" name="namaProduct" >
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select class="form-select" name="jenis">
                                <option selected value="0" >--Pilih Jenis--</option>
                                <option value="1">ACNE</option>
                                <option value="2">BRIGHTENNING</option>
                        </select>
                    <div class="mb-3">
                        <label for="deskProduct">Deskripsi</label>
                        <textarea name="description" class="form-control" placeholder="Leave a description here" id="" for="desk"></textarea>
                    </div>
                    <div >
                    <div class="mb-3">
                        <label for="hargaProduct" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" >
                    </div>
                    </div>
                  
                        <div class="mb-3">
                        <label for="image" class="form-label">Image</label><br>
                        <input type="file" name="gambar" placeholder="Image" id="">
                        </div>

                    <div class="mb-3">
                        <input type="submit" value="Input Data Product" class="btn btn-primary" name="submit">
                    </div>


                </form>
            </div>
        </div>
    </div>
    
    





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>