<html>

<head>
    <title>Faktur Pembayaran</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }

        hr {
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 1;
            border-color: black;
        }
    </style>
    <script>
        // Menutup halaman jika pengguna membatalkan dialog cetak
        window.onafterprint = function() {
            window.close();
        };

        // Menangani pengguna yang membatalkan dengan menutup halaman secara manual
        window.onbeforeunload = function(e) {
            return "Apakah Anda yakin ingin meninggalkan halaman ini?";
        };
    </script>
</head>

<body style='font-family:tahoma; font-size:8pt;' onload="javascript:window.print()">
    <center>
        <table style='width:350px; font-size:17pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='CENTER' vertical-align:top>
                <b>PDAM BUMDES</b></br>
                <span style='color:black; text-align: center; font-size:13pt;'>
                    JL XXXXXXXXXXX XXXXXXX <br>
                    Telp . 088888888888
                </span>
            </td>
            <tr>
                <td colspan='5'>
                    <hr>
                </td>
            </tr>
        </table>
        <table style='width:350px; font-size:16pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td align='left'>
                <span style='color:black;font-size:13pt'>
                    No Trans : <?= $bayar['transaksi_id'] ?><br>
                    Kasir : <?= $user['nama']; ?>
                </span>
            </td>
            <td align='right'>
                <span style='color:black;font-size:13pt'>
                    Jam : <?= $bayar['jam_transaksi'] ?><br>
                    Tanggal :
                    <?=
                    date('d', strtotime($bayar['tanggal_transaksi'])) . '-' .
                        date('m', strtotime($bayar['tanggal_transaksi'])) . '-' .
                        date('Y', strtotime($bayar['tanggal_transaksi']))
                    ?>
                </span>
            </td>
        </table>
        <table cellspacing='0' cellpadding='0' style='width:350px; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>

            <tr>
                <td colspan='5'>
                    <hr>
                </td>
            </tr>

            <tr>
                <td colspan='4'>
                    <div style='text-align:left'>Total Pembayaran....................... : Rp.</div>
                </td>
                <td style='text-align:right; font-size:16pt;'> <?= number_format($bayar['total_pembayaran']); ?></td>
            </tr>
            <tr>
                <td colspan='4'>
                    <div style='text-align:left; color:black'>Bayar........................................... : Rp.</div>
                </td>
                <td style='text-align:right; font-size:16pt; color:black'> <?= number_format($bayar['bayar']); ?></td>
            </tr>
            <tr>
                <td colspan='4'>
                    <div style='text-align:left; color:black'>Kembalian................................... : Rp.</div>
                </td>
                <td style='text-align:right; font-size:16pt; color:black'> <?= number_format($bayar['kembalian']); ?></td>
            </tr>

            <tr>
                <td colspan='5'>
                    <hr>
                </td>
            </tr>

        </table>
        <table style='width:350; font-size:12pt;' cellspacing='2'>
            <tr></br>
                <td align='center'>----- TERIMAKASIH -----</br></td>
            </tr>
        </table>
    </center>
</body>

</html>