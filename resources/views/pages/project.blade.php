 @extends('layouts.index')

 @section('konten')
     <div class="row">

         <div class="card shadow mb-4">
             <div class="card-header py-3">
                 <div class="row">
                     <div class="col-lg-6 col-6">
                         <h6 class="m-0 font-weight-bold text-primary">Data project</h6>
                     </div>
                     <div class="col-lg-6 col-6">
                         <button class="btn btn-primary float-end" type="sumbit" data-bs-toggle="modal"
                             data-bs-target="#exampleModal">
                             Tambah +
                         </button>
                     </div>
                 </div>

                 {{-- modal tambah --}}
                 <!-- Large modal -->

                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Tambah Data Project</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                             </div>
                             <div class="modal-body">

                                 <form id="formproject" enctype="multipart/form-data">
                                     @csrf

                                     <!-- Kode Project -->
                                     <div class="form-group mb-3">
                                         <label for="kode">Kode Project</label>
                                         <input type="text" class="form-control" name="kode_project" id="kode_project"
                                             placeholder="Masukkan kode project" required>
                                     </div>

                                     <!-- Nama Project -->
                                     <div class="form-group mb-3">
                                         <label for="nama">Nama Project</label>
                                         <input type="text" class="form-control" name="nama_project" id="nama_project"
                                             placeholder="Masukkan nama project" required>
                                     </div>

                                     <!-- Konsultan Pengawas -->
                                     <div class="form-group mb-3">
                                         <label for="konsultan_pengawas_id">
                                             Konsultan Pengawas
                                         </label>
                                         <select class="form-control select2" name="konsultan_pengawas_id"
                                             id="konsultan_pengawas_id" style="width: 100%;">
                                             <option value="">Cari konsultan pengawas...</option>
                                             @foreach ($konsultan_pengawas as $item)
                                                 <option value="{{ $item->id }}">
                                                     {{ $item->nama }}
                                                 </option>
                                             @endforeach
                                         </select>
                                     </div>

                                     <!-- Owner -->
                                     <div class="form-group mb-3">
                                         <label for="owner_id">Owner</label>
                                         <select class="form-control select2" name="owner_id" id="owner_id"
                                             style="width: 100%;">
                                             <option value="">Cari owner...</option>
                                             @foreach ($owner as $item)
                                                 <option value="{{ $item->id }}">
                                                     {{ $item->nama }}
                                                 </option>
                                             @endforeach
                                         </select>
                                     </div>

                                     <!-- Kontraktor Pelaksana -->
                                     <div class="form-group mb-3">
                                         <label for="kontraktor_pelaksana_id">
                                             Kontraktor Pelaksana
                                         </label>
                                         <select class="form-control select2" name="kontraktor_pelaksana_id"
                                             id="kontraktor_pelaksana_id" style="width: 100%;">
                                             <option value="">Cari kontraktor pelaksana...</option>
                                             @foreach ($kontraktor as $item)
                                                 <option value="{{ $item->id }}">
                                                     {{ $item->nama }}
                                                 </option>
                                             @endforeach
                                         </select>
                                     </div>

                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                             Close
                                         </button>

                                         <button type="button" class="btn btn-primary" id="btnSaveproject">
                                             Save changes
                                         </button>
                                     </div>
                                 </form>

                             </div>
                         </div>
                     </div>
                 </div>
                 {{-- akhir modal tambah --}}
             </div>

             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Kode Project</th>
                                 <th>Judul Project</th>

                                 <th>Aksi</th>

                             </tr>
                         </thead>

                         <tbody>
                             @foreach ($project as $key => $project)
                                 <tr>
                                     <td>{{ $key + 1 }}</td>
                                     <td>{{ $project->kode_project }}</td>
                                     <td>{{ $project->nama_project }}</td>


                                     <td>
                                         <div class="d-flex align-items-center gap-2">
                                             <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                 data-bs-target="#Edit-{{ $project->id }}">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                     <path
                                                         d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                 </svg>
                                             </button>
                                             <a href="{{ route('HalamanAdminlapharian', $project->id) }}"
                                                 class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                                     width="16" height="16" fill="currentColor"
                                                     class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                                                     <path
                                                         d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0" />
                                                 </svg>
                                             </a>

                                             {{-- modal edit --}}
                                             <!-- Modal -->
                                             <div class="modal fade" id="Edit-{{ $project->id }}"
                                                 data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                 <div class="modal-dialog modal-lg">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <h5 class="modal-title" id="staticBackdropLabel">Modal title
                                                             </h5>
                                                             <button type="button" class="btn-close"
                                                                 data-bs-dismiss="modal" aria-label="Close"></button>
                                                             </button>
                                                         </div>
                                                         <form class="editformproject" data-id="{{ $project->id }}"
                                                             enctype="multipart/form-data">
                                                             @csrf
                                                             <div class="modal-body">
                                                                 <div class="form-group">
                                                                     <label for="exampleFormControlInput1">Kode
                                                                         Project</label>
                                                                     <input type="text" class="form-control"
                                                                         name="kode_project" id="exampleFormControlInput1"
                                                                         value="{{ $project->kode_project }}">
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="exampleFormControlInput1">Nama
                                                                         Project</label>
                                                                     <input type="text" class="form-control"
                                                                         name="nama_project" id="exampleFormControlInput1"
                                                                         value="{{ $project->nama_project }}">
                                                                 </div>

                                                                 <!-- Konsultan Pengawas -->
                                                                 <div class="form-group mb-3">
                                                                     <label for="konsultan_pengawas_id">
                                                                         Konsultan Pengawas
                                                                     </label>
                                                                     <select class="form-select select2"
                                                                         name="konsultan_pengawas_id"
                                                                         id="konsultan_pengawas_id" style="width: 100%;">

                                                                         <option value="">Cari konsultan pengawas...
                                                                         </option>

                                                                         @foreach ($konsultan_pengawas2 as $items)
                                                                             <option value="{{ $items->id }}"
                                                                                 {{ $project->konsultan_pengawas_id == $items->id ? 'selected' : '' }}>
                                                                                 {{ $items->nama }}
                                                                             </option>
                                                                         @endforeach
                                                                     </select>
                                                                 </div>

                                                                 <!-- Owner -->
                                                                 <div class="form-group mb-3">
                                                                     <label for="owner_id">Owner</label>
                                                                     <select class="form-select select2" name="owner_id"
                                                                         id="owner_id" style="width: 100%;">

                                                                         <option value="">Cari owner...</option>

                                                                         @foreach ($owner2 as $items)
                                                                             <option value="{{ $items->id }}"
                                                                                 {{ $project->owner_id == $items->id ? 'selected' : '' }}>
                                                                                 {{ $items->nama }}
                                                                             </option>
                                                                         @endforeach
                                                                     </select>
                                                                 </div>

                                                                 <!-- Kontraktor Pelaksana -->
                                                                 <div class="form-group mb-3">
                                                                     <label for="kontraktor_pelaksana_id">
                                                                         Kontraktor Pelaksana
                                                                     </label>
                                                                     <select class="form-select select2"
                                                                         name="kontraktor_pelaksana_id"
                                                                         id="kontraktor_pelaksana_id"
                                                                         style="width: 100%;">

                                                                         <option value="">Cari kontraktor
                                                                             pelaksana...
                                                                         </option>

                                                                         @foreach ($kontraktor2 as $items)
                                                                             <option value="{{ $items->id }}"
                                                                                 {{ $project->kontraktor_pelaksana_id == $items->id ? 'selected' : '' }}>
                                                                                 {{ $items->nama }}
                                                                             </option>
                                                                         @endforeach
                                                                     </select>
                                                                 </div>


                                                             </div>
                                                             <div class="modal-footer">
                                                                 <button type="button" class="btn btn-secondary"
                                                                     data-bs-dismiss="modal">Close</button>
                                                                 <button type="submit" class="btn btn-primary">Save
                                                                     changes</button>
                                                             </div>
                                                         </form>
                                                     </div>
                                                 </div>
                                             </div>
                                             {{-- akhir modal edit --}}

                                             <form action="{{ route('project.destroy', $project->id) }}" method="POST"
                                                 class="form-delete-project">
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="submit" class="btn btn-danger btn-submit-delete">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                         height="16" fill="currentColor" class="bi bi-trash-fill"
                                                         viewBox="0 0 16 16">
                                                         <path
                                                             d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                     </svg>
                                                 </button>
                                             </form>
                                         </div>
                                     </td>
                                 </tr>
                             @endforeach

                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
     <script>
         // Update label filename
         document.addEventListener('change', function(e) {
             if (e.target.classList.contains('custom-file-input')) {
                 e.target.nextElementSibling.innerText = e.target.files[0].name;
             }
         });
         $('#btnSaveproject').on('click', function() {
             let form = document.getElementById('formproject');
             let formData = new FormData(form);


             $.ajax({
                 url: "{{ route('Tambah_project') }}",
                 type: "POST",
                 data: formData,
                 processData: false,
                 contentType: false,

                 beforeSend: function() {
                     $('#btnSaveproject')
                         .prop('disabled', true)
                         .text('Menyimpan...');
                 },

                 success: function(res) {
                     Swal.fire({
                         icon: 'success',
                         title: 'Berhasil',
                         text: 'project berhasil ditambahkan',
                         timer: 2000,
                         showConfirmButton: false
                     }).then(() => {
                         location.reload();
                     });
                 },

                 error: function(xhr) {
                     let pesan = 'Terjadi kesalahan';

                     if (xhr.status === 422) {
                         let errors = xhr.responseJSON.errors;
                         pesan = '';
                         for (let key in errors) {
                             pesan += `• ${errors[key][0]}<br>`;
                         }
                     }

                     Swal.fire({
                         icon: 'error',
                         title: 'Gagal',
                         html: pesan
                     });
                 },

                 complete: function() {
                     $('#btnSaveproject')
                         .prop('disabled', false)
                         .text('Simpanproject');
                 }
             });
         });

         $(document).on('submit', '.editformproject', function(e) {
             e.preventDefault();

             let form = $(this);
             let id = form.data('id');
             let formData = new FormData(this);
             $.ajax({
                 url: "{{ url('/edit_project') }}/" + id,
                 type: "POST",
                 data: formData,
                 processData: false,
                 contentType: false,
                 success: function(response) {
                     Swal.fire('Sukses', response.message, 'success');
                     $('#Edit-' + id).modal('hide');
                     location.reload();
                 },
                 error: function(xhr) {
                     Swal.fire('Error', 'Terjadi kesalahan', 'error');
                 }
             });
         });

         $(document).on('submit', '.form-delete-project', function(e) {
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

     <script>
         // FORM TAMBAH — PERTAHANKAN KODE ASLI ANDA



         $(document).ready(function() {

             // ======================================
             // MODAL TAMBAH PROJECT
             // ======================================
             $('#exampleModal').on('shown.bs.modal', function() {
                 const $modal = $(this);

                 $modal.find('#formproject .select2').each(function() {
                     const $select = $(this);

                     if ($select.hasClass('select2-hidden-accessible')) {
                         // Pastikan dropdown terhubung ke modal tambah
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


             // ======================================
             // MODAL EDIT PROJECT
             // ======================================
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



         //  $('#formproject .select2').select2({
         //      width: '100%',
         //      placeholder: 'Pilih atau cari data...',
         //      allowClear: true,
         //      dropdownParent: $('#exampleModal')
         //  });

         //  $(document).ready(function() {

         //      $(document).on('shown.bs.modal', '[id^="Edit-"]', function() {
         //          let modal = $(this);

         //          modal.find('select.select2').each(function() {
         //              if ($(this).hasClass('select2-hidden-accessible')) {
         //                  return;
         //              }

         //              $(this).select2({
         //                  width: '100%',
         //                  placeholder: 'Pilih atau cari data...',
         //                  allowClear: true,
         //                  dropdownParent: modal
         //              });
         //          });
         //      });

         //  });
         //  $(document).ready(function() {
         //      $('.select2').select2({
         //          width: '100%',
         //          placeholder: 'Pilih atau cari data...',
         //          allowClear: true
         //      });
         //  });
     </script>
 @endsection
