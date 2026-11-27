@extends('layouts.index')


@section('konten')
    <div class="row form-input">
        <div class="col-12">
            <div class="body-wrapper-inner">
                <div class="card-body">
                    <div class="row align-items-center mb-4">
                        <div class="col">
                            <a href="{{ route('HalamanAdminlapharian', $lap_harian->project_id) }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Kembali
                            </a>
                        </div>
                        <div class="col-auto">
                            <h5 class="card-title fw-semibold mb-0">
                                Edit Laporan Harian
                            </h5>
                        </div>


                    </div>

                    <div class="card">
                        <div class="card-body">

                            <form class="formlapharian" id="formlapharian">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $lap_harian->project_id }}">

                                <input type="hidden" name="lap_harian_id" value="{{ $lap_harian->id }}">

                                {{-- INFORMASI LAPORAN --}}
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Nomor</label>
                                            <input type="text" name="nomor" id="nomor" class="form-control"
                                                value="{{ old('nomor', $lap_harian->nomor) }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type="date" name="tanggal" id="date" class="form-control"
                                                value="{{ old('tanggal', $lap_harian->tanggal ? \Carbon\Carbon::parse($lap_harian->tanggal)->format('Y-m-d') : '') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah Pekerja</label>
                                            <input type="number" name="jumlah_man_power" class="form-control"
                                                value="{{ old('jumlah_man_power', $lap_harian->jumlah_man_power) }}">
                                        </div>
                                    </div>

                                </div>

                                <hr>

                                {{-- ALAT --}}
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="col-md-7 col-12">
                                                <h5 class="fw-bold">Alat yang digunakan</h5>
                                            </div>

                                            <div class="col-md-5 col-12">
                                                <button type="button" class="btn btn-primary float-end" onclick="addak()">
                                                    Tambah +
                                                </button>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div id="akerja-container">

                                                {{-- @foreach ($alat_input as $item)
                                                    <div class="d-flex align-items-end gap-2 mb-3 w-100"
                                                        id="ak-existing-{{ $item->id }}">

                                                        <div style="flex:2; min-width:0">
                                                            <label class="form-label">Alat</label>
                                                            <select name="alat_id[]" class="form-select select2-type"
                                                                required>
                                                                <option value="">Pilih Alat</option>

                                                                @foreach ($alat as $a)
                                                                    <option value="{{ $a->id }}"
                                                                        {{ $item->alat_id == $a->id ? 'selected' : '' }}>
                                                                        {{ $a->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div style="flex:1; min-width:0">
                                                            <label class="form-label">Unit</label>
                                                            <select name="unit_id_alat[]" class="form-select select2-type"
                                                                required>
                                                                <option value="">Pilih Unit</option>

                                                                @foreach ($unit as $u)
                                                                    <option value="{{ $u->id }}"
                                                                        {{ $item->unit_id == $u->id ? 'selected' : '' }}>
                                                                        {{ $u->kode }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div style="flex:1; min-width:0">
                                                            <label class="form-label">Jumlah</label>
                                                            <input type="number" name="jumlah_alat[]" class="form-control"
                                                                value="{{ $item->jumlah }}" min="1" required>
                                                        </div>

                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removeExistingRow('ak-existing-{{ $item->id }}')">
                                                            Hapus
                                                        </button>

                                                    </div>
                                                @endforeach --}}

                                            </div>
                                        </div>

                                    </div>

                                    {{-- MATERIAL --}}
                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="col-md-7 col-12">
                                                <h5 class="fw-bold">Material yang digunakan</h5>
                                            </div>

                                            <div class="col-md-5 col-12">
                                                <button type="button" class="btn btn-primary float-end" onclick="addmk()">
                                                    Tambah +
                                                </button>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div id="mkerja-container">

                                                {{-- @foreach ($material_input as $item)
                                                    <div class="d-flex align-items-end gap-2 mb-3 w-100"
                                                        id="mk-existing-{{ $item->id }}">

                                                        <div style="flex:2; min-width:0">
                                                            <label class="form-label">Material</label>
                                                            <select name="material_id[]" class="form-select select2-type"
                                                                required>
                                                                <option value="">Pilih Material</option>

                                                                @foreach ($material as $m)
                                                                    <option value="{{ $m->id }}"
                                                                        {{ $item->material_id == $m->id ? 'selected' : '' }}>
                                                                        {{ $m->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div style="flex:1; min-width:0">
                                                            <label class="form-label">Unit</label>
                                                            <select name="unit_id_material[]"
                                                                class="form-select select2-type" required>
                                                                <option value="">Pilih Unit</option>

                                                                @foreach ($unit as $u)
                                                                    <option value="{{ $u->id }}"
                                                                        {{ $item->unit_id == $u->id ? 'selected' : '' }}>
                                                                        {{ $u->kode }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div style="flex:1; min-width:0">
                                                            <label class="form-label">Jumlah</label>
                                                            <input type="number" name="jumlah_material[]"
                                                                class="form-control" value="{{ $item->jumlah }}"
                                                                min="1" required>
                                                        </div>

                                                        <button type="button" class="btn btn-danger"
                                                            onclick="removeExistingRow('mk-existing-{{ $item->id }}')">
                                                            Hapus
                                                        </button>

                                                    </div>
                                                @endforeach --}}

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <hr>

                                {{-- CUACA --}}
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <h5 class="fw-bold">Keadaan Cuaca</h5>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Pagi</label>
                                            <select id="cuaca_pagi" name="cuaca_pagi" class="form-select select2-pagi"
                                                required>
                                                <option value="">Pilih Cuaca</option>
                                                <option value="1" {{ $cuaca->pagi == 1 ? 'selected' : '' }}>Cerah
                                                </option>
                                                <option value="2" {{ $cuaca->pagi == 2 ? 'selected' : '' }}>Hujan
                                                </option>
                                                <option value="3" {{ $cuaca->pagi == 3 ? 'selected' : '' }}>Mendung
                                                </option>
                                                <option value="4" {{ $cuaca->pagi == 4 ? 'selected' : '' }}>Gerimis
                                                </option>
                                                <option value="5" {{ $cuaca->pagi == 5 ? 'selected' : '' }}>Berawan
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Siang</label>
                                            <select id="cuaca_siang" name="cuaca_siang" class="form-select select2-siang"
                                                required>
                                                <option value="">Pilih Cuaca</option>
                                                <option value="1" {{ $cuaca->siang == 1 ? 'selected' : '' }}>Cerah
                                                </option>
                                                <option value="2" {{ $cuaca->siang == 2 ? 'selected' : '' }}>Hujan
                                                </option>
                                                <option value="3" {{ $cuaca->siang == 3 ? 'selected' : '' }}>Mendung
                                                </option>
                                                <option value="4" {{ $cuaca->siang == 4 ? 'selected' : '' }}>Gerimis
                                                </option>
                                                <option value="5" {{ $cuaca->siang == 5 ? 'selected' : '' }}>Berawan
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Sore</label>
                                            <select id="cuaca_sore" name="cuaca_sore" class="form-select select2-sore"
                                                required>
                                                <option value="">Pilih Cuaca</option>
                                                <option value="1" {{ $cuaca->sore == 1 ? 'selected' : '' }}>Cerah
                                                </option>
                                                <option value="2" {{ $cuaca->sore == 2 ? 'selected' : '' }}>Hujan
                                                </option>
                                                <option value="3" {{ $cuaca->sore == 3 ? 'selected' : '' }}>Mendung
                                                </option>
                                                <option value="4" {{ $cuaca->sore == 4 ? 'selected' : '' }}>Gerimis
                                                </option>
                                                <option value="5" {{ $cuaca->sore == 5 ? 'selected' : '' }}>Berawan
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                Uraian Pekerjaan / Rencana Kerja
                                            </label>
                                            <div id="ic-editor"></div>
                                            <textarea id="ic-value" hidden>{{ old('ic', $lap_harian->instruksi_catatan) }}</textarea>
                                            <input type="hidden" name="ic" id="ic">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                {{-- QUILL EDITOR --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Keterangan</label>

                                            <div id="keta-editor"></div>

                                            <textarea id="keta-value" hidden>{{ old('keta', $lap_harian->keterangan) }}</textarea>

                                            <input type="hidden" name="keta" id="keta">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Kendala</label>

                                            <div id="kendala-editor"></div>

                                            <textarea id="kendala-value" hidden>{{ old('kendala', $lap_harian->kendala) }}</textarea>

                                            <input type="hidden" name="kendala" id="kendala">
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-5 justify-content-end">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary w-100" id="btnSavelapharian">
                                            Update Laporan
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        // ==========================================
        // VARIABEL DATA
        // ==========================================
        let AlatWorkData = [];
        let MaterialWorkData = [];
        let Unit = [];
        let AlatInputData = [];
        let MaterialInputData = [];
        let uniqueId = 0;
        // ==========================================
        // HELPER: ESCAPE HTML
        // ==========================================
        function escapeHtml(value) {
            return String(value ?? '').replace(/[&<>"']/g, function(char) {
                return {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                } [char];
            });
        }
        // ==========================================
        // MEMBUAT OPTION SELECT
        // ==========================================
        function createOptions(data, selectedId = '', textField = 'nama') {

            let options = '<option value="">Pilih</option>';

            data.forEach(function(item) {

                let selected = String(item.id) === String(selectedId) ?
                    'selected' :
                    '';

                options += `
            <option value="${escapeHtml(item.id)}" ${selected}>
                ${escapeHtml(item[textField])}
            </option>
        `;
            });

            return options;
        }


        // ==========================================
        // INISIALISASI SELECT2
        // ==========================================

        function initSelect2(row) {

            row.find('.select2-alat, .select2-material, .select2-unit').select2({
                width: '100%',
                placeholder: 'Pilih atau cari data...',
                allowClear: true
            });
        }


        // ==========================================
        // RENDER ALAT
        // ==========================================

        function renderAlat(item = {}) {

            let id = ++uniqueId;

            let html = `
        <div class="row mb-3 align-items-end" id="alat-${id}">

            <input type="hidden"
                name="ak_id[]"
                value="${escapeHtml(item.id ?? '')}">

            <div class="col-md-5">
                <label class="form-label">Alat</label>

                <select name="alat_id[]"
                    class="form-select select2-alat"
                    required>

                    ${createOptions(AlatWorkData, item.alat_id, 'nama')}

                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Unit</label>

                <select name="unit_id_alat[]"
                    class="form-select select2-unit"
                    required>

                    ${createOptions(Unit, item.unit_id, 'kode')}

                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label">Jumlah</label>

                <input type="number"
                    name="jumlah_alat[]"
                    class="form-control"
                    value="${escapeHtml(item.jumlah ?? '')}"
                    min="1"
                    required>
            </div>

            <div class="col-md-2">
                <button type="button"
                    class="btn btn-danger w-100"
                    onclick="removeAK(${id})">
                    Hapus
                </button>
            </div>

        </div>
    `;

            let row = $(html);

            $('#akerja-container').append(row);

            initSelect2(row);
        }


        // ==========================================
        // TAMBAH ALAT BARU
        // ==========================================

        window.addak = function() {
            renderAlat();
        };


        // ==========================================
        // HAPUS ALAT
        // ==========================================

        window.removeAK = function(id) {

            let row = $('#alat-' + id);

            row.find('.select2-hidden-accessible').each(function() {
                $(this).select2('destroy');
            });

            row.remove();
        };


        // ==========================================
        // RENDER MATERIAL
        // ==========================================

        function renderMaterial(item = {}) {

            let id = ++uniqueId;

            let html = `
        <div class="row mb-3 align-items-end" id="material-${id}">

            <input type="hidden"
                name="mk_id[]"
                value="${escapeHtml(item.id ?? '')}">

            <div class="col-md-5">
                <label class="form-label">Material</label>

                <select name="material_id[]"
                    class="form-select select2-material"
                    required>

                    ${createOptions(MaterialWorkData, item.material_id, 'nama')}

                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Unit</label>

                <select name="unit_id_material[]"
                    class="form-select select2-unit"
                    required>

                    ${createOptions(Unit, item.unit_id, 'kode')}

                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label">Jumlah</label>

                <input type="number"
                    name="jumlah_material[]"
                    class="form-control"
                    value="${escapeHtml(item.jumlah ?? '')}"
                    min="1"
                    required>
            </div>

            <div class="col-md-2">
                <button type="button"
                    class="btn btn-danger w-100"
                    onclick="removeMK(${id})">
                    Hapus
                </button>
            </div>

        </div>
    `;

            let row = $(html);

            $('#mkerja-container').append(row);

            initSelect2(row);
        }


        // ==========================================
        // TAMBAH MATERIAL BARU
        // ==========================================

        window.addmk = function() {
            renderMaterial();
        };


        // ==========================================
        // HAPUS MATERIAL
        // ==========================================

        window.removeMK = function(id) {

            let row = $('#material-' + id);

            row.find('.select2-hidden-accessible').each(function() {
                $(this).select2('destroy');
            });

            row.remove();
        };
        // ==========================================
        // DOCUMENT READY
        // ==========================================

        $(document).ready(function() {

            // --------------------------------------
            // AJAX DATA ALAT, MATERIAL, DAN UNIT
            // --------------------------------------

            $.ajax({
                url: "{{ route('lapharian.data-edit', $lap_harian->id) }}",
                type: "GET",
                dataType: "json",

                success: function(response) {

                    console.log('Data Edit:', response);

                    AlatWorkData = response.alat || [];
                    MaterialWorkData = response.material || [];
                    Unit = response.unit || [];

                    AlatInputData = response.alat_input || [];
                    MaterialInputData = response.material_input || [];

                    // Render data Alat lama
                    AlatInputData.forEach(function(item) {
                        renderAlat(item);
                    });

                    // Render data Material lama
                    MaterialInputData.forEach(function(item) {
                        renderMaterial(item);
                    });

                },

                error: function(xhr) {
                    console.error('Gagal mengambil data:', xhr.responseText);
                }
            });
            // --------------------------------------
            // SELECT2 CUACA
            // --------------------------------------
            $('#formlapharian .select2-pagi, \
                                                                                                                               #formlapharian .select2-siang, \
                                                                                                                               #formlapharian .select2-sore, \
                                                                                                                               #formlapharian .select2-malam')
                .select2({
                    width: '100%',
                    placeholder: 'Pilih atau cari data...',
                    allowClear: true,
                    minimumResultsForSearch: 0
                });
            // --------------------------------------
            // QUILL EDITOR
            // --------------------------------------
            const quillKeterangan = new Quill('#keta-editor', {
                theme: 'snow',
                placeholder: 'Masukkan keterangan...'
            });

            const quillKendala = new Quill('#kendala-editor', {
                theme: 'snow',
                placeholder: 'Masukkan keterangan...'
            });

            const quillInstruksi = new Quill('#ic-editor', {
                theme: 'snow',
                placeholder: 'Masukkan instruksi atau catatan...'
            });

            // Isi data lama
            quillKeterangan.root.innerHTML = $('#keta-value').val() || '';
            quillKendala.root.innerHTML = $('#kendala-value').val() || '';
            quillInstruksi.root.innerHTML = $('#ic-value').val() || '';
            // --------------------------------------
            // AJAX UPDATE LAPORAN
            // --------------------------------------
            $('#formlapharian').on('submit', function(e) {

                e.preventDefault();

                let form = this;

                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                let formData = new FormData(form);

                // Ambil isi Quill
                formData.set('keta', quillKeterangan.root.innerHTML);
                formData.set('kendala', quillKendala.root.innerHTML);
                formData.set('ic', quillInstruksi.root.innerHTML);


                $.ajax({
                    url: "{{ route('Update_lapharian', $lap_harian->id) }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    beforeSend: function() {

                        $('#btnSavelapharian')
                            .prop('disabled', true)
                            .text('Memperbarui...');

                    },

                    success: function(res) {

                        if (res.status == 1) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: res.message,
                                timer: 2000,
                                showConfirmButton: false
                            }).then(function() {
                                window.location.href = res.redirect;
                            });

                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: res.message || 'Gagal memperbarui laporan'
                            });

                        }
                    },

                    error: function(xhr) {

                        let pesan = 'Terjadi kesalahan saat memperbarui data';

                        if (xhr.status === 422 && xhr.responseJSON?.errors) {

                            pesan = '';

                            $.each(xhr.responseJSON.errors, function(key, value) {
                                pesan += '• ' + value[0] + '<br>';
                            });

                        } else if (xhr.responseJSON?.message) {

                            pesan = xhr.responseJSON.message;

                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            html: pesan
                        });

                    },

                    complete: function() {

                        $('#btnSavelapharian')
                            .prop('disabled', false)
                            .text('Update Laporan');

                    }
                });

            });

        });
    </script>
@endsection
