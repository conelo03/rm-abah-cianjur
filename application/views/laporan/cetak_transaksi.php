<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="row mt-2">
        <div class="mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-4 text-center"><?= $title2 ?></h3>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Nama Bolu</th>
                                        <th>Jumlah</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Keuntungan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($barang): ?>
                                        <?php 
                                        $no = 1; 
                                        $keuntungan=0;
                                        foreach($barang as $u):
                                          $keuntungan += $u['jumlah']*$u['harga_jual']-$u['jumlah']*$u['harga_beli'];
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++;?></td>
                                                <td><?= date('d F Y', strtotime($u['tanggal']));?></td>
                                                <td><?= $u['nama_bolu'];?></td>
                                                <td><?= $u['jumlah'];?></td>
                                                <td><?= 'Rp '.number_format($u['jumlah']*$u['harga_beli'], 2, ',', '.');?></td>
                                                <td><?= 'Rp '.number_format($u['jumlah']*$u['harga_jual'], 2, ',', '.');?></td>
                                                <td><?= 'Rp '.number_format($u['jumlah']*$u['harga_jual']-$u['jumlah']*$u['harga_beli'], 2, ',', '.');?></td>
                                            </tr>
                                            <?php endforeach;?>
                                            <tr>
                                              <td class="text-center" colspan="6"><b>TOTAL KEUNTUNGAN</b></td>
                                              <td><?= 'Rp '.number_format($keuntungan, 2, ',', '.');?></td>
                                            </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td class="bg-light" colspan="7">Tidak ada data izin</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
