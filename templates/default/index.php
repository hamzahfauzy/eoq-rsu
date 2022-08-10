<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        <h5 class="text-white op-7 mb-2">Selamat Datang</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <form action="">
                                <div class="d-flex">
                                    <input type="date" name="from" id="" class="form-control" value="<?=isset($_GET['from'])?$_GET['from']:''?>">&nbsp;
                                    <input type="date" name="to" id="" class="form-control" value="<?=isset($_GET['to'])?$_GET['to']:''?>">&nbsp;
                                    <button class="btn btn-primary">Tampilkan</button>
                                </div>
                            </form>

                            <p></p>
                            <?php if(count($datas)): ?>
                                <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th width="20px">#</th>
                                        <th>Obat</th>
                                        <th>Biaya Pemesanan</th>
                                        <th>Biaya Penyimpanan</th>
                                        <th>Jumlah</th>
                                        <th>EOQ</th>
                                        <th>Interval Pemesanan</th>
                                        <th>Jarak Interval</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($datas as $index => $data): ?>
                                    <tr>
                                        <td>
                                            <?=$index+1?>
                                        </td>
                                        <td><?=$data->nama?></td>
                                        <td><?=number_format($data->biaya_pemesanan)?></td>
                                        <td><?=number_format($data->biaya_penyimpanan)?></td>
                                        <td><?=number_format($data->jumlah)?></td>
                                        <td><?=number_format($data->eoq)?></td>
                                        <td><?=number_format($data->interval_pemesanan)?> X Pemesanan / Tahun</td>
                                        <td><?=number_format($data->jarak)?> Hari</td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <i>Tidak ada data</i>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>