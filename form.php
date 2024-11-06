<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="POST" >
        <!-- input nama single line text input  --> 
        Kategori :
         <select name="jurusan" id="">
            <option value="1">--Acne Series--</option>
            <option value="2">--Brightening Series--</option>
        </select><br/>
    Nama Produk : <input type="text" name="nama" value=""/><br/>
       Id Produck: <input type="number" name="" id=""><br/>
        Expired : <input type="date" name="expired" id=""><br/>
       Alamat: <textarea name="Alamat" id="" cols="30" rows="10"></textarea><br/>
       No Telp : <input type="number" name="no_telp" id=""><br/>
       Foto : <input type="file"><br/>
       
       <input type="submit" name="submit" value="kirim">
    </form>
</body>
</html>