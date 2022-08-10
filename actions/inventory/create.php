<?php

$table = 'stok';
Page::set_title('Tambah '.ucwords($table));
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');
$fields = config('fields')[$table];
unset($fields['keterangan']);

if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);

    if($_GET['tipe'] == 'keluar')
    {
        $poliklinik = $db->single('poliklinik',[
            'id' => $_POST[$table]['poliklinik']
        ]);
        $_POST[$table]['jumlah'] *= -1;
        $_POST[$table]['keterangan'] = 'Ke '.$poliklinik->nama;
        unset($_POST[$table]['poliklinik']);
    }
    else
    {
        $suplier = $db->single('suplier',[
            'id' => $_POST[$table]['suplier']
        ]);
        $_POST[$table]['keterangan'] = 'Dari '.$suplier->nama;
    }

    $insert = $db->insert($table,$_POST[$table]);

    set_flash_msg(['success'=>'Barang '.$_GET['tipe'].' berhasil ditambahkan']);
    header('location:'.routeTo('inventory/index',['tipe'=>$_GET['tipe']]));
}

if($_GET['tipe'] == 'keluar')
{
    $fields['poliklinik'] = [
        'label' => 'Poliklinik',
        'type'  => 'options-obj:poliklinik,id,nama'
    ];
}

return compact('table','error_msg','old','fields');