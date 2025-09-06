<?php
require_once 'vendor/autoload.php'; // dompdf autoloader
use Dompdf\Dompdf;
use Dompdf\Options;

// Setup Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// Koneksi database
$koneksi = new mysqli("localhost", "root", "", "simanjur-smkma");

// Query data hasil SAW
$query = $koneksi->query("
  SELECT s.nama, s.kelas, h.skor_akhir, h.rekomendasi_jurusan
  FROM hasil_saw h
  JOIN siswa s ON s.id = h.siswa_id
  ORDER BY h.skor_akhir DESC
");

// HTML untuk PDF
$html = '
  <h2 style="text-align:center;">Laporan Hasil Rekomendasi Jurusan</h2>
  <table border="1" cellpadding="8" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Skor Akhir</th>
        <th>Rekomendasi Jurusan</th>
      </tr>
    </thead>
    <tbody>';

$no = 1;
while ($row = $query->fetch_assoc()) {
  $html .= '<tr>
    <td>' . $no++ . '</td>
    <td>' . $row['nama'] . '</td>
    <td>' . $row['kelas'] . '</td>
    <td>' . number_format($row['skor_akhir'], 4) . '</td>
    <td>' . $row['rekomendasi_jurusan'] . '</td>
  </tr>';
}

$html .= '
    </tbody>
  </table>
  <br><p style="text-align:right;">Dicetak pada: ' . date('d-m-Y H:i') . '</p>
';

// Generate PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Output
$dompdf->stream("laporan_hasil_saw.pdf", array("Attachment" => false));
exit;
