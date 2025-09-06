<?php
require_once 'koneksi.php'; // file koneksi ke database

require('vendor/autoload.php'); // Dompdf

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Ambil data hasil SAW dari database
$query = mysqli_query($conn, "SELECT * FROM hasil_saw ORDER BY total DESC");

$html = '<h3 align="center">Laporan Hasil Perhitungan SAW</h3>
<table border="1" width="100%" cellpadding="5" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Nama Siswa</th>
    <th>Kelas</th>
    <th>Total</th>
    <th>Rekomendasi Jurusan</th>
  </tr>';

$no = 1;
while ($row = mysqli_fetch_assoc($query)) {
  $html .= '<tr>
      <td>' . $no++ . '</td>
      <td>' . $row['nama'] . '</td>
      <td>' . $row['kelas'] . '</td>
      <td>' . number_format($row['total'], 4) . '</td>
      <td>' . $row['jurusan'] . '</td>
    </tr>';
}

$html .= '</table>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("laporan-hasil-saw.pdf", array("Attachment" => false));
exit;
?>
