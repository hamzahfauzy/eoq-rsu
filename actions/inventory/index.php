<?php

$table = 'stok';
Page::set_title(ucwords($table));
$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
$fields = config('fields')[$table];

if($_GET['tipe'] == 'masuk')
    $data = $db->all($table,[
        'jumlah' => ['>','0']
    ]);
else
{
    $data = $db->all($table,[
        'jumlah' => ['<','0']
    ]);

    $data = array_map(function($d){
        $d->jumlah = abs($d->jumlah);
        return $d;
    }, $data);
}

return [
    'datas' => $data,
    'table' => $table,
    'success_msg' => $success_msg,
    'fields' => $fields
];