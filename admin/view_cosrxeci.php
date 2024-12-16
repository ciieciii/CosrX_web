<?php

require "../config/config.php";
require_once "data.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>viewcosrxeci</title>
</head>

<body class="bg-gray-50">
    <div class="min-h-screen p-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <?php
                $product = viewProduct($koneksi);
                if ($product == 0) {
                    echo '<div class="p-4 text-gray-500">Data Kosong</div>';
                } else {
                ?>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">No.</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Nama Produk</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Jenis</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Deskripsi</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Expired</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Harga</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Image</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-gray-600" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php
                                $no = 1;
                                $arrjenis = array(1=>'Acne', 'Brightenning');
                                foreach ($product as $data) {
                                ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-500"><?= $no ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-500"><?= $data['namaProduk'] ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-500"><?= $arrjenis[$data['jenis']] ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-500"><?= $arrkategori[$data['id_kategori'] ]?></td>
                                        <td class="px-6 py-4 text-sm text-gray-500"><?= $data['description'] ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-500"><?= $data['expired'] ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-500">Rp. <?= number_format($data['harga'],0,',','.') ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-500"> 
                                            <img src="../upload/<?= $data['image'] ?>" /></td>
                                        <td class="px-6 py-4 text-sm">
                                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                                                Edit
                                            </a>
                                        </td>
                                        <td><a href="?del=<?= $data['id_produk'] ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"> delete</a></td>
                                    </tr>
                                <?php 
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>