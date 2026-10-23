 @extends('layouts.index')

 @section('konten')
     <div class="row">
         <h2>{{ $project->nama_project }}</h2>
     </div>
     <div class="row">

         <div class="card shadow mb-4">
             <div class="card-header py-3">
                 <div class="row">
                     <div class="col-lg-6 col-6">
                         <h6 class="m-0 font-weight-bold text-primary">Data lapharian</h6>
                     </div>
                     <div class="col-lg-6 col-6">
                         <a href="{{ route('HalamanTambahlapharian', $project->id) }}" class="btn btn-primary float-end">
                             Tambah +
                         </a>
                     </div>
                 </div>

                 {{-- modal tambah --}}
                 <!-- Large modal -->

                 {{-- akhir modal tambah --}}
             </div>

             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Nomor</th>
                                 <th>Judul laporan</th>
                                 <th>Petugas Laporan</th>
                                 <th>Tanggal</th>
                                 <th>Aksi</th>

                             </tr>
                         </thead>

                         <tbody>
                             @foreach ($lapharian as $key => $lapharian)
                                 <tr>
                                     <td>{{ $key + 1 }}</td>
                                     <td>{{ $lapharian->nomor }}</td>
                                     <td>{{ $lapharian->judul }}</td>
                                     <td>{{ $lapharian->created_by }}</td>
                                     <td>{{ $lapharian->tanggal }}</td>
                                     <td>
                                         <div class="d-flex align-items-center gap-2">
                                             <a href="" type="button" class="btn btn-warning">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                     <path
                                                         d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                 </svg>
                                             </a>
                                             <a href="{{ Route('HalamanFotolapharian', $lapharian->id) }}" type="button"
                                                 class="btn btn-success">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                                     <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                                     <path
                                                         d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" />
                                                 </svg>
                                             </a>


                                             {{-- modal edit --}}
                                             <!-- Modal -->

                                             {{-- akhir modal edit --}}

                                             <form action="{{ route('lapharian.destroy', $lapharian->id) }}" method="POST"
                                                 class="form-delete-lapharian">
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="submit" class="btn btn-danger btn-submit-delete">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
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

         $(document).on('submit', '.form-delete-lapharian', function(e) {
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
                             if (response.status == 1) {
                                 Swal.fire(
                                     'Terhapus!',
                                     response.message,
                                     'success'
                                 ).then(() => {
                                     location.reload();
                                 });
                             } else {
                                 Swal.fire(
                                     'Gagal!',
                                     response.message || 'Data gagal dihapus.',
                                     'error'
                                 );
                             }
                         },
                         error: function(xhr) {
                             console.error('Status:', xhr.status);
                             console.error('Response:', xhr.responseText);

                             let message = xhr.responseJSON?.message ||
                                 'Gagal menghapus data.';

                             Swal.fire('Error', message, 'error');
                         }

                     });

                 }
             });
         });
     </script>
 @endsection
