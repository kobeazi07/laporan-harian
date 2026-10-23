@extends('layouts.index')


@section('konten')
    <style>
        .kamera-card {
            border: 0;
            border-radius: 16px;
            overflow: hidden;
        }

        .kamera-preview {
            width: 100%;
            max-height: 520px;
            object-fit: contain;
            background: #171717;
            border-radius: 12px;
        }

        .kamera-status {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 12px;
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        #canvasFoto {
            width: 100%;
            height: auto;
            border-radius: 12px;
            background: #eee;
        }

        .btn-kamera {
            min-height: 48px;
            border-radius: 10px;
            font-weight: 600;
        }

        .label-section {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }
    </style>
    <div class="body-wrapper-inner" style="margin-top: -100px;">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1">Dokumentasi Lapangan</h4>
                    <p class="text-muted mb-0">
                        Ambil foto dengan informasi lokasi dan waktu otomatis.
                    </p>
                </div>
            </div>

            <div class="card kamera-card shadow-sm">
                <div class="card-body p-3 p-md-4">

                    {{-- Informasi proyek --}}
                    <div class="mb-3">
                        <label for="namaProyek" class="form-label label-section">
                            Nama Proyek
                        </label>
                        <input type="hidden" name= "lap_harian_id" value="{{ $lap_harian->id }}">
                        <input type="text" id="namaProyek" class="form-control"
                            value="{{ $lap_harian->project->nama_project ?? '' }}" placeholder="Nama proyek" disabled>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="keteranganFoto" class="form-label label-section">
                            Keterangan Dokumentasi
                        </label>
                        <textarea id="keteranganFoto" class="form-control" rows="2" placeholder="Contoh: Pekerjaan pengecoran lantai 2"></textarea>
                    </div> --}}

                    {{-- Informasi GPS --}}
                    <div class="kamera-status mb-3">
                        <div class="fw-semibold mb-2">
                            <i class="bi bi-geo-alt"></i> Informasi Lokasi
                        </div>

                        <div id="statusGPS" class="text-muted">
                            Lokasi belum diambil.
                        </div>

                        <div id="koordinatGPS" class="mt-1">
                            Latitude: - | Longitude: -
                        </div>

                        <div id="akurasiGPS" class="mt-1">
                            Akurasi GPS: -
                        </div>

                        <div id="alamatGPS" class="mt-1">
                            Alamat: sedang menunggu lokasi.
                        </div>

                        <div id="waktuGPS" class="mt-1">
                            Waktu: -
                        </div>
                    </div>

                    {{-- Area kamera --}}
                    <div id="areaKamera" class="mb-3" style="display:none;">
                        <div class="label-section">Kamera</div>

                        <video id="videoKamera" class="kamera-preview" autoplay playsinline muted></video>

                        <div class="row g-2 mt-3">


                            <div class="col-2">
                                <button type="button" id="btnCancelFoto" class="btn btn-outline-danger w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708" />
                                    </svg>
                                </button>
                            </div>
                            <div class="col-10">
                                <button type="button" id="btnAmbilFoto" class="btn btn-success w-100">
                                    Ambil Foto
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Preview foto dengan watermark --}}
                    <div id="areaPreview" style="display:none;" class="mb-3">
                        <div class="label-section">Preview Foto Watermark</div>

                        <canvas id="canvasFoto"></canvas>

                        <div class="row g-2 mt-2">
                            <div class="col-6">
                                <button type="button" id="btnUlangi" class="btn btn-outline-secondary btn-kamera w-100">
                                    Foto Ulang
                                </button>
                            </div>

                            <div class="col-6">
                                <button type="button" id="btnUpload" class="btn btn-primary btn-kamera w-100">
                                    Upload Foto
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Tombol mulai --}}
                    <div id="areaMulai">
                        <div class="d-grid">
                            <button type="button" id="btnBukaKamera" class="btn btn-primary btn-kamera">
                                <i class="bi bi-camera-fill me-1"></i>
                                Buka Kamera dan Ambil Lokasi
                            </button>
                        </div>
                    </div>

                    <div id="pesanUpload" class="mt-3" aria-live="polite"></div>

                </div>
            </div>
        </div>
        <div class="container-fluid mt-100" style="margin-top: -100px;">
            <div class="row g-3">
                @foreach ($foto as $itemFoto)
                    <div class="col-6 col-md-4 col-xl-3">
                        <div class="blog-item foto-card">

                            {{-- Foto --}}
                            <div class="blog-img">
                                <a href="{{ asset($itemFoto->foto) }}" data-lightbox="Blog-1"
                                    data-title="Dokumentasi laporan harian" class="lightbox-link">

                                    <img src="{{ asset($itemFoto->foto) }}" class="img-fluid rounded-image"
                                        alt="Dokumentasi laporan harian" loading="lazy">
                                </a>

                                {{-- Tombol hapus --}}
                                <form action="{{ route('dokumentasi.destroy', $itemFoto->id) }}" method="POST"
                                    class="form-delete-foto">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-submit-delete" aria-label="Hapus foto dokumentasi"
                                        title="Hapus foto">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1 0-2H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1M4 4v9a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4zM6 2a.5.5 0 0 0-.5.5V3h5v-.5A.5.5 0 0 0 10 2z" />
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // function cekAksesKamera() {
        //     const hasil = {
        //         url: window.location.href,
        //         secureContext: window.isSecureContext,
        //         mediaDevices: !!navigator.mediaDevices,
        //         getUserMedia: !!navigator.mediaDevices?.getUserMedia,
        //         geolocation: !!navigator.geolocation
        //     };

        //     console.table(hasil);
        //     alert(JSON.stringify(hasil, null, 2));
        // }

        // cekAksesKamera();
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('videoKamera');
            const canvas = document.getElementById('canvasFoto');
            const ctx = canvas.getContext('2d');

            const btnBuka = document.getElementById('btnBukaKamera');
            const btnAmbil = document.getElementById('btnAmbilFoto');
            const btnUlangi = document.getElementById('btnUlangi');
            const btnUpload = document.getElementById('btnUpload');
            const btnCancelFoto = document.getElementById('btnCancelFoto');

            let streamKamera = null;
            let fotoSiapUpload = null;
            let posisiGPS = null;
            let alamat = '';
            let metadataFoto = null;

            const areaKamera = document.getElementById('areaKamera');
            const areaPreview = document.getElementById('areaPreview');
            const areaMulai = document.getElementById('areaMulai');
            const pesanUpload = document.getElementById('pesanUpload');

            function tampilkanPesan(pesan, jenis = 'info') {
                pesanUpload.innerHTML = '';

                const alert = document.createElement('div');
                alert.className = `alert alert-${jenis} mb-0`;
                alert.textContent = pesan;

                pesanUpload.appendChild(alert);
            }

            function formatTanggal(waktu) {
                return waktu.toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });
            }

            function formatJam(waktu) {
                return waktu.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false
                });
            }

            function hentikanKamera() {
                if (streamKamera) {
                    streamKamera.getTracks().forEach(track => track.stop());
                    streamKamera = null;
                }

                video.srcObject = null;
            }

            async function ambilGPS() {
                if (!navigator.geolocation) {
                    throw new Error('Browser tidak mendukung GPS.');
                }

                document.getElementById('statusGPS').textContent =
                    'Meminta lokasi GPS...';

                const posisi = await new Promise((resolve, reject) => {
                    navigator.geolocation.getCurrentPosition(
                        resolve,
                        reject, {
                            enableHighAccuracy: true,
                            timeout: 20000,
                            maximumAge: 0
                        }
                    );
                });

                posisiGPS = {
                    latitude: posisi.coords.latitude,
                    longitude: posisi.coords.longitude,
                    accuracy: posisi.coords.accuracy
                };

                document.getElementById('koordinatGPS').textContent =
                    `Latitude: ${posisiGPS.latitude.toFixed(6)} | ` +
                    `Longitude: ${posisiGPS.longitude.toFixed(6)}`;

                document.getElementById('akurasiGPS').textContent =
                    `Akurasi GPS: ±${Math.round(posisiGPS.accuracy)} meter`;

                document.getElementById('statusGPS').textContent =
                    'Koordinat berhasil diperoleh.';

                // Reverse geocoding untuk mencari alamat dari koordinat.
                // Untuk produksi, gunakan layanan geocoding sesuai kebijakan layanannya.
                document.getElementById('alamatGPS').textContent =
                    'Alamat sedang dicari...';

                try {
                    const params = new URLSearchParams({
                        format: 'jsonv2',
                        lat: posisiGPS.latitude,
                        lon: posisiGPS.longitude
                    });

                    const response = await fetch(
                        `https://nominatim.openstreetmap.org/reverse?${params}`
                    );

                    if (!response.ok) {
                        throw new Error('Layanan alamat tidak tersedia.');
                    }

                    const data = await response.json();
                    alamat = data.display_name || 'Alamat tidak ditemukan';
                } catch (error) {
                    alamat = 'Alamat tidak berhasil diperoleh';
                }

                document.getElementById('alamatGPS').textContent =
                    `Alamat: ${alamat}`;

                return posisiGPS;
            }

            btnBuka.addEventListener('click', async function() {
                btnBuka.disabled = true;
                tampilkanPesan('Mengambil lokasi dan membuka kamera...', 'info');

                try {
                    // Ambil GPS terlebih dahulu.
                    await ambilGPS();

                    // Meminta kamera belakang jika tersedia.
                    streamKamera = await navigator.mediaDevices.getUserMedia({
                        audio: false,
                        video: {
                            facingMode: {
                                ideal: 'environment'
                            },
                            width: {
                                ideal: 1920
                            },
                            height: {
                                ideal: 1080
                            }
                        }
                    });

                    video.srcObject = streamKamera;
                    await video.play();

                    areaKamera.style.display = 'block';
                    areaMulai.style.display = 'none';
                    areaPreview.style.display = 'none';

                    tampilkanPesan('Kamera siap digunakan.', 'success');
                } catch (error) {
                    console.error(error);

                    let pesan = 'Tidak dapat membuka kamera atau mengambil GPS.';

                    if (error.code === 1) {
                        pesan = 'Izin lokasi ditolak. Aktifkan izin lokasi di browser.';
                    } else if (error.name === 'NotAllowedError') {
                        pesan = 'Izin kamera ditolak. Aktifkan izin kamera di browser.';
                    } else if (error.name === 'NotFoundError') {
                        pesan = 'Kamera tidak ditemukan pada perangkat ini.';
                    } else if (error.name === 'NotReadableError') {
                        pesan = 'Kamera sedang digunakan aplikasi lain.';
                    } else if (error.message) {
                        pesan = error.message;
                    }

                    tampilkanPesan(pesan, 'danger');
                } finally {
                    btnBuka.disabled = false;
                }
            });

            btnAmbil.addEventListener('click', function() {
                if (!streamKamera || !posisiGPS || !video.videoWidth) {
                    tampilkanPesan('Kamera atau GPS belum siap.', 'warning');
                    return;
                }

                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;

                // Ambil gambar dari kamera.
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

                // Waktu dicatat ketika foto diambil.
                const waktuFoto = new Date();

                metadataFoto = {
                    tanggal: formatTanggal(waktuFoto),
                    jam: formatJam(waktuFoto),
                    tanggal_jam_iso: waktuFoto.toISOString(),
                    latitude: posisiGPS.latitude,
                    longitude: posisiGPS.longitude,
                    akurasi_gps: posisiGPS.accuracy,
                    alamat: alamat,
                    nama_proyek: document.getElementById('namaProyek').value.trim(),
                    // keterangan: document.getElementById('keteranganFoto').value.trim()
                };

                document.getElementById('waktuGPS').textContent =
                    `Waktu pengambilan: ${metadataFoto.tanggal} ${metadataFoto.jam}`;

                // Watermark.
                const namaProyek = metadataFoto.nama_proyek || 'Dokumentasi Proyek';
                const padding = Math.round(canvas.width * 0.025);
                const fontSize = Math.max(18, Math.round(canvas.width * 0.018));
                const lineHeight = Math.round(fontSize * 1.5);
                const maxWidth = canvas.width - padding * 2;

                const lines = [
                    `Proyek: ${namaProyek}`,
                    // keterangan,
                    `Tanggal: ${metadataFoto.tanggal}`,
                    `Jam: ${metadataFoto.jam}`,
                    `Latitude: ${metadataFoto.latitude.toFixed(6)}`,
                    `Longitude: ${metadataFoto.longitude.toFixed(6)}`,
                    `Akurasi GPS: ±${Math.round(metadataFoto.akurasi_gps)} meter`,
                    metadataFoto.alamat
                ];

                ctx.font = `bold ${fontSize}px Arial`;

                const wrappedLines = [];

                lines.forEach(line => {
                    let current = '';

                    for (const word of line.split(/\s+/)) {
                        const test = current ? `${current} ${word}` : word;

                        if (ctx.measureText(test).width > maxWidth && current) {
                            wrappedLines.push(current);
                            current = word;
                        } else {
                            current = test;
                        }
                    }

                    if (current) wrappedLines.push(current);
                });
                const panelWidth = canvas.width * 0.7;

                const panelHeight =
                    padding * 1 + wrappedLines.length * lineHeight;

                const panelX = 0;
                const panelY = canvas.height - panelHeight;

                ctx.fillStyle = 'rgba(0, 0, 0, 0.25)';
                ctx.fillRect(panelX, panelY, panelWidth, panelHeight);

                ctx.fillStyle = '#fff';
                ctx.textBaseline = 'top';

                ctx.lineWidth = 2;
                ctx.strokeStyle = 'rgba(0, 0, 0, 0.9)';
                ctx.lineJoin = 'round';

                wrappedLines.forEach((line, index) => {
                    const x = padding;
                    const y = panelY + padding + index * lineHeight;

                    ctx.strokeText(line, x, y, maxWidth);

                    ctx.fillStyle = '#fff';
                    ctx.fillText(line, x, y, maxWidth);
                });

                wrappedLines.forEach((line, index) => {
                    ctx.fillText(
                        line,
                        padding,
                        panelY + padding + index * lineHeight,
                        maxWidth
                    );
                });

                canvas.toBlob(function(blob) {
                    if (!blob) {
                        tampilkanPesan('Gagal memproses foto.', 'danger');
                        return;
                    }

                    fotoSiapUpload = blob;
                    areaPreview.style.display = 'block';

                    // Matikan kamera setelah foto diambil.
                    hentikanKamera();

                    tampilkanPesan(
                        'Foto siap diunggah. Periksa watermark sebelum melanjutkan.',
                        'success'
                    );
                }, 'image/jpeg', 0.92);
            });

            btnUlangi.addEventListener('click', async function() {
                fotoSiapUpload = null;
                metadataFoto = null;

                areaPreview.style.display = 'none';
                areaKamera.style.display = 'none';
                areaMulai.style.display = 'block';

                // Buka kamera 
                btnBuka.click();
            });
            btnCancelFoto.addEventListener('click', function() {
                hentikanKamera();

                fotoSiapUpload = null;
                metadataFoto = null;

                areaKamera.style.display = 'none';
                areaPreview.style.display = 'none';
                areaMulai.style.display = 'block';

                ctx.clearRect(0, 0, canvas.width, canvas.height);

                tampilkanPesan('Pengambilan foto dibatalkan.', 'warning');
            });

            btnUpload.addEventListener('click', async function() {
                if (!fotoSiapUpload || !metadataFoto) {
                    tampilkanPesan('Silakan ambil foto terlebih dahulu.', 'warning');
                    return;
                }

                const formData = new FormData();
                formData.append('lap_harian_id', $('input[name="lap_harian_id"]').val());
                formData.append('foto', fotoSiapUpload, 'dokumentasi.jpg');
                formData.append('nama_proyek', metadataFoto.nama_proyek);
                // formData.append('keterangan', metadataFoto.keterangan);
                formData.append('latitude', metadataFoto.latitude);
                formData.append('longitude', metadataFoto.longitude);
                formData.append('akurasi_gps', metadataFoto.akurasi_gps);
                formData.append('alamat', metadataFoto.alamat);
                formData.append('tanggal_jam', metadataFoto.tanggal_jam_iso);

                btnUpload.disabled = true;
                btnUpload.textContent = 'Mengunggah...';

                try {
                    const response = await fetch(
                        @json(route('dokumentasi.upload')), {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]'
                                ).content,
                                'Accept': 'application/json'
                            },
                            body: formData
                        }
                    );

                    const result = await response.json();

                    if (!response.ok) {
                        if (result.errors) {
                            const firstError = Object.values(result.errors).flat()[0];
                            throw new Error(firstError || result.message || 'Upload gagal.');
                        }

                        throw new Error(result.message || 'Upload gagal.');
                    }

                    tampilkanPesan(
                        result.message || 'Foto berhasil diunggah.',
                        'success'
                    );
                    fotoSiapUpload = null;
                    metadataFoto = null;
                    areaPreview.style.display = 'none';
                    areaMulai.style.display = 'block';

                    // Refresh halaman setelah upload berhasil
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);

                } catch (error) {
                    tampilkanPesan(error.message, 'danger');
                } finally {
                    btnUpload.disabled = false;
                    btnUpload.textContent = 'Upload Foto';
                }
            });

            // Hentikan kamera jika pengguna meninggalkan halaman.
            window.addEventListener('pagehide', hentikanKamera);


        });

        // hapus foto

        $(document).on('submit', '.form-delete-foto', function(e) {
            e.preventDefault();

            let form = $(this);
            let url = form.attr('action');

            console.log('DELETE URL:', url);

            Swal.fire({
                title: 'Yakin?',
                text: 'Data akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: form.serialize(), // sudah ada _method=DELETE + _token
                        success: function(response) {
                            Swal.fire('Terhapus!', response.message, 'success')
                                .then(() => location.reload());
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            Swal.fire('Error', 'Gagal menghapus data', 'error');
                        }
                    });

                }
            });
        });
    </script>
@endsection
