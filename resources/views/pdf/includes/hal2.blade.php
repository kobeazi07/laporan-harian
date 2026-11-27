@foreach ($fotoPerHalaman as $fotoHalaman)
    <div class="page documentation-page">

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
        {{-- DOKUMENTASI FOTO --}}
        <table class="documentation-table">
            @foreach ($fotoHalaman as $foto)
                <tr>
                    <td>
                        <img src="{{ public_path($foto->foto) }}" class="documentation-image">
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endforeach
