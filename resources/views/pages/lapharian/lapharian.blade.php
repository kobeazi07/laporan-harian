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
                                             <a href="" type="button" class="btn btn-danger">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-file-earmark-pdf-fill"
                                                     viewBox="0 0 16 16">
                                                     <path
                                                         d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                                                     <path fill-rule="evenodd"
                                                         d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
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
