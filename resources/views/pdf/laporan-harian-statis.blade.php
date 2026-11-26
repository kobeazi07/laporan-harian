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
                <td width="38%">
                    {{ \Carbon\Carbon::parse($lap_harian->tanggal)->locale('id')->translatedFormat('l, d F Y') }}
                </td>

                <td width="12%" class="info-label">MANPOWER</td>
                <td width="17%">
                    {{ $lap_harian->jumlah_man_power }} orang
                </td>

                <td width="9%" class="info-label">CUACA</td>
                <td width="16%">
                    @php
                        $cuacaOptions = [
                            1 => 'Cerah',
                            2 => 'Hujan',
                            3 => 'Gerimis',
                        ];
                    @endphp

                    Pagi: {{ $cuacaOptions[$cuaca->pagi ?? 0] ?? '-' }} <br>
                    Siang: {{ $cuacaOptions[$cuaca->siang ?? 0] ?? '-' }} <br>
                    Sore: {{ $cuacaOptions[$cuaca->sore ?? 0] ?? '-' }}
                </td>
            </tr>
        </table>
        <!-- URAIAN PEKERJAAN -->
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
                    <td colspan="2">
                        {!! str_replace('&nbsp;', ' ', $lap_harian->instruksi_catatan ?? '') !!}
                    </td>
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
                            <col style="width: 9%;">
                            <col style="width: 66%;">
                            <col style="width: 25%;">
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
                            @for ($i = 0; $i < $totalRows; $i++)
                                @php
                                    $item = $alat_input[$i] ?? null;
                                @endphp

                                <tr>
                                    <td>{{ $i + 1 }}</td>

                                    <td>
                                        {{ $item ? $item->alat->nama ?? '-' : '' }}
                                    </td>

                                    <td>
                                        @if ($item)
                                            {{ $item->jumlah }}
                                            {{ $item->unit->nama ?? '' }}
                                        @endif
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </td>

                <!-- TABEL MATERIAL -->
                <td class="equipment-column">
                    <table class="detail-table">
                        <colgroup>
                            <col style="width: 9%;">
                            <col style="width: 66%;">
                            <col style="width: 25%;">
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
                            @for ($i = 0; $i < $totalRows; $i++)
                                @php
                                    $item = $material_input[$i] ?? null;
                                @endphp

                                <tr>
                                    <td>{{ $i + 1 }}</td>

                                    <td>
                                        {{ $item ? $item->material->nama ?? '-' : '' }}
                                    </td>

                                    <td>
                                        @if ($item)
                                            {{ $item->jumlah }}
                                            {{ $item->unit->nama ?? '' }}
                                        @endif
                                    </td>
                                </tr>
                            @endfor
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

                    <td>
                        {!! str_replace('&nbsp;', ' ', $lap_harian->kendala ?? '') !!}
                    </td>

                    <td>

                        {!! str_replace('&nbsp;', ' ', $lap_harian->keterangan ?? '') !!}
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
