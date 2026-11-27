@extends('layouts.index')

@section('konten')
    <div class="row">
        {{-- HEADER --}}
        <div class="col-12 mb-4">
            <h4 class="fw-semibold mb-1">Dashboard Laporan Harian</h4>
            <p class="text-muted mb-0">
                Monitoring progress pekerjaan konstruksi
            </p>
        </div>

        {{-- TOTAL LAPORAN --}}
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Total Laporan</p>
                            <h3 class="fw-bold mb-0">
                                {{ number_format($totalLaporan) }}
                            </h3>
                        </div>
                        <span class="btn btn-primary rounded-circle">
                            <i class="ti ti-report fs-5"></i>
                        </span>
                    </div>
                    <small class="text-muted">Seluruh laporan harian</small>
                </div>
            </div>
        </div>

        {{-- DRAFT --}}
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Laporan Draft</p>
                            <h3 class="fw-bold mb-0">
                                {{ number_format($laporanDraft) }}
                            </h3>
                        </div>
                        <span class="btn btn-warning rounded-circle">
                            <i class="ti ti-file-text fs-5"></i>
                        </span>
                    </div>
                    <small class="text-muted">Menunggu dokumentasi foto</small>
                </div>
            </div>
        </div>

        {{-- SUDAH FOTO --}}
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Sudah Dokumentasi</p>
                            <h3 class="fw-bold mb-0">
                                {{ number_format($laporanFoto) }}
                            </h3>
                        </div>
                        <span class="btn btn-success rounded-circle">
                            <i class="ti ti-camera fs-5"></i>
                        </span>
                    </div>
                    <small class="text-muted">Laporan berstatus sudah foto</small>
                </div>
            </div>
        </div>

        {{-- MONITORING CUACA --}}
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Laporan Cuaca Hujan</p>
                            <h3 class="fw-bold mb-0">
                                {{ number_format($totalCuacaHujan) }}
                            </h3>
                        </div>
                        <span class="btn btn-info rounded-circle">
                            <i class="ti ti-cloud-rain fs-5"></i>
                        </span>
                    </div>
                    <small class="text-muted">Akumulasi pengamatan hujan</small>
                </div>
            </div>
        </div>

        {{-- GRAFIK --}}
        <div class="col-lg-8">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title mb-1">Grafik Laporan Harian</h4>
                            <p class="card-subtitle">
                                Jumlah laporan per bulan tahun {{ now()->year }}
                            </p>
                        </div>
                    </div>

                    <div id="laporan-chart" class="mt-4"></div>
                </div>
            </div>
        </div>

        {{-- RINGKASAN STATUS --}}
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title">Ringkasan Status</h4>
                    <p class="card-subtitle">Status laporan harian</p>

                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Draft</span>
                            <strong>{{ $laporanDraft }}</strong>
                        </div>
                        <div class="progress mb-4" style="height: 9px;">
                            <div class="progress-bar bg-warning"
                                style="width: {{ $totalLaporan > 0 ? ($laporanDraft / $totalLaporan) * 100 : 0 }}%">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Sudah Dokumentasi</span>
                            <strong>{{ $laporanFoto }}</strong>
                        </div>
                        <div class="progress mb-4" style="height: 9px;">
                            <div class="progress-bar bg-success"
                                style="width: {{ $totalLaporan > 0 ? ($laporanFoto / $totalLaporan) * 100 : 0 }}%">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Total Laporan</span>
                        <strong>{{ $totalLaporan }}</strong>
                    </div>
                </div>
            </div>
        </div>

        {{-- LAPORAN TERBARU --}}
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="card-title mb-1">Laporan Terbaru</h4>
                            <p class="card-subtitle">5 laporan terakhir</p>
                        </div>

                        <a href="{{ route('HalamanAdminlapharian', 1) }}" class="btn btn-primary btn-sm">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Laporan</th>
                                    <th>Tanggal</th>
                                    <th>Petugas</th>
                                    <th>Manpower</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($laporanTerbaru as $key => $lap)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="fw-semibold">{{ $lap->nomor }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($lap->tanggal)->format('d/m/Y') }}
                                        </td>
                                        <td>{{ $lap->pembuat->name ?? '-' }}</td>
                                        <td>{{ $lap->jumlah_man_power }} orang</td>
                                        <td>
                                            @if ($lap->status == 1)
                                                <span class="badge bg-warning text-dark">Draft</span>
                                            @elseif ($lap->status == 2)
                                                <span class="badge bg-success">Already Photo</span>
                                            @else
                                                <span class="badge bg-secondary">Unknown</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            Belum ada laporan harian.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof ApexCharts === 'undefined') return;

            const options = {
                series: [{
                    name: 'Jumlah Laporan',
                    data: @json($grafikLaporan)
                }],
                chart: {
                    type: 'area',
                    height: 300,
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                xaxis: {
                    categories: @json($bulan)
                },
                yaxis: {
                    min: 0,
                    forceNiceScale: true,
                    labels: {
                        formatter: function(value) {
                            return Math.round(value);
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return value + ' laporan';
                        }
                    }
                }
            };

            new ApexCharts(
                document.querySelector("#laporan-chart"),
                options
            ).render();
        });
    </script>
@endsection
