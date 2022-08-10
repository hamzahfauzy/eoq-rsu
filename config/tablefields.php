<?php

return [
    'tblname'    => [
        'field1','field2'
    ],
    'poliklinik' => [
        'nama'
    ],
    'suplier' => [
        'nama',
        'alamat',
        'no_telepon',
    ],
    'obat' => [
        'suplier_id' => [
            'label' => 'Suplier',
            'type'  => 'options-obj:suplier,id,nama'
        ],
        'nama',
        'biaya_pemesanan' => [
            'label' => 'Biaya Pemesanan',
            'type'  => 'number'
        ],
        'biaya_penyimpanan' => [
            'label' => 'Biaya Penyimpanan',
            'type'  => 'number'
        ],
        'harga' => [
            'label' => 'Harga Eceran',
            'type'  => 'number'
        ],
    ],
    'stok' => [
        'obat_id' => [
            'label' => 'Obat',
            'type'  => 'options-obj:obat,id,nama'
        ],
        'jumlah' => [
            'label' => 'Jumlah',
            'type'  => 'number'
        ],
        'keterangan' => [
            'label' => 'Keterangan',
            'type'  => 'text'
        ],
    ],
    'pesanan' => [
        'obat_id' => [
            'label' => 'Obat',
            'type'  => 'options-obj:obat,id,nama'
        ],
        'jumlah' => [
            'label' => 'Jumlah',
            'type'  => 'number'
        ],
        'status' => [
            'label' => 'Status',
            'type'  => 'options:Menunggu|Diproses|Batal|Selesai'
        ],
    ]
];