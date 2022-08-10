<?php

$user = auth()->user->id;

if(get_role($user)->id == 2)
{
    $suplier = $db->single('suplier',[
        'user_id' => $user
    ]);
    $produk = $db->all('obat',[
        'suplier_id' => $suplier->id
    ]);
    $produk = array_map(function($p){
        return $p->id;
    },$produk);
    $pesanan = $db->all('pesanan',[
        'obat_id' => ['IN',"(".implode(",",$produk).")"]
    ]);

    if(count($pesanan))
    {
        $data = $pesanan;
    }
    else
    {
        $data = [];
    }
}

return $data;
