<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Harian</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 8mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 7px;
            color: #111;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th,
        td {
            border: 0.5px solid #333;
            padding: 3px;
            vertical-align: top;
        }

        th {
            text-align: center;
            vertical-align: middle;
            font-weight: bold;
        }

        .center {
            text-align: center;
        }

        .middle {
            vertical-align: middle;
        }

        .bold {
            font-weight: bold;
        }

        /* HEADER */
        .header-info {
            width: 42%;
            padding: 0;
            vertical-align: middle;
        }

        .header-logos {
            width: 58%;
            padding: 0;
            vertical-align: middle;
        }

        .info-table td {
            padding: 3px;
        }

        .report-title {
            text-align: center;
            font-weight: bold;
            font-size: 9px;
            line-height: 1.5;
        }

        .label {
            width: 19%;
            white-space: nowrap;
        }

        .remaining {
            text-align: center;
        }

        .logo-table {
            height: 65px;
        }

        .logo-cell {
            width: 33.333%;
            text-align: center;
            vertical-align: middle;
            padding: 3px;
        }

        .logo-label {
            font-weight: bold;
            font-size: 6px;
            margin-bottom: 4px;
        }

        .logo-img {
            max-width: 95%;
            max-height: 36px;
        }

        /* AREA UTAMA */
        .main-table {
            margin-top: 0;
        }

        .main-table th {
            height: 22px;
        }

        .scope-col {
            width: 15%;
        }

        .jenis-col {
            width: 27%;
        }

        .tenaga-col {
            width: 22%;
        }

        .alat-col {
            width: 25%;
        }

        .ket-col {
            width: 11%;
        }

        .work-area {
            height: 205px;
        }

        .work-area td {
            height: 17px;
        }

        .sub-table th,
        .sub-table td {
            padding: 3px 2px;
        }

        .sub-title {
            font-weight: bold;
            text-align: center;
            background: #fff;
        }

        .total-row {
            background: #dce5f5;
            font-weight: bold;
        }

        .bottom-table {
            margin-top: 0;
        }

        .bottom-heading {
            height: 19px;
            text-align: left;
            font-weight: bold;
            vertical-align: middle;
        }

        .bottom-content {
            height: 160px;
        }

        .keterangan-col {
            width: 23%;
        }

        .instruksi-col {
            width: 36%;
        }

        .cuaca-col {
            width: 17%;
        }

        .ttd-col {
            width: 24%;
        }

        .weather-table td {
            border: none;
            padding: 3px;
        }

        .weather-label {
            width: 35%;
        }

        .weather-wheel {
            width: 90px;
            height: 90px;
            margin: 8px auto 0;
        }

        .sign-table td {
            border: none;
            padding: 3px 2px;
        }

        .sign-label {
            width: 35%;
        }

        .signature-space {
            height: 28px;
        }

        .obstacle {
            margin-top: 16px;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <table>
        <tr>
            <td class="header-info">
                <table class="info-table">
                    <tr>
                        <td colspan="2" class="report-title">
                            LAPORAN HARIAN<br>
                            PEMBANGUNAN VILLA LUSH SEMINYAK
                        </td>
                    </tr>
                    <tr>
                        <td class="label">NOMOR</td>
                        <td>: 332/LH/TLP-VLS/XII/2025</td>
                    </tr>
                    <tr>
                        <td class="label">TANGGAL</td>
                        <td>: 13-DESEMBER-2025</td>
                    </tr>
                </table>
            </td>

            <td class="header-logos">
                <table class="logo-table">
                    <tr>
                        <td class="logo-cell">
                            <div class="logo-label">OWNER :</div>
                            <img src="{{ public_path('images/logo-lush.png') }}" class="logo-img" alt="Owner">
                        </td>
                        <td class="logo-cell">
                            <div class="logo-label">KONSULTAN PENGAWAS :</div>
                            <img src="{{ public_path('images/logo-urbella.png') }}" class="logo-img" alt="Konsultan">
                        </td>
                        <td class="logo-cell">
                            <div class="logo-label">KONTRAKTOR PELAKSANA :</div>
                            <img src="{{ public_path('images/logo-kontraktor.png') }}" class="logo-img"
                                alt="Kontraktor">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    {{-- SISA WAKTU --}}
    <table>
        <tr>
            <td style="width:42%; text-align:center;">
                Sisa Waktu : &nbsp;&nbsp; Hari Kalender
            </td>
            <td style="width:58%;"></td>
        </tr>
    </table>

    {{-- TABEL PEKERJAAN --}}
    <table class="main-table">
        <colgroup>
            <col class="scope-col">
            <col class="jenis-col">
            <col class="tenaga-col">
            <col class="alat-col">
            <col class="ket-col">
        </colgroup>

        <tr>
            <th>NO<br>SCOPE PEKERJAAN</th>
            <th>JENIS PEKERJAAN</th>
            <th colspan="1">
                TENAGA KERJA
            </th>
            <th colspan="1">
                PERALATAN UTAMA YANG DIGUNAKAN
            </th>
            <th>KETERANGAN</th>
        </tr>

        <tr>
            {{-- SCOPE PEKERJAAN --}}
            <td class="work-area">
                1 &nbsp; Pekerjaan Arsitektur
            </td>

            {{-- JENIS PEKERJAAN --}}
            <td class="work-area">
                Pekerjaan cat dinding dalam lantai 1<br><br>
                Perapihan/kompon dinding lantai 1<br><br>
                Buat dudukan conwood teras lantai 2 sisi atas kolam renang<br><br>
                Perbaikan acian lantai 2
            </td>

            {{-- TENAGA KERJA --}}
            <td class="work-area" style="padding:0;">
                <table class="sub-table">
                    <tr>
                        <th style="width:12%;">NO</th>
                        <th>JABATAN</th>
                        <th style="width:18%;">JML</th>
                    </tr>
                    <tr>
                        <td class="center">1</td>
                        <td>Site Manager</td>
                        <td class="center">1</td>
                    </tr>
                    <tr>
                        <td class="center">2</td>
                        <td>Site Adm &amp; Keu</td>
                        <td class="center">1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="2" class="center">Total Official</td>
                        <td class="center">2</td>
                    </tr>
                    <tr>
                        <td class="center">1</td>
                        <td>Mandor</td>
                        <td class="center">1</td>
                    </tr>
                    <tr>
                        <td class="center">2</td>
                        <td>Tukang</td>
                        <td class="center">5</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height:25px;"></td>
                        <td></td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="2" class="center">Total Tukang/Pekerja</td>
                        <td class="center">6</td>
                    </tr>
                </table>
            </td>

            {{-- PERALATAN DAN MATERIAL --}}
            <td class="work-area" style="padding:0;">
                <table class="sub-table">
                    <tr>
                        <th style="width:12%;">NO</th>
                        <th>NAMA</th>
                        <th style="width:17%;">SAT</th>
                        <th style="width:20%;">JUMLAH</th>
                    </tr>
                    <tr>
                        <td class="center">1</td>
                        <td>Bor listrik</td>
                        <td class="center">Unit</td>
                        <td class="center">1</td>
                    </tr>
                    <tr>
                        <td class="center">2</td>
                        <td>Gerinda</td>
                        <td class="center">Unit</td>
                        <td class="center">1</td>
                    </tr>
                    <tr>
                        <td class="center">3</td>
                        <td>Mesin las</td>
                        <td class="center">Unit</td>
                        <td class="center">1</td>
                    </tr>
                    <tr>
                        <td class="center">4</td>
                        <td>Obeng</td>
                        <td class="center">Bh</td>
                        <td class="center">1</td>
                    </tr>
                    <tr>
                        <td class="center">5</td>
                        <td>Kuas roll</td>
                        <td class="center">Bh</td>
                        <td class="center">2</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="height:65px;"></td>
                    </tr>
                    <tr>
                        <th colspan="4">MATERIAL YANG MASUK HARI INI</th>
                    </tr>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>SAT</th>
                        <th>JUMLAH</th>
                    </tr>
                    <tr>
                        <td style="height:25px;"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="height:25px;"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </td>

            {{-- KETERANGAN KANAN --}}
            <td class="work-area"></td>
        </tr>
    </table>

    {{-- BAGIAN BAWAH --}}
    <table class="bottom-table">
        <colgroup>
            <col class="keterangan-col">
            <col class="instruksi-col">
            <col class="cuaca-col">
            <col class="ttd-col">
        </colgroup>

        <tr>
            <td class="bottom-heading">KETERANGAN</td>
            <td class="bottom-heading">INSTRUKSI CATATAN</td>
            <td class="bottom-heading">KEADAAN CUACA</td>
            <td class="bottom-heading">
                DIBUAT OLEH : KONTRAKTOR PT. TUGU LILIN PRAKARSA
            </td>
        </tr>

        <tr>
            <td class="bottom-content">
                JAM KERJA SIANG : 08.00 SD 16.00 WITA<br><br>
                JAM KERJA MALAM : 17.00 SD 21.00 WITA<br><br><br><br>
                HARI SEPENUHNYA DAPAT DIPERGUNAKAN<br>
                UNTUK BEKERJA KARENA :<br><br><br>
                HARI SEPENUHNYA DAPAT DIPERGUNAKAN<br>
                UNTUK BEKERJA KARENA :<br><br>
                <div class="obstacle">
                    HAMBATAN DAN KENDALA PEKERJAAN :
                </div>
            </td>

            <td class="bottom-content"></td>

            <td class="bottom-content" style="padding:0;">
                <table class="weather-table">
                    <tr>
                        <td class="weather-label">PAGI</td>
                        <td>: CERAH</td>
                    </tr>
                    <tr>
                        <td>SIANG</td>
                        <td>: CERAH</td>
                    </tr>
                    <tr>
                        <td>SORE</td>
                        <td>: HUJAN</td>
                    </tr>
                    <tr>
                        <td>MALAM</td>
                        <td>: HUJAN</td>
                    </tr>
                </table>

                <div class="weather-wheel"></div>
            </td>

            <td class="bottom-content" style="padding:0;">
                <table class="sign-table">
                    <tr>
                        <td class="sign-label">Nama</td>
                        <td>: Arif Y</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>: Site Manager</td>
                    </tr>
                    <tr>
                        <td>Tanda Tangan</td>
                        <td>:</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="signature-space"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bold">
                            DISETUJUI OLEH : MANAJEMEN KONSTRUKSI CV. URBAN EKOLOGI KONSULTAN
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: Kevin, S. Tr. T</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>: Site Engineer</td>
                    </tr>
                    <tr>
                        <td>Tanda Tangan</td>
                        <td>:</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>
