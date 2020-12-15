<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
    body {
        margin:0;
        padding:0;
        border:0;			/* This removes the border around the viewport in old versions of IE */
        width:100%;
        background:#fff;
    }

    .header {
        padding-bottom:30px;
    }

    .header h3 {
        display: inline;
        margin-right: 100px;
    }

    .content {
    }

    .data-pegawai {
        width:50%;
        padding-bottom:30px;
    }

    .rincian-penghasilan {
        width:100%;
    }

    .total-penghasilan {
        width:100%;
    }

    .rincian-penghasilan th {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

    .rincian-penghasilan td {
        border-bottom: 1px solid black;
    }

    .total-penghasilan td {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }


    .rincian-penghasilan .tr-header {
        background-color:#337AB7; 
        color:white; 
        text-indent:15px;
        text-align:left;
    }

    .rincian-penghasilan .tr-header th {
        text-align:left;
        height: 20px;
        font-size:20px;
    }

  </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3><?= $title; ?></h3>
            <h3>Bulan : <?= $date['month']; ?> </h3>
            <h3>Tahun : <?= $date['year']; ?></h3>
        </div>
        
        <div class="content">
            <table class="data-pegawai">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $pegawai['name'] ?></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td><?= $pegawai['nip'] ?></td>
                </tr>
                <tr>
                    <td>Nomor Rekening</td>
                    <td>:</td>
                    <td><?= $pegawai['no_rek'] ?></td>
                </tr>
            </table>
            <!-- Tabel Penghasilan -->
            <table class="rincian-penghasilan">
                <tr class="tr-header">
                    <th colspan="3"><b>A. Penghasilan</b></th>
                </tr>
                <!-- Isi Penghasilan, Uang Makan & Remunerasi -->
                <?php $totalPenghasilan = 0; ?>
                <?php foreach($dataPenghasilan as $data) : ?>
                <tr>
                    <td style="width:70%;"><?= $data['nama_perkiraan'] ?></td>
                    <td style="width:10%; text-align:right;">Rp. </td>
                    <td style="width:20%; text-align:right;"><?= number_format($data['jumlah'],2,',','.');?></td>
                </tr>
                <?php $totalPenghasilan = $totalPenghasilan + $data['jumlah']; ?>
                <?php endforeach; ?>
                <!-- / Penghasilan -->
                <?php foreach($dataUangMakan as $data) : ?>
                <tr>
                    <td style="width:70%;"><?= $data['nama_perkiraan'] ?></td>
                    <td style="width:10%; text-align:right;">Rp. </td>
                    <td style="width:20%; text-align:right;"><?= number_format($data['jumlah'],2,',','.');?></td>
                </tr>
                <?php $totalPenghasilan = $totalPenghasilan + $data['jumlah']; ?>
                <?php endforeach; ?>
                <!-- / Uang Makan -->
                <?php foreach($dataRemunerasi as $data) : ?>
                <tr>
                    <td style="width:70%;"><?= $data['nama_perkiraan'] ?></td>
                    <td style="width:10%; text-align:right;">Rp. </td>
                    <td style="width:20%; text-align:right;"><?= number_format($data['jumlah'],2,',','.');?></td>
                </tr>
                <?php $totalPenghasilan = $totalPenghasilan + $data['jumlah']; ?>
                <?php endforeach; ?>
                <!-- / Remunerasi -->
                <!-- End Penghasilan -->
                <!-- Total Penghasilan -->
                <tr style="background-color:#D9EDF7;">
                    <td style="width:70%;">Jumlah Penghasilan</td>
                    <td style="width:10%; text-align:right;">Rp. </td>
                    <td style="width:20%; text-align:right;"><?= number_format($totalPenghasilan,2,',','.');?></td>
                </tr>
                <!-- End Total Penghasilan -->
            </table>
            <br>
            <!-- Tabel Potongan KPPN -->
            <table class="rincian-penghasilan">
                <tr class="tr-header">
                    <th colspan="3"><b>B. Potongan KPPN</b></th>
                </tr>
                <!-- Isi Potongan KPPN -->
                <?php $totalPotonganKppn = 0; ?>
                <?php foreach($dataPotonganKppn as $data) : ?>
                <tr>
                    <td style="width:70%;"><?= $data['nama_perkiraan'] ?></td>
                    <td style="width:10%; text-align:right;">Rp. </td>
                    <td style="width:20%; text-align:right;"><?= number_format($data['jumlah'],2,',','.');?></td>
                </tr>
                <?php $totalPotonganKppn = $totalPotonganKppn + $data['jumlah']; ?>
                <?php endforeach; ?>
                <!-- End Potongan KPPN -->
                
                <!-- Total Potongan KPPN -->
                <tr style="background-color:#D9EDF7;">
                    <td style="width:70%;">Jumlah Potongan KPPN</td>
                    <td style="width:10%; text-align:right;">Rp. </td>
                    <td style="width:20%; text-align:right;"><?= number_format($totalPotonganKppn,2,',','.');?></td>
                </tr>
                <!-- End Total Potongan KPPN -->
            </table>
            <br>
            <table class="total-penghasilan">
                <tr style="background-color:#D9EDF7;">
                    <td style="width:70%;">C. JUMLAH PENGHASILAN BERSIH (A - B)</td>
                    <td style="width:10%; text-align:right;">Rp. </td>
                    <td style="width:20%; text-align:right;"><?= number_format($totalPenghasilan - $totalPotonganKppn,2,',','.');?></td>
                </tr>
            </table>
            <br>
            <table class="rincian-penghasilan">
                <tr class="tr-header">
                    <th colspan="3"><b>D. Potongan Internal</b></th>
                </tr>
                <!-- Pot. int -->
                <?php $totalPotonganInternal = 0; ?>
                <?php foreach($dataPotonganInternal as $data) : ?>
                <tr>
                    <td style="width:70%;"><?= $data['nama_perkiraan'] ?></td>
                    <td style="width:10%; text-align:right;">Rp. </td>
                    <td style="width:20%; text-align:right;"><?= number_format($data['jumlah'],2,',','.');?></td>
                </tr>
                <?php $totalPotonganInternal = $totalPotonganInternal + $data['jumlah']; ?>
                <?php endforeach; ?>
                <!-- / Pot. Int -->
                <!-- Total Pot Int -->
                <tr style="background-color:#D9EDF7;">
                    <td style="width:70%;">Jumlah Penghasilan</td>
                    <td style="width:10%; text-align:right;">Rp. </td>
                    <td style="width:20%; text-align:right;"><?= number_format($totalPotonganInternal,2,',','.');?></td>
                </tr>
                <!-- End Pot Int -->
            </table>
            <br>
            <table class="total-penghasilan">
                <tr style="background-color:#D9EDF7;">
                    <td style="width:70%;">E. JUMLAH GAJI YANG DITERIMA/DITRANSFER (C - D)</td>
                    <td style="width:10%; text-align:right;">Rp. </td>
                    <td style="width:20%; text-align:right;"><?= number_format(($totalPenghasilan - $totalPotonganKppn) - $totalPotonganInternal,2,',','.');?></td>
                </tr>
            </table>
            <br>
        </div>
    </div>
</body>
</html>
