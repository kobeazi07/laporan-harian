@extends('layouts.index')

@section('konten')
    <div class="row" style="margin-top: -100px;">
        <div class="body-wrapper-inner">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Tambah Laporan Harian</h5>
                        <div class="card">
                            <div class="card-body">
                                <form class="formlapharian" id="formlapharian">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nomor</label>
                                                <input type="text" class="form-control">
                                            </div>


                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" id="date" name="date">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Sisa Waktu</label>
                                                <input type="number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <h5 class="fw-bold">Kode Pekerjaan</h5>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <button type="button" class="btn btn-primary float-end"
                                                        onclick="addkp()">Tambah
                                                        +</button>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div id = "kpekerjaan-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-7 col-12">
                                                    <h5 class="fw-bold">Tipe Pekerjaan</h5>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <button type="button" class="btn btn-primary float-end"
                                                        onclick="addtp()">Tambah+</button>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div id ="tpekerjaan-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <h5 class="fw-bold">Tenaga Kerja</h5>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <button type="button" class="btn btn-primary float-end"
                                                        onclick="addtk()">Tambah
                                                        +</button>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div id ="tkerja-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-md-7 col-12">
                                                    <h5 class="fw-bold">Alat yang digunakan</h5>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <button type="button" class="btn btn-primary float-end"
                                                        onclick="addak()">Tambah +</button>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div id ="akerja-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-md-7 col-12">
                                                    <h5 class="fw-bold">Material yang digunakan</h5>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <button type="button" class="btn btn-primary float-end"
                                                        onclick="addmk()">Tambah +</button>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div id ="mkerja-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-7 col-12">
                                                    <h5 class="fw-bold">Keterangan Tambahan</h5>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <button type="button" class="btn btn-primary float-end"
                                                        onclick="addkt()">Tambah +</button>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div id ="ktambahan-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <h5 class="fw-bold">Keadaan Cuaca</h5>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Pagi</label>
                                                <select id="cuaca_pagi" name="cuaca_pagi"
                                                    class="form-select select2-pagi" required>
                                                    <option value=""></option>
                                                    <option value="1">Cerah</option>
                                                    <option value="2">Hujan</option>
                                                    <option value="3">Gerimis</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Siang</label>
                                                <select id="cuaca_siang" name="cuaca_siang"
                                                    class="form-select select2-siang" required>
                                                    <option value=""></option>
                                                    <option value="1">Cerah</option>
                                                    <option value="2">Hujan</option>
                                                    <option value="3">Gerimis</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Sore</label>
                                                <select id="cuaca_sore" name="cuaca_sore"
                                                    class="form-select select2-sore" required>
                                                    <option value=""></option>
                                                    <option value="1">Cerah</option>
                                                    <option value="2">Hujan</option>
                                                    <option value="3">Gerimis</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Malam</label>
                                                <select id="cuaca_malam" name="cuaca_malam"
                                                    class="form-select select2-malam" required>
                                                    <option value=""></option>
                                                    <option value="1">Cerah</option>
                                                    <option value="2">Hujan</option>
                                                    <option value="3">Gerimis</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5 justify-content-end">
                                        <button type="submit" class="btn btn-primary w-50">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ddate
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('date');

            if (!dateInput.value) {
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                const day = String(today.getDate()).padStart(2, '0');

                dateInput.value = `${year}-${month}-${day}`;
            }
        });
        //akhir date 
        $(document).ready(function() {

            $('#exampleModal').on('shown.bs.modal', function() {
                const $modal = $(this);

                $modal.find('#formproject .select2').each(function() {
                    const $select = $(this);

                    if ($select.hasClass('select2-hidden-accessible')) {
                        $select.select2('destroy');
                    }

                    $select.select2({
                        width: '100%',
                        placeholder: 'Pilih atau cari data...',
                        allowClear: true,
                        dropdownParent: $modal,
                        minimumResultsForSearch: 0
                    });
                });

                console.log('Select2 modal tambah siap');
            });

            document.addEventListener('shown.bs.modal', function(event) {
                const modalElement = event.target;

                if (!modalElement.id.startsWith('Edit-')) {
                    return;
                }

                const $modal = $(modalElement);

                $modal.find('.editformproject select.select2').each(function() {
                    const $select = $(this);

                    if ($select.hasClass('select2-hidden-accessible')) {
                        return;
                    }

                    $select.select2({
                        width: '100%',
                        placeholder: 'Pilih atau cari data...',
                        allowClear: true,
                        dropdownParent: $modal,
                        minimumResultsForSearch: 0
                    });
                });

                console.log('Select2 modal edit siap:', modalElement.id);
            });

        });

        // Data Scope Work Controller
        const scopeWorkData = @json($scope_work);

        function addkp() {
            const uniqueId = Date.now();

            let options = '<option value=""></option>';

            scopeWorkData.forEach(function(item) {
                options += `
                <option value="${item.id}">
                    ${item.nama} (${item.kode})
                </option>
            `;
            });

            const html = `
            <div class="d-flex align-items-start gap-2 mb-3 input-group" id="kp-${uniqueId}">
                <div class="flex-grow-1">
                    <select name="scope_work_id[]"
                            class="form-select select2-scope"
                            required>
                        ${options}
                    </select>
                </div>
                <button type="button"
                        class="btn btn-danger flex-shrink-0"
                        onclick="removeInput('${uniqueId}')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                    </svg>
                </button>
            </div>
        `;

            const container = document.getElementById('kpekerjaan-container');
            container.insertAdjacentHTML('beforeend', html);

            // Inisialisasi Select2 pada dropdown yang baru ditambahkan
            $(`#kp-${uniqueId} .select2-scope`).select2({
                width: '100%',
                placeholder: 'Cari Scope Work...',
                allowClear: true,
                minimumResultsForSearch: 0
            });
        }

        function removeInput(id) {
            document.getElementById(`kp-${id}`).remove();
        }

        // Tipe Pekerjaan
        const TypeWorkData = @json($type_work);

        function addtp() {
            const uniqueId = Date.now();

            let options = '<option value=""></option>';

            TypeWorkData.forEach(function(item) {
                options += `
                <option value="${item.id}">
                    ${item.nama} (${item.kode})
                </option>
            `;
            });

            const html = `
            <div class="d-flex align-items-start gap-2 mb-3 input-group" id="tp-${uniqueId}">
                <div class="flex-grow-1">
                    <select name="type_work_id[]"
                            class="form-select select2-type"
                            required>
                        ${options}
                    </select>
                </div>
                <button type="button"
                        class="btn btn-danger flex-shrink-0"
                       onclick="removeTP('${uniqueId}')"  title="Hapus Type Work">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                    </svg>
                </button>
            </div>
        `;

            const container = document.getElementById('tpekerjaan-container');
            container.insertAdjacentHTML('beforeend', html);

            // Inisialisasi Select2 pada dropdown yang baru ditambahkan
            $(`#tp-${uniqueId} .select2-type`).select2({
                width: '100%',
                placeholder: 'Cari Type Work...',
                allowClear: true,
                minimumResultsForSearch: 0
            });

        }

        function removeTP(id) {
            const element = document.getElementById(`tp-${id}`);

            if (element) {
                $(element).find('.select2-type').select2('destroy');
                element.remove();
            }
        }

        // tenaga kerja
        const TenagaKerjaData = @json($tenaga_kerja);

        function addtk() {
            const uniqueId = Date.now();

            let options = '<option value=""></option>';

            TenagaKerjaData.forEach(function(item) {
                options += `
                <option value="${item.id}">
                    ${item.jabatan}
                </option>
            `;
            });

            const html = `
           <div class="d-flex align-items-end gap-2 mb-3" id="tk-${uniqueId}">

                <!-- Kolom 1: Tenaga Kerja -->
                <div style="flex: 2;">
                    <label class="form-label">Tenaga Kerja</label>
                    <select name="tenaga_kerja_id[]"
                            class="form-select select2-type"
                            required>
                        ${options}
                    </select>
                </div>

                <!-- Kolom 2: Jumlah -->
                <div style="flex: 1;">
                    <label class="form-label">Jumlah</label>
                    <input type="number"
                        name="jumlah_tenaga_kerja[]"
                        class="form-control"
                        placeholder="Jumlah"
                        min="1"
                        required>
                </div>

                <!-- Kolom 3: Hapus -->
                <div class="flex-shrink-0">
                    <button type="button"
                            class="btn btn-danger"
                            onclick="removeTK('${uniqueId}')"
                            title="Hapus Tenaga Kerja">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                            </svg>
                    </button>
                </div>

            </div>
        `;

            const container = document.getElementById('tkerja-container');
            container.insertAdjacentHTML('beforeend', html);

            // Inisialisasi Select2 pada dropdown yang baru ditambahkan
            $(`#tk-${uniqueId} .select2-type`).select2({
                width: '100%',
                placeholder: 'Cari Tenaga Kerja...',
                allowClear: true,
                minimumResultsForSearch: 0
            });

        }

        function removeTK(id) {
            const element = document.getElementById(`tk-${id}`);

            if (element) {
                $(element).find('.select2-type').select2('destroy');
                element.remove();
            }
        }

        // alat
        const AlatWorkData = @json($alat);
        const Unit = @json($unit);

        function addak() {
            const uniqueId = Date.now();

            let options = '<option value=""></option>';

            AlatWorkData.forEach(function(item) {
                options += `
                <option value="${item.id}">
                    ${item.nama}
                </option>
            `;
            });
            let optionsu = '<option value=""></option>';
            Unit.forEach(function(itemu) {
                optionsu += `
                <option value="${itemu.id}">
                    ${itemu.kode}
                </option>
            `;
            });

            const html = `
            <div class="d-flex align-items-end gap-2 mb-3 w-100" id="ak-${uniqueId}">

                <!-- Kolom Alat -->
                <div style="flex: 2; min-width: 0;">
                    <label class="form-label">Alat</label>
                    <select name="alat_id[]"
                            class="form-select select2-type"
                            required>
                        ${options}
                    </select>
                </div>

                <!-- Kolom Unit -->
                <div style="flex: 1; min-width: 0;">
                    <label class="form-label">Unit</label>
                    <select name="unit_id[]"
                            class="form-select select2-type"
                            required>
                        ${optionsu}
                    </select>
                </div>

                <!-- Kolom Jumlah -->
                <div style="flex: 1; min-width: 0;">
                    <label class="form-label">Jumlah</label>
                    <input type="number"
                        name="jumlah_alat[]"
                        class="form-control"
                        placeholder="Jumlah"
                        min="1"
                        required>
                </div>

                <!-- Tombol Hapus -->
                <div class="flex-shrink-0">
                    <button type="button"
                            class="btn btn-danger"
                            onclick="removeAK('${uniqueId}')"
                            title="Hapus Alat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </button>
                </div>

            </div>
        `;

            const container = document.getElementById('akerja-container');
            container.insertAdjacentHTML('beforeend', html);

            // Inisialisasi Select2 pada dropdown yang baru ditambahkan
            $(`#ak-${uniqueId} .select2-type`).select2({
                width: '100%',
                placeholder: 'Cari Type Work...',
                allowClear: true,
                minimumResultsForSearch: 0
            });

        }

        function removeAK(id) {
            const element = document.getElementById(`ak-${id}`);

            if (element) {
                $(element).find('.select2-type').select2('destroy');
                element.remove();
            }
        }

        // material
        const MaterialWorkData = @json($material);
        // const Unit = @json($unit);

        function addmk() {
            const uniqueId = Date.now();

            let options = '<option value=""></option>';

            MaterialWorkData.forEach(function(item) {
                options += `
                <option value="${item.id}">
                    ${item.nama}
                </option>
            `;
            });
            let optionsu = '<option value=""></option>';
            Unit.forEach(function(itemu) {
                optionsu += `
                <option value="${itemu.id}">
                    ${itemu.kode}
                </option>
            `;
            });

            const html = `
            <div class="d-flex align-items-end gap-2 mb-3 w-100" id="mk-${uniqueId}">

                <!-- Kolom Alat -->
                <div style="flex: 2; min-width: 0;">
                    <label class="form-label">Material</label>
                    <select name="material_id[]"
                            class="form-select select2-type"
                            required>
                        ${options}
                    </select>
                </div>

                <!-- Kolom Unit -->
                <div style="flex: 1; min-width: 0;">
                    <label class="form-label">Unit</label>
                    <select name="unit_id[]"
                            class="form-select select2-type"
                            required>
                        ${optionsu}
                    </select>
                </div>

                <!-- Kolom Jumlah -->
                <div style="flex: 1; min-width: 0;">
                    <label class="form-label">Jumlah</label>
                    <input type="number"
                        name="jumlah_alat[]"
                        class="form-control"
                        placeholder="Jumlah"
                        min="1"
                        required>
                </div>

                <!-- Tombol Hapus -->
                <div class="flex-shrink-0">
                    <button type="button"
                            class="btn btn-danger"
                            onclick="removeMK('${uniqueId}')"
                            title="Hapus Alat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </button>
                </div>

            </div>
        `;

            const container = document.getElementById('mkerja-container');
            container.insertAdjacentHTML('beforeend', html);

            // Inisialisasi Select2 pada dropdown yang baru ditambahkan
            $(`#mk-${uniqueId} .select2-type`).select2({
                width: '100%',
                placeholder: 'Cari Type Work...',
                allowClear: true,
                minimumResultsForSearch: 0
            });

        }

        function removeMK(id) {
            const element = document.getElementById(`mk-${id}`);

            if (element) {
                $(element).find('.select2-type').select2('destroy');
                element.remove();
            }
        }

        // keterangan_tambahan
        // const Unit = @json($unit);

        function addkt() {
            const uniqueId = Date.now();

            const html = `
            <div class="d-flex align-items-end gap-2 mb-3 w-100" id="kt-${uniqueId}">

                <!-- Kolom Alat -->
                <div style="flex: 2; min-width: 0;">
                    
                        <textarea name="material[]"
                        class="form-control"
                        rows="3"
                        placeholder="Masukkan keterangan material..."
                        required></textarea>
                </div>


                <!-- Tombol Hapus -->
                <div class="flex-shrink-0">
                    <button type="button"
                            class="btn btn-danger"
                            onclick="removeKT('${uniqueId}')"
                            title="Hapus Alat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </button>
                </div>

            </div>
        `;

            const container = document.getElementById('ktambahan-container');
            container.insertAdjacentHTML('beforeend', html);

            // Inisialisasi Select2 pada dropdown yang baru ditambahkan
            $(`#kt-${uniqueId} .select2-type`).select2({
                width: '100%',
                placeholder: 'Cari Type Work...',
                allowClear: true,
                minimumResultsForSearch: 0
            });

        }

        function removeKT(id) {
            const element = document.getElementById(`kt-${id}`);

            if (element) {
                $(element).find('.select2-type').select2('destroy');
                element.remove();
            }
        }
        // secet cuaca
        $(document).ready(function() {
            $('#formlapharian .select2-pagi').select2({
                width: '100%',
                placeholder: 'Pilih atau cari data...',
                allowClear: true,
                minimumResultsForSearch: 0
            });
        });
        $(document).ready(function() {
            $('#formlapharian .select2-siang').select2({
                width: '100%',
                placeholder: 'Pilih atau cari data...',
                allowClear: true,
                minimumResultsForSearch: 0
            });
        });
        $(document).ready(function() {
            $('#formlapharian .select2-sore').select2({
                width: '100%',
                placeholder: 'Pilih atau cari data...',
                allowClear: true,
                minimumResultsForSearch: 0
            });
        });
        $(document).ready(function() {
            $('#formlapharian .select2-malam').select2({
                width: '100%',
                placeholder: 'Pilih atau cari data...',
                allowClear: true,
                minimumResultsForSearch: 0
            });
        });
    </script>
@endsection
