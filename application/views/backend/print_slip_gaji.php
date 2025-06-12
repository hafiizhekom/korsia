<!DOCTYPE html>
<html>
<head>
    <title>Print Slip Gaji</title>
</head>
<body>


<div class="cetak" width="20%">
<div class="header" style="border-bottom: 5px dashed black;">
    <center>
        <h1 style="font-size:3em;margin:0;padding:0;">PT. KORSIA BOAN PERKASA</h1>   
        <h3 style="font-size:2em;margin:0;padding:0;">L'Avenue Office Tower Lantai 26C</h3>
        <h5 style="font-size:1em;margin:0;padding:0;">Jl. Raya Pasar Minggu Kav. 16</h5>
        <p style="font-size:1em;margin:0;padding:0;">Poscom-Jakarta Selatan:12720</small>
    </center>   
</div>
<div class="body" style="width:100%;">
<div style="width:50%;float:left;">
    <table border='0' style='margin-top:30px;margin-left:30px;font-size:1em;'>
    <tr><td style="font-weight:bold;">Departemen </td><td>: <?=$data_departemenkaryawan?></td></tr>
    <tr><td style="font-weight:bold;">Periode </td><td>: <?=$data_periode?></td></tr>
    <tr><td style="font-weight:bold;">Nama </td><td>: <?=$data_namakaryawan?></td></tr>
    <tr><td style="font-weight:bold;">Perhitungan </td><td>: Monthly</td></tr>
    <tr><td style="font-weight:bold;">Pembayaran </td><td>: Transfer</td></tr>
    </table>
</div>
<div style="width:50%;float:left;">
<table border='0' style='margin-top:30px;margin-left:30px;font-size:1em;'>
    <tr><td style="font-weight:bold;">NPWP </td><td>: <?=$data_npwpkaryawan?></td></tr>
    <tr><td style="font-weight:bold;">Jenis Kelamin </td><td>: <?=$data_jeniskelaminkaryawan?></td></tr>
    <tr><td style="font-weight:bold;">Tanggal Masuk </td><td>: <?=$data_tanggalmasukkaryawan?></td></tr>
    <tr><td style="font-weight:bold;">Tanggal Bayar </td><td>: <?=$data_tanggalbayar?></td></tr>
    </table>
</div>

<div style="width:100%;float:left;">
<table border='0' style='margin-top:30px;margin-left:30px;font-size:1em;'>
    <tr><td style="font-weight:bold;">Gaji Pokok </td><td>: Rp. <?=$data_gaji?></td></tr>
    <tr><td style="font-weight:bold;">Tunjangan Jabatan </td><td>: Rp. <?=$data_uangjabatan?></td></tr>
    <tr><td style="font-weight:bold;">Uang Kehadiran </td><td>: Rp. <?=$data_totaluangkehadiran?></td></tr>
    <tr><td style="font-weight:bold;">Lembur Hari Kerja </td><td>: Rp. <?=$data_totallemburkerja?></td></tr>
    <tr><td style="font-weight:bold;">Lembur Hari Libur </td><td>: Rp. <?=$data_totallemburlibur?></td></tr>
    <tr><td style="font-weight:bold;">Gaji Bruto </td><td style="border-top: 1px solid black;border-bottom: 1px solid black;">: Rp. <?=$data_bruto?></td></tr>
    <tr><td style="font-weight:bold;">Potongan Tunjangan Kesehatan </td><td>: Rp. <?=$data_hasilpotongankesehatan?></td></tr>
    <tr><td style="font-weight:bold;">Potongan Tunjangan Ketenagakerjaan </td><td>: Rp. <?=$data_hasilpotonganketenagakerjaan?></td></tr>
    <tr><td style="font-weight:bold;">Potongan Tunjangan Pensiun </td><td>: Rp. <?=$data_hasilpotonganpensiun?></td></tr>
    <tr><td style="font-weight:bold;">Absen </td><td>: Rp. <?=$data_totalpotonganabsen?></td></tr>
    <tr><td style="font-weight:bold;">Gaji </td><td style="border-top: 1px solid black;border-bottom: 1px solid black;">: Rp. <?=$data_realgaji?></td></tr>
    </table>
</div>

<div style="float:right;">
<p>Mengetahui,</p>
<br>
<br>
<br>
<p>Dhody Rahmat Syamudin</p>
</div>
</body> 

</div>
<script>
window.onload = function () {
    window.print();
}</script>
</body>
</html>