<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Profile | SecureSystem</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
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
            color: var(--dark);
        }

        .page-wrapper {
            min-height: 100vh;
            padding: 45px 20px;
        }

        .container-custom {
            max-width: 760px;
            margin: 0 auto;
        }

        /* Back */

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 18px;
            transition: 0.2s ease;
        }

        .back-link:hover {
            color: var(--primary);
        }

        /* Header */

        .page-header {
            margin-bottom: 25px;
        }

        .page-title {
            margin: 0;
            font-size: 30px;
            font-weight: 750;
            letter-spacing: -1px;
        }

        .page-subtitle {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 14px;
        }

        /* Card */

        .edit-card {
            background: #ffffff;
            border: 1px solid #eef0f4;
            border-radius: 18px;
            overflow: hidden;
            box-shadow:
                0 10px 30px rgba(17, 24, 39, 0.05),
                0 2px 8px rgba(17, 24, 39, 0.03);
        }

        /* Card Header */

        .card-header-custom {
            padding: 25px 30px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-icon {
            width: 50px;
            height: 50px;
            flex-shrink: 0;
            border-radius: 14px;
            background: #eeecff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .card-header-title {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
        }

        .card-header-description {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 12px;
        }

        /* Body */

        .card-body-custom {
            padding: 30px;
        }

        /* Alert */

        .alert {
            border: 0;
            border-radius: 10px;
            font-size: 13px;
        }

        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
        }

        /* Form */

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 650;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            z-index: 2;
        }

        .textarea-icon {
            top: 18px;
            transform: none;
        }

        .form-control {
            width: 100%;
            min-height: 48px;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding-left: 42px;
            font-size: 13px;
            box-shadow: none;
            transition: 0.2s ease;
        }

        textarea.form-control {
            min-height: 125px;
            padding-top: 14px;
            resize: vertical;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 91, 255, 0.10);
        }

        .form-control::placeholder {
            color: #b0b5bd;
        }

        .form-help {
            margin-top: 6px;
            font-size: 11px;
            color: #9ca3af;
        }

        /* Footer */

        .card-footer-custom {
            padding: 20px 30px;
            border-top: 1px solid var(--border);
            background: #fafafa;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .security-note {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #9ca3af;
            font-size: 11px;
        }

        .security-note i {
            color: #22c55e;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Cancel */

        .btn-cancel {
            height: 42px;
            padding: 0 18px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            color: #4b5563;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s ease;
        }

        .btn-cancel:hover {
            background: #f3f4f6;
            color: var(--dark);
        }

        /* Update */

        .btn-update {
            height: 42px;
            padding: 0 20px;
            border: 0;
            border-radius: 8px;
            background: var(--primary);
            color: white;
            font-size: 13px;
            font-weight: 650;
            transition: 0.2s ease;
            box-shadow: 0 6px 16px rgba(99, 91, 255, 0.18);
        }

        .btn-update:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        /* Responsive */

        @media (max-width: 650px) {

            .page-wrapper {
                padding: 25px 15px;
            }

            .page-title {
                font-size: 25px;
            }

            .card-header-custom,
            .card-body-custom {
                padding: 22px;
            }

            .card-footer-custom {
                padding: 18px 22px;
                flex-direction: column;
                align-items: stretch;
            }

            .security-note {
                justify-content: center;
            }

            .actions {
                width: 100%;
            }

            .btn-cancel,
            .btn-update {
                flex: 1;
            }
        }
    </style>
</head>

<body>

<div class="page-wrapper">

    <div class="container-custom">

        <!-- Back -->

        <a
            href="{{ url('/dashboard') }}"
            class="back-link"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Dashboard
        </a>


        <!-- Header -->

        <div class="page-header">

            <h1 class="page-title">
                Edit Profile
            </h1>

            <p class="page-subtitle">
                Update the information associated with this profile.
            </p>

        </div>


        <!-- Card -->

        <div class="edit-card">

            <!-- Card Header -->

            <div class="card-header-custom">

                <div class="profile-icon">
                    <i class="bi bi-person-fill-gear"></i>
                </div>

                <div>

                    <h2 class="card-header-title">
                        Profile Information
                    </h2>

                    <p class="card-header-description">
                        Make sure the information below is accurate.
                    </p>

                </div>

            </div>


            <!-- Form -->

            <form
                method="POST"
                action="{{ url('/profiles/' . $profile['id'] . '/update') }}"
            >

                @csrf


                <div class="card-body-custom">

                    <!-- Errors -->

                    @if ($errors->any())

                        <div class="alert alert-danger mb-4">

                            <div class="d-flex gap-2">

                                <i class="bi bi-exclamation-circle-fill"></i>

                                <div>

                                    <strong>
                                        Please fix the following errors:
                                    </strong>

                                    <ul class="mb-0 mt-2">

                                        @foreach ($errors->all() as $error)

                                            <li>
                                                {{ $error }}
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                    @endif


                    <!-- Full Name -->

                    <div class="form-group">

                        <label
                            for="full_name"
                            class="form-label"
                        >
                            Full Name
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-person input-icon"></i>

                            <input
                                type="text"
                                id="full_name"
                                name="full_name"
                                value="{{ old('full_name', $profile['full_name']) }}"
                                class="form-control"
                                maxlength="100"
                                placeholder="Enter full name"
                                autocomplete="name"
                                required
                            >

                        </div>

                        <div class="form-help">
                            Enter the user's complete name.
                        </div>

                    </div>


                    <!-- Phone -->

                    <div class="form-group">

                        <label
                            for="phone"
                            class="form-label"
                        >
                            Phone Number
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-telephone input-icon"></i>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone', $profile['phone']) }}"
                                class="form-control"
                                maxlength="30"
                                placeholder="09XXXXXXXXX"
                                autocomplete="tel"
                            >

                        </div>

                        <div class="form-help">
                            Optional contact number.
                        </div>

                    </div>


                    <!-- Address -->

                    <div class="form-group mb-0">

                        <label
                            for="address"
                            class="form-label"
                        >
                            Address
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-geo-alt input-icon textarea-icon"></i>

                            <textarea
                                id="address"
                                name="address"
                                class="form-control"
                                maxlength="500"
                                placeholder="Enter complete address"
                            >{{ old('address', $profile['address']) }}</textarea>

                        </div>

                        <div class="form-help">
                            Maximum of 500 characters.
                        </div>

                    </div>

                </div>


                <!-- Footer -->

                <div class="card-footer-custom">

                    <div class="security-note">

                        <i class="bi bi-shield-check"></i>

                        Changes are protected with secure form handling.

                    </div>


                    <div class="actions">

                        <a
                            href="{{ url('/dashboard') }}"
                            class="btn-cancel"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn-update"
                        >
                            <i class="bi bi-check2 me-1"></i>
                            Update Profile
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>