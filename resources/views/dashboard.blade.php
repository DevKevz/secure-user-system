<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Secure User System</title>

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

        <form method="POST" action="{{ url('/logout') }}">
            @csrf

            <button type="submit" class="btn btn-outline-light btn-sm">
                Logout
            </button>
        </form>
    </div>
</nav>

<div class="container py-5">

    <div class="mb-4">
        <h1 class="fw-bold">Dashboard</h1>

        <p class="text-muted mb-0">
            Welcome, {{ session('user_name') }}
        </p>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">

                <h5 class="mb-0 fw-bold">
                    User Profiles
                </h5>

                <a
                    href="{{ url('/profiles/create') }}"
                    class="btn btn-primary"
                >
                    + Add Profile
                </a>

            </div>
        </div>

        <div class="card-body p-0">

            @if (empty($profiles))

                <div class="text-center py-5">

                    <h5 class="text-muted">
                        No profiles found
                    </h5>

                    <p class="text-muted">
                        Create your first profile to get started.
                    </p>

                </div>

            @else

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th class="px-4">#</th>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th class="text-end px-4">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($profiles as $profile)

                                <tr>

                                    <td class="px-4">
                                        {{ $profile['id'] }}
                                    </td>

                                    <td class="fw-semibold">
                                        {{ $profile['full_name'] }}
                                    </td>

                                    <td>
                                        {{ $profile['phone'] ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ $profile['address'] ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ $profile['created_by'] }}
                                    </td>

                                    <td>
                                        {{ $profile['created_at'] }}
                                    </td>

                                    <td class="text-end px-4">

                                        <a
                                            href="{{ url('/profiles/' . $profile['id'] . '/edit') }}"
                                            class="btn btn-sm btn-outline-primary"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            method="POST"
                                            action="{{ url('/profiles/' . $profile['id'] . '/delete') }}"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this profile?');"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @endif

        </div>

    </div>

</div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>