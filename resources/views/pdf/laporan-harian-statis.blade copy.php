<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Harian Pekerjaan Konstruksi</title>

    @include('pdf.includes.style')
</head>

<body>

    <div class="page">

        <!-- HEADER PERUSAHAAN -->
        <table class="company-header">
            <tr>
                <th>
                    PEMBERI TUGAS
                    <strong>PT. Mandara Prima Nusantara</strong>
                </th>

                <th>
                    KONSULTAN PENGAWAS
                    <strong>PT. RPNP Desain Hijau Indonesia</strong>
                </th>

                <th>
                    KONTRAKTOR PELAKSANA
                    <strong>PT. Usaha Raya Adipuratama</strong>
                </th>
            </tr>
        </table>

        <!-- JUDUL -->
        <div class="title-header">
            <h2>LAPORAN HARIAN</h2>
            <p>PEKERJAAN KONSTRUKSI</p>
        </div>

        <!-- INFORMASI LAPORAN -->
        <table class="info-table">
            <tr>
                <td width="8%" class="info-label">TANGGAL</td>
                <td width="38%">Kamis, 19 November 2026</td>

                <td width="12%" class="info-label">MANPOWER</td>
                <td width="17%">12 orang</td>

                <td width="9%" class="info-label">CUACA</td>
                <td width="16%">Cerah</td>
            </tr>
        </table>

        <!-- URAIAN PEKERJAAN -->
        <table class="work-table">
            <thead>
                <tr>
                    <th colspan="2" class="section-title">
                        URAIAN PEKERJAAN / RENCANA KERJA
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="number">1.</td>
                    <td>Persiapan dan pembersihan area kerja</td>
                </tr>
                <tr>
                    <td class="number">2.</td>
                    <td>Pengukuran serta pemasangan bouwplank</td>
                </tr>
                <tr>
                    <td class="number">3.</td>
                    <td>Penimbunan area kerja</td>
                </tr>
                <tr>
                    <td class="number">4.</td>
                    <td>Pemadatan tanah dasar</td>
                </tr>
                <tr>
                    <td class="number">5.</td>
                    <td>Survey titik kontrol kontraktor</td>
                </tr>
                <tr>
                    <td class="number">6.</td>
                    <td>Mobilisasi alat berat ke lokasi</td>
                </tr>
                <tr>
                    <td class="number">7.</td>
                    <td>Mobilisasi tiang pancang</td>
                </tr>
                <tr>
                    <td class="number">8.</td>
                    <td>Lansir material batu</td>
                </tr>
                <tr>
                    <td class="number">9.</td>
                    <td>Pemeriksaan elevasi pekerjaan</td>
                </tr>
                <tr>
                    <td class="number">10.</td>
                    <td>Pembersihan akhir area pekerjaan</td>
                </tr>
            </tbody>
        </table>

        <!-- PERALATAN DAN MATERIAL -->
        <!-- PERALATAN DAN MATERIAL -->


        <!-- PERALATAN DAN MATERIAL -->
        <table class="equipment-wrapper">
            <tr>
                <!-- TABEL PERALATAN -->
                <td class="equipment-column">
                    <table class="detail-table">
                        <colgroup>
                            <col width="9%">
                            <col width="66%">
                            <col width="25%">
                        </colgroup>

                        <thead>
                            <tr>
                                <th colspan="3">PERALATAN UTAMA</th>
                            </tr>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>JUMLAH</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Excavator</td>
                                <td>1 unit</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Crane pancang + leader</td>
                                <td>1 unit</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Hammer DD 25</td>
                                <td>1 unit</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Mobil crane</td>
                                <td>1 unit</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Dump truck</td>
                                <td>3 unit</td>
                            </tr>

                            <tr class="empty-row">
                                <td>6</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr class="empty-row">
                                <td>7</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr class="empty-row">
                                <td>8</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr class="empty-row">
                                <td>9</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr class="empty-row">
                                <td>10</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </td>

                <!-- TABEL MATERIAL -->
                <td class="equipment-column">
                    <table class="detail-table">
                        <colgroup>
                            <col width="9%">
                            <col width="66%">
                            <col width="25%">
                        </colgroup>

                        <thead>
                            <tr>
                                <th colspan="3">MATERIAL</th>
                            </tr>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>JUMLAH</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tiang pancang 40x40</td>
                                <td>10 btg</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Besi tulangan D19</td>
                                <td>50 btg</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Besi tulangan D16</td>
                                <td>40 btg</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Besi tulangan D13</td>
                                <td>30 btg</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Besi tulangan D10</td>
                                <td>30 btg</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Pasir</td>
                                <td>5 m³</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Koral split</td>
                                <td>5 m³</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Batu sap</td>
                                <td>3 m³</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Semen</td>
                                <td>50 zak</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Kawat bendrat</td>
                                <td>10 kg</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>

        <!-- KENDALA DAN CATATAN -->
        <table class="notes-table">
            <thead>
                <tr>
                    <th width="50%">KENDALA / HAMBATAN</th>
                    <th width="50%">CATATAN MK</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Tidak ada kendala berarti.</td>
                    <td>
                        1. Optimalkan mobilisasi material dan peralatan.<br>
                        2. Validasi titik kontrol sebelum pekerjaan.
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- TANGGAL TANDA TANGAN -->
        <div class="location-date">
            Sanggau, 19 November 2026
        </div>

        <!-- TANDA TANGAN -->
        <table class="signature">
            <tr>
                <td>
                    Diketahui Oleh
                    <div class="company">
                        OWNER PROJECT<br>
                        PT. MANDARA PRIMA NUSANTARA
                    </div>
                    <div class="sign-space"></div>
                    <div class="person">ADRIANA NEYSA</div>
                    <div class="position">Project Manager</div>
                </td>

                <td>
                    Disetujui Oleh
                    <div class="company">
                        PENYEDIA JASA<br>
                        PT. USAHA RAYA ADIPURATAMA
                    </div>
                    <div class="sign-space"></div>
                    <div class="person">ANDY DARWIN K.H.</div>
                    <div class="position">Site Manager Lapangan</div>
                </td>

                <td>
                    Dibuat Oleh
                    <div class="company">
                        SUPERVISI<br>
                        PT. RPNP DESAIN HIJAU INDONESIA
                    </div>
                    <div class="sign-space"></div>
                    <div class="person">SYAHRIL RAMADHAN, ST.</div>
                    <div class="position">Team Leader</div>
                </td>
            </tr>
        </table>

    </div>

</body>

</html>
