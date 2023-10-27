<html>

<head></head>

<body>
    <h2 align="center" style="margin-top: 2rem;">LAPORAN KASIR PDAM</h2>
    <h3 align="center">Padangan, Jungke, Karanganyar</h3>
    <h3 align="center"><?= $judul; ?></h3>
    <table border="1" align="center" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td colspan="3" align="center">Saldo Awal Sebelum Tanggal <?= $tanggal_awal; ?></td>
                <td align="right">Rp. <?= number_format($saldo_awal); ?></td>
            </tr>
            <?php $no = 1;
            $saldo = 0;
            foreach ($transaksi as $ter) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= date('d-m-Y', strtotime($ter['tanggal_transaksi'])); ?></td>
                    <td><?= $ter['nama']; ?></td>
                    <td>
                        <?= $ter['dusun']; ?>,
                        RT <?= $ter['rt']; ?> / RW <?= $ter['rw']; ?>,
                        <?= $ter['desa']; ?>,
                        <?= $ter['kecamatan']; ?>,
                        Kab. <?= $ter['kabupaten']; ?>
                    </td>
                    <td align="right">Rp. <?= number_format($ter['total_pembayaran']); ?></td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>