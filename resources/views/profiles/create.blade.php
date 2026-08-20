<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Profile - Secure User System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand fw-bold">
            Secure User System
        </span>
    </div>
</nav>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7 col-lg-6">

            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    <h3 class="fw-bold mb-1">
                        Create Profile
                    </h3>

                    <p class="text-muted mb-4">
                        Add a new user profile.
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Please fix the following:</strong>

                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/profiles') }}">

                        @csrf

                        <div class="mb-3">

                            <label
                                for="full_name"
                                class="form-label fw-semibold"
                            >
                                Full Name
                            </label>

                            <input
                                type="text"
                                id="full_name"
                                name="full_name"
                                value="{{ old('full_name') }}"
                                maxlength="100"
                                required
                                class="form-control"
                                placeholder="Enter full name"
                            >

                        </div>

                        <div class="mb-3">

                            <label
                                for="phone"
                                class="form-label fw-semibold"
                            >
                                Phone
                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                maxlength="30"
                                class="form-control"
                                placeholder="Enter phone number"
                            >

                        </div>

                        <div class="mb-4">

                            <label
                                for="address"
                                class="form-label fw-semibold"
                            >
                                Address
                            </label>

                            <textarea
                                id="address"
                                name="address"
                                maxlength="500"
                                class="form-control"
                                rows="4"
                                placeholder="Enter address"
                            >{{ old('address') }}</textarea>

                        </div>

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Save Profile
                            </button>

                            <a
                                href="{{ url('/dashboard') }}"
                                class="btn btn-outline-secondary"
                            >
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>