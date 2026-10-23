 <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
 <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />

 {{-- Bootstrap Icons --}}
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.12.0/css/lightbox.min.css">
 {{-- Sebelum </body>, setelah jQuery dimuat --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.12.0/js/lightbox.min.js"></script>

 <script>
     lightbox.option({
         resizeDuration: 200,
         fadeDuration: 200,
         imageFadeDuration: 200,
         wrapAround: true,
         albumLabel: "Foto %1 dari %2",
         alwaysShowNavOnTouchDevices: true,
         disableScrolling: true
     });
 </script>
