<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account | SecureSystem</title>

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

        /* Brand */

        .brand-panel {
            width: 48%;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(
                    circle at 80% 15%,
                    rgba(124, 58, 237, 0.4),
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
            width: 420px;
            height: 420px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.07);
            right: -150px;
            top: -100px;
        }

        .brand-panel::after {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.05);
            left: -250px;
            bottom: -250px;
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
            font-size: 44px;
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

        .feature-list {
            margin-top: 35px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 13px;
        }

        .feature {
            padding: 14px;
            border-radius: 10px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.06);
            font-size: 12px;
            color: #e5e7eb;
        }

        .feature i {
            color: #a5b4fc;
            margin-right: 7px;
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
            max-width: 430px;
        }

        .mobile-logo {
            display: none;
        }

        .form-header {
            margin-bottom: 25px;
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
            height: 46px;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding-left: 42px;
            padding-right: 42px;
            font-size: 13px;
            box-shadow: none;
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

        .password-help {
            margin-top: 6px;
            font-size: 11px;
            color: #9ca3af;
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
            margin-top: 5px;
            transition: 0.2s ease;
            box-shadow: 0 8px 20px rgba(99, 91, 255, 0.18);
        }

        .submit-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .login-link {
            text-align: center;
            margin-top: 22px;
            font-size: 13px;
            color: var(--muted);
        }

        .login-link a {
            color: var(--primary);
            font-weight: 650;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .security-note {
            margin-top: 24px;
            padding-top: 18px;
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
                margin-bottom: 22px;
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

            .feature-list {
                grid-template-columns: 1fr;
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
                Build your secure workspace.
            </h2>

            <p class="brand-description">
                Create an account and manage your profiles
                through a simple and secure user management
                system.
            </p>

            <div class="feature-list">

                <div class="feature">
                    <i class="bi bi-shield-check"></i>
                    Secure authentication
                </div>

                <div class="feature">
                    <i class="bi bi-database-check"></i>
                    Protected data
                </div>

                <div class="feature">
                    <i class="bi bi-person-check"></i>
                    Profile management
                </div>

                <div class="feature">
                    <i class="bi bi-lock"></i>
                    Session protection
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
                    Create your account
                </h1>

                <p>
                    Set up your account to access the workspace.
                </p>

            </div>


            @if ($errors->any())

                <div class="alert alert-danger mb-4">

                    <i class="bi bi-exclamation-circle-fill me-2"></i>

                    <strong>Please check your information.</strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form method="POST" action="{{ url('/register') }}">

                @csrf


                <!-- NAME -->

                <div class="mb-3">

                    <label
                        for="name"
                        class="form-label"
                    >
                        Full name
                    </label>

                    <div class="input-group-custom">

                        <i class="bi bi-person input-icon"></i>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control"
                            placeholder="Kevs Gwapo"
                            maxlength="255"
                            autocomplete="name"
                            required
                        >

                    </div>

                </div>


                <!-- EMAIL -->

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


                <!-- PASSWORD -->

                <div class="mb-3">

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
                            placeholder="Create a password"
                            minlength="8"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword('password', 'passwordIcon')"
                            aria-label="Show password"
                        >
                            <i
                                class="bi bi-eye"
                                id="passwordIcon"
                            ></i>
                        </button>

                    </div>

                    <div class="password-help">
                        Use at least 8 characters.
                    </div>

                </div>


                <!-- CONFIRM PASSWORD -->

                <div class="mb-4">

                    <label
                        for="password_confirmation"
                        class="form-label"
                    >
                        Confirm password
                    </label>

                    <div class="input-group-custom">

                        <i class="bi bi-lock-fill input-icon"></i>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Confirm your password"
                            minlength="8"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword('password_confirmation', 'confirmIcon')"
                            aria-label="Show password"
                        >
                            <i
                                class="bi bi-eye"
                                id="confirmIcon"
                            ></i>
                        </button>

                    </div>

                </div>


                <button
                    type="submit"
                    class="submit-btn"
                >
                    Create account
                    <i class="bi bi-arrow-right ms-2"></i>
                </button>

            </form>


            <div class="login-link">

                Already have an account?

                <a href="{{ url('/login') }}">
                    Sign in
                </a>

            </div>


            <div class="security-note">

                <i class="bi bi-shield-check"></i>

                Your credentials are securely protected

            </div>

        </div>

    </section>

</div>


<script>

function togglePassword(inputId, iconId) {

    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === 'password') {

        input.type = 'text';

        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');

    } else {

        input.type = 'password';

        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');

    }

}

</script>

</body>
</html>