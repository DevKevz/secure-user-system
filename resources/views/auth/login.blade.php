<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign In | SecureSystem</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        :root {
            --primary: #635bff;
            --primary-dark: #5148e5;
            --dark: #111827;
            --muted: #6b7280;
            --border: #e5e7eb;
            --background: #f5f7fb;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--background);
            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }

        .auth-page {
            min-height: 100vh;
            display: flex;
        }

        /* Brand panel */

        .brand-panel {
            width: 48%;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(
                    circle at 20% 20%,
                    rgba(124, 58, 237, 0.45),
                    transparent 30%
                ),
                linear-gradient(
                    145deg,
                    #111827 0%,
                    #1e1b4b 55%,
                    #312e81 100%
                );
            color: white;
            display: flex;
            align-items: center;
            padding: 70px;
        }

        .brand-panel::before {
            content: "";
            position: absolute;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.08);
            right: -130px;
            top: -80px;
        }

        .brand-panel::after {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.05);
            left: -250px;
            bottom: -220px;
        }

        .brand-content {
            position: relative;
            z-index: 2;
            max-width: 500px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: linear-gradient(
                135deg,
                #7c3aed,
                #6366f1
            );
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 35px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.25);
        }

        .brand-title {
            font-size: 46px;
            font-weight: 800;
            letter-spacing: -2px;
            line-height: 1.05;
            margin-bottom: 20px;
        }

        .brand-description {
            color: #c7d2fe;
            font-size: 16px;
            line-height: 1.7;
            max-width: 440px;
        }

        .security-list {
            margin-top: 35px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .security-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #e5e7eb;
            font-size: 13px;
        }

        .security-item i {
            color: #a5b4fc;
            font-size: 17px;
        }

        /* Form */

        .form-panel {
            width: 52%;
            min-height: 100vh;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .form-container {
            width: 100%;
            max-width: 420px;
        }

        .mobile-logo {
            display: none;
        }

        .form-header {
            margin-bottom: 30px;
        }

        .form-header h1 {
            font-size: 29px;
            font-weight: 750;
            letter-spacing: -0.8px;
            margin-bottom: 8px;
        }

        .form-header p {
            color: var(--muted);
            font-size: 14px;
            margin: 0;
        }

        .alert {
            border: 0;
            border-radius: 10px;
            font-size: 13px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 650;
            margin-bottom: 8px;
        }

        .input-group-custom {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            z-index: 3;
        }

        .form-control {
            height: 48px;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding-left: 42px;
            padding-right: 42px;
            font-size: 13px;
            box-shadow: none;
            transition: 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 91, 255, 0.10);
        }

        .password-toggle {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: #9ca3af;
            z-index: 3;
            cursor: pointer;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .submit-btn {
            width: 100%;
            height: 48px;
            border: 0;
            border-radius: 9px;
            background: var(--primary);
            color: white;
            font-size: 14px;
            font-weight: 650;
            margin-top: 8px;
            transition: 0.2s ease;
            box-shadow: 0 8px 20px rgba(99, 91, 255, 0.18);
        }

        .submit-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .register-link {
            text-align: center;
            margin-top: 24px;
            font-size: 13px;
            color: var(--muted);
        }

        .register-link a {
            color: var(--primary);
            font-weight: 650;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .security-note {
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            color: #9ca3af;
            font-size: 11px;
        }

        @media (max-width: 850px) {

            .brand-panel {
                display: none;
            }

            .form-panel {
                width: 100%;
                min-height: 100vh;
                background: var(--background);
            }

            .form-container {
                background: white;
                padding: 35px;
                border-radius: 16px;
                box-shadow: 0 10px 35px rgba(17,24,39,0.08);
            }

            .mobile-logo {
                width: 44px;
                height: 44px;
                border-radius: 12px;
                background: linear-gradient(
                    135deg,
                    #7c3aed,
                    #6366f1
                );
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 25px;
                font-size: 19px;
            }
        }

        @media (max-width: 480px) {

            .form-panel {
                padding: 18px;
            }

            .form-container {
                padding: 25px 20px;
            }

            .form-header h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

<div class="auth-page">

    <!-- BRAND -->

    <section class="brand-panel">

        <div class="brand-content">

            <div class="brand-logo">
                <i class="bi bi-shield-lock-fill"></i>
            </div>

            <h2 class="brand-title">
                Secure access.<br>
                Simple management.
            </h2>

            <p class="brand-description">
                A secure user management workspace designed
                to keep authentication and profile management
                simple, reliable, and protected.
            </p>

            <div class="security-list">

                <div class="security-item">
                    <i class="bi bi-check-circle-fill"></i>
                    Secure password authentication
                </div>

                <div class="security-item">
                    <i class="bi bi-check-circle-fill"></i>
                    Protected user sessions
                </div>

                <div class="security-item">
                    <i class="bi bi-check-circle-fill"></i>
                    Secure profile management
                </div>

            </div>

        </div>

    </section>


    <!-- FORM -->

    <section class="form-panel">

        <div class="form-container">

            <div class="mobile-logo">
                <i class="bi bi-shield-lock-fill"></i>
            </div>

            <div class="form-header">

                <h1>
                    Welcome back
                </h1>

                <p>
                    Sign in to continue to your workspace.
                </p>

            </div>


            @if ($errors->any())

                <div class="alert alert-danger mb-4">

                    <i class="bi bi-exclamation-circle-fill me-2"></i>

                    {{ $errors->first() }}

                </div>

            @endif


            @if (session('success'))

                <div class="alert alert-success mb-4">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            <form method="POST" action="{{ url('/login') }}">

                @csrf

                <div class="mb-3">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Email address
                    </label>

                    <div class="input-group-custom">

                        <i class="bi bi-envelope input-icon"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control"
                            placeholder="you@example.com"
                            autocomplete="email"
                            required
                        >

                    </div>

                </div>


                <div class="mb-4">

                    <label
                        for="password"
                        class="form-label"
                    >
                        Password
                    </label>

                    <div class="input-group-custom">

                        <i class="bi bi-lock input-icon"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                            aria-label="Show password"
                        >
                            <i
                                class="bi bi-eye"
                                id="passwordIcon"
                            ></i>
                        </button>

                    </div>

                </div>


                <button
                    type="submit"
                    class="submit-btn"
                >
                    Sign in
                    <i class="bi bi-arrow-right ms-2"></i>
                </button>

            </form>


            <div class="register-link">

                Don't have an account?

                <a href="{{ url('/register') }}">
                    Create an account
                </a>

            </div>


            <div class="security-note">

                <i class="bi bi-shield-check"></i>

                Protected with secure authentication

            </div>

        </div>

    </section>

</div>


<script>

function togglePassword() {

    const password = document.getElementById('password');
    const icon = document.getElementById('passwordIcon');

    if (password.type === 'password') {

        password.type = 'text';

        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');

    } else {

        password.type = 'password';

        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');

    }

}

</script>

</body>
</html>