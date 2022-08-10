<?php

return array_map(function($d) use ($db){
    $db->query = "SELECT SUM(jumlah) as TOTAL_JUMLAH FROM stok WHERE obat_id = $d->id";
    $d->stok = $db->exec('single')->TOTAL_JUMLAH ?? 0;
    return $d;
}, $data);