<?php

return [
    'dashboard' => 'default/index',
    'suplier' => 'crud/index?table=suplier',
    'poliklinik' => 'crud/index?table=poliklinik',
    'obat' => 'crud/index?table=obat',
    'inventory' => [
        'barang masuk' => 'inventory/index?tipe=masuk',
        'barang keluar' => 'inventory/index?tipe=keluar',
    ],
    'pesanan' => 'crud/index?table=pesanan',
    'pengguna'  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];