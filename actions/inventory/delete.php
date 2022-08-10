<?php

$table = 'stok';
$conn = conn();
$db   = new Database($conn);

$db->delete($table,[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Barang '.$_GET['tipe'].' berhasil dihapus']);
header('location:'.routeTo('inventory/index',['tipe'=>$_GET['tipe']]));
die();