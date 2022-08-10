<?php

Page::set_title('Dashboard');
$conn = conn();
$db   = new Database($conn);

if(
    isset($_GET['from']) && isset($_GET['to']) &&
    !empty($_GET['from']) && !empty($_GET['to'])
)
{
    $db->query = "SELECT obat.*, (SELECT SUM(ABS(jumlah)) TOTAL_JUMLAH FROM stok WHERE stok.obat_id = obat.id AND jumlah < 0 AND (tanggal BETWEEN '$_GET[from]' AND '$_GET[to]')) penggunaan FROM obat";
    $data = $db->exec('all');
    $datas = array_map(function($d) use ($db){

        $D = $d->penggunaan;
        $S = $d->biaya_pemesanan;
        $H = $d->biaya_penyimpanan;
        $eoq = sqrt( (2*$D*$S) / $H);
        $d->jumlah = $d->penggunaan;
        $d->eoq = $eoq;
        $d->interval_pemesanan = $eoq == 0 ? 0 : $D/$eoq;
        $d->jarak = $d->interval_pemesanan == 0 ? 0 : 365/$d->interval_pemesanan;
        return $d;
    }, $data);
}
else $datas = [];
return compact('datas');