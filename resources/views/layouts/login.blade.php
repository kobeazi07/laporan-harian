<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - Monitoring Proyek</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <style>
        /* =========================================
   LOGIN PAGE - MODERN DASHBOARD
========================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            min-height: 100%;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
        }

        /* Main Wrapper */

        .login-wrapper {
            min-height: 100vh;
            min-height: 100svh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg,
                    #eef4ff 0%,
                    #f8fafc 50%,
                    #e8efff 100%);
        }

        /* Background Shapes */

        .login-bg-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(2px);
            pointer-events: none;
        }

        .shape-one {
            width: 420px;
            height: 420px;
            background: rgba(37, 99, 235, 0.09);
            top: -160px;
            right: -100px;
        }

        .shape-two {
            width: 350px;
            height: 350px;
            background: rgba(59, 130, 246, 0.08);
            bottom: -140px;
            left: -100px;
        }

        .shape-three {
            width: 180px;
            height: 180px;
            background: rgba(14, 165, 233, 0.08);
            top: 55%;
            right: 12%;
        }

        /* Login Card */

        .login-card {
            width: 100%;
            max-width: 440px;
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 20px;
            padding: 42px 38px 28px;
            position: relative;
            z-index: 2;

            box-shadow:
                0 20px 50px rgba(15, 23, 42, 0.08),
                0 4px 12px rgba(15, 23, 42, 0.03);

            animation: loginFade 0.6s ease;
        }

        @keyframes loginFade {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Brand */

        .login-brand {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 24px;
            margin-bottom: 32px;
        }

        .login-logo {
            width: 115px;
            height: 75px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Header */

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-header h1 {
            font-size: 25px;
            font-weight: 750;
            color: #172554;
            margin-bottom: 9px;
            letter-spacing: -0.5px;
        }

        .login-header p {
            font-size: 13px;
            color: #64748b;
            margin: 0;
            line-height: 1.6;
        }

        /* Form */

        .login-form {
            width: 100%;
        }

        .login-form-group {
            margin-bottom: 22px;
        }

        .login-form-label {
            display: block;
            font-size: 13px;
            font-weight: 650;
            color: #334155;
            margin-bottom: 9px;
        }

        /* Input */

        .login-input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .login-input {
            width: 100%;
            height: 52px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #f8fafc;
            padding: 0 46px;
            font-size: 14px;
            color: #1e293b;
            outline: none;
            transition: all 0.25s ease;
        }

        .login-input::placeholder {
            color: #94a3b8;
            font-size: 13px;
        }

        .login-input:focus {
            background: #ffffff;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.10);
        }

        .input-icon {
            position: absolute;
            left: 16px;
            font-size: 17px;
            color: #94a3b8;
            z-index: 1;
            pointer-events: none;
        }

        .login-input:focus~.input-icon {
            color: #2563eb;
        }

        /* Password Toggle */

        .password-toggle-btn {
            position: absolute;
            right: 14px;
            border: none;
            background: transparent;
            color: #94a3b8;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px;
            transition: color 0.2s ease;
        }

        .password-toggle-btn:hover {
            color: #2563eb;
        }

        /* Login Button */

        .btn-login {
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 10px;
            margin-top: 8px;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;

            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #ffffff;

            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;

            cursor: pointer;
            transition: all 0.25s ease;
        }

        .btn-login i {
            font-size: 18px;
            transition: transform 0.25s ease;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #1d4ed8, #1e40af);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
            transform: translateY(-2px);
        }

        .btn-login:hover i {
            transform: translateX(4px);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* Footer */

        .login-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 18px;
            border-top: 1px solid #f1f5f9;
        }

        .login-footer p {
            font-size: 11px;
            color: #94a3b8;
            margin: 0;
        }

        /* =========================================
   TABLET RESPONSIVE
========================================= */

        @media (max-width: 768px) {

            .login-wrapper {
                padding: 30px 20px;
            }

            .login-card {
                max-width: 420px;
                padding: 38px 32px 25px;
            }

            .shape-three {
                display: none;
            }

        }

        /* =========================================
   MOBILE RESPONSIVE
========================================= */

        @media (max-width: 576px) {

            .login-wrapper {
                padding: 24px 16px;
                align-items: center;
            }

            .login-card {
                width: 100%;
                max-width: 400px;
                padding: 32px 24px 22px;
                border-radius: 16px;
            }

            .login-brand {
                gap: 18px;
                margin-bottom: 28px;
            }

            .login-logo {
                width: 100px;
                height: 65px;
            }

            .login-header {
                margin-bottom: 27px;
            }

            .login-header h1 {
                font-size: 23px;
            }

            .login-header p {
                font-size: 12px;
            }

            .login-form-group {
                margin-bottom: 19px;
            }

            .login-input {
                height: 50px;
                font-size: 14px;
            }

            .btn-login {
                height: 50px;
            }

            .login-footer {
                margin-top: 25px;
            }

        }

        /* =========================================
   SMALL MOBILE
========================================= */

        @media (max-width: 360px) {

            .login-wrapper {
                padding: 18px 12px;
            }

            .login-card {
                padding: 28px 18px 20px;
            }

            .login-logo {
                width: 85px;
                height: 58px;
            }

            .login-brand {
                gap: 12px;
            }

            .login-header h1 {
                font-size: 21px;
            }

        }

        /* Reduce animation for accessibility */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>

    <main class="login-wrapper">

        <!-- Background Decoration -->
        <div class="login-bg-shape shape-one"></div>
        <div class="login-bg-shape shape-two"></div>
        <div class="login-bg-shape shape-three"></div>

        <!-- Login Card -->
        <div class="login-card">

            <!-- Logo -->


            <!-- Heading -->
            <div class="login-header">
                <h1>Welcome Back!</h1>
                <p>Please sign in to access your dashboard</p>
            </div>

            <!-- Login Form -->
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="login-form-group">
                    <label for="email" class="login-form-label">
                        Email Address
                    </label>

                    <div class="login-input-group">
                        <i class="bi bi-envelope input-icon"></i>

                        <input type="email" id="email" name="email" class="login-input"
                            placeholder="name@company.com" required>
                    </div>
                </div>

                <div class="login-form-group">
                    <label for="password" class="login-form-label">
                        Password
                    </label>

                    <div class="login-input-group">
                        <i class="bi bi-shield-lock input-icon"></i>

                        <input type="password" id="password" name="password" class="login-input"
                            placeholder="Enter your password" required>

                        <button type="button" class="password-toggle-btn" id="toggle-password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-login" id="btn-submit">
                    <span>LOGIN</span>
                    <i class="bi bi-arrow-right"></i>
                </button>
            </form>

            <!-- Footer -->
            <div class="login-footer">
                <p>© {{ date('Y') }} Laporan Progress. All rights reserved.</p>
            </div>

        </div>

    </main>

    <!-- jQuery -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- Authentication Script -->
    <script src="{{ asset('assets/js/auth.js') }}"></script>

    <script>
        // $(document).ready(function() {

        //     console.log('jQuery berhasil dimuat');

        //     $('#loginForm').on('submit', function(e) {

        //         e.preventDefault();

        //         console.log('Form login menggunakan AJAX');

        //         const form = $(this);
        //         const button = $('#btn-submit');

        //         button.prop('disabled', true);
        //         button.html('PLEASE WAIT...');

        //         $.ajax({
        //             url: form.attr('action'),
        //             type: 'POST',
        //             data: form.serialize(),
        //             dataType: 'json',

        //             success: function(response) {

        //                 console.log(response);

        //                 if (response.success) {

        //                     Swal.fire({
        //                         icon: 'success',
        //                         title: 'Berhasil!',
        //                         text: response.message,
        //                         timer: 1500,
        //                         showConfirmButton: false
        //                     }).then(function() {

        //                         window.location.replace(response.redirect);

        //                     });

        //                 }

        //             },

        //             error: function(xhr) {

        //                 let message = 'Terjadi kesalahan';

        //                 if (xhr.responseJSON) {
        //                     message = xhr.responseJSON.message || message;

        //                     if (xhr.responseJSON.errors) {
        //                         message = Object.values(
        //                             xhr.responseJSON.errors
        //                         ).flat().join('<br>');
        //                     }
        //                 }

        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Login Gagal!',
        //                     html: message
        //                 });

        //                 button.prop('disabled', false);
        //                 button.html(`
    //             <span class="btn-login-text">LOGIN</span>
    //             <i class="bi bi-arrow-right"></i>
    //         `);

        //             }

        //         });

        //     });

        // });

        const loginForm = document.getElementById('loginForm');

        // Toggle Password
        document.getElementById('toggle-password').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');

            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        });

        // Login AJAX
        loginForm.addEventListener('submit', async function(e) {

            e.preventDefault();

            console.log('LOGIN AJAX BERJALAN');

            const button = document.getElementById('btn-submit');

            button.disabled = true;
            button.innerHTML = `
        <span>PLEASE WAIT...</span>
        <span class="spinner-border spinner-border-sm"></span>
    `;

            try {

                const response = await fetch(loginForm.action, {
                    method: 'POST',
                    body: new FormData(loginForm),
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin'
                });

                const result = await response.json();

                if (response.ok && result.success) {

                    await Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: result.message,
                        timer: 1500,
                        showConfirmButton: false
                    });

                    window.location.replace(result.redirect);

                    return;
                }

                let message = result.message || 'Login gagal';

                if (result.errors) {
                    message = Object.values(result.errors).flat().join('<br>');
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal!',
                    html: message
                });

            } catch (error) {

                console.error('Login Error:', error);

                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: 'Tidak dapat menghubungi server.'
                });

            } finally {

                button.disabled = false;

                button.innerHTML = `
            <span class="btn-login-text">LOGIN</span>
            <i class="bi bi-arrow-right"></i>
        `;

            }

        });


        // $(document).ready(function() {

        //     console.log('jQuery aktif');

        //     $('#loginForm').on('submit', function(e) {

        //         e.preventDefault();

        //         console.log('AJAX SUBMIT BERJALAN');

        //         alert('Form berhasil dicegat oleh AJAX');

        //     });

        // });
    </script>

</body>

</html>
