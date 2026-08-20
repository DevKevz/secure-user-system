<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Secure User System</title>

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
            --sidebar: #111827;
            --sidebar-hover: #1f2937;
            --background: #f5f7fb;
            --text: #111827;
            --muted: #6b7280;
            --border: #e5e7eb;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--background);
            color: var(--text);
            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }

        .app {
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: var(--sidebar);
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            padding: 24px 16px;
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px 30px;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: linear-gradient(
                135deg,
                #7c3aed,
                #4f46e5
            );
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .brand-text {
            font-size: 17px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .nav-label {
            color: #6b7280;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 12px;
            margin-bottom: 8px;
        }

        .side-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 12px;
            margin-bottom: 4px;
            color: #9ca3af;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            transition: 0.2s ease;
        }

        .side-link:hover,
        .side-link.active {
            background: var(--sidebar-hover);
            color: white;
        }

        .side-link.active {
            background: rgba(99, 91, 255, 0.16);
            color: #a5b4fc;
        }

        .side-link i {
            font-size: 17px;
        }

        .sidebar-bottom {
            position: absolute;
            left: 16px;
            right: 16px;
            bottom: 20px;
        }

        .user-mini {
            border-top: 1px solid #1f2937;
            padding-top: 16px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(
                135deg,
                #6366f1,
                #8b5cf6
            );
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
        }

        .user-info {
            min-width: 0;
        }

        .user-name {
            color: white;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role {
            color: #6b7280;
            font-size: 11px;
        }

        .logout-btn {
            width: 100%;
            border: 0;
            background: transparent;
            color: #9ca3af;
            text-align: left;
            padding: 10px 12px;
            border-radius: 9px;
            font-size: 13px;
        }

        .logout-btn:hover {
            background: #1f2937;
            color: #f87171;
        }

        /* Main */

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
        }

        .topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
        }

        .page-location {
            color: var(--muted);
            font-size: 13px;
        }

        .page-location span {
            color: var(--text);
            font-weight: 600;
        }

        .topbar-status {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--muted);
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
        }

        .content {
            padding: 35px;
        }

        .welcome-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .eyebrow {
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 7px;
        }

        .page-title {
            font-size: 30px;
            font-weight: 750;
            letter-spacing: -1px;
            margin: 0;
        }

        .subtitle {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 14px;
        }

        .add-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary);
            border: 0;
            border-radius: 9px;
            padding: 11px 17px;
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(99, 91, 255, 0.2);
            transition: 0.2s ease;
        }

        .add-btn:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-1px);
        }

        /* Stats */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-label {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 750;
            letter-spacing: -0.5px;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eef2ff;
            color: var(--primary);
            font-size: 19px;
        }

        /* Table */

        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
        }

        .panel-header {
            padding: 20px 22px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .panel-title {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
        }

        .panel-subtitle {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 12px;
        }

        .profile-count {
            background: #f3f4f6;
            color: #4b5563;
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 11px;
            font-weight: 600;
        }

        .table {
            margin: 0;
        }

        .table thead th {
            background: #fafafa;
            color: #6b7280;
            border-bottom: 1px solid var(--border);
            padding: 13px 20px;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            font-weight: 700;
        }

        .table tbody td {
            padding: 16px 20px;
            border-color: #f0f1f3;
            font-size: 13px;
            vertical-align: middle;
        }

        .table tbody tr {
            transition: 0.15s ease;
        }

        .table tbody tr:hover {
            background: #fafaff;
        }

        .profile-name {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
        }

        .profile-avatar {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: #eef2ff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
        }

        .muted {
            color: var(--muted);
        }

        .action-btn {
            width: 31px;
            height: 31px;
            border-radius: 7px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            background: white;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .edit-btn {
            color: #4f46e5;
        }

        .edit-btn:hover {
            background: #eef2ff;
        }

        .delete-btn {
            color: #dc2626;
        }

        .delete-btn:hover {
            background: #fef2f2;
        }

        .empty-state {
            text-align: center;
            padding: 65px 20px;
        }

        .empty-icon {
            width: 55px;
            height: 55px;
            border-radius: 15px;
            background: #eef2ff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 23px;
        }

        .empty-state h5 {
            font-size: 16px;
            font-weight: 700;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 13px;
        }

        /* Alerts */

        .alert-wrapper {
            margin-bottom: 20px;
        }

        .custom-alert {
            border: 0;
            border-radius: 10px;
            font-size: 13px;
        }

        /* Responsive */

        @media (max-width: 900px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .brand-text,
            .nav-label,
            .side-link span,
            .user-info,
            .logout-btn span {
                display: none;
            }

            .brand {
                justify-content: center;
                padding: 8px 0 30px;
            }

            .side-link {
                justify-content: center;
            }

            .sidebar-bottom {
                left: 10px;
                right: 10px;
            }

            .user-mini {
                justify-content: center;
            }

            .main {
                margin-left: 70px;
                width: calc(100% - 70px);
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {

            .topbar {
                padding: 0 18px;
            }

            .content {
                padding: 22px 15px;
            }

            .welcome-row {
                align-items: flex-start;
                flex-direction: column;
                gap: 18px;
            }

            .page-title {
                font-size: 25px;
            }

            .add-btn {
                width: 100%;
                justify-content: center;
            }

            .panel-header {
                padding: 17px;
            }

            .table thead th,
            .table tbody td {
                padding-left: 14px;
                padding-right: 14px;
            }
        }
    </style>
</head>

<body>

<div class="app">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                <i class="bi bi-shield-lock-fill"></i>
            </div>

            <div class="brand-text">
                SecureSystem
            </div>

        </div>

        <div class="nav-label">
            Workspace
        </div>

        <a href="{{ url('/dashboard') }}" class="side-link active">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ url('/profiles/create') }}" class="side-link">
            <i class="bi bi-person-plus-fill"></i>
            <span>New Profile</span>
        </a>

        <div class="sidebar-bottom">

            <div class="user-mini">

                <div class="avatar">
                    {{ strtoupper(substr(session('user_name', 'U'), 0, 1)) }}
                </div>

                <div class="user-info">
                    <div class="user-name">
                        {{ session('user_name', 'User') }}
                    </div>

                    <div class="user-role">
                        Authenticated User
                    </div>
                </div>

            </div>

            <form method="POST" action="{{ url('/logout') }}">

                @csrf

                <button type="submit" class="logout-btn">

                    <i class="bi bi-box-arrow-left me-2"></i>

                    <span>Sign out</span>

                </button>

            </form>

        </div>

    </aside>


    <!-- MAIN -->

    <main class="main">

        <header class="topbar">

            <div class="page-location">
                Workspace / <span>Dashboard</span>
            </div>

            <div class="topbar-status">
                <span class="status-dot"></span>
                Session active
            </div>

        </header>


        <section class="content">

            <!-- HEADER -->

            <div class="welcome-row">

                <div>

                    <div class="eyebrow">
                        Overview
                    </div>

                    <h1 class="page-title">
                        Good day, {{ session('user_name', 'User') }}.
                    </h1>

                    <p class="subtitle">
                        Manage your user profiles from one secure workspace.
                    </p>

                </div>

                <a
                    href="{{ url('/profiles/create') }}"
                    class="add-btn"
                >
                    <i class="bi bi-plus-lg"></i>
                    Add Profile
                </a>

            </div>


            <!-- ALERTS -->

            <div class="alert-wrapper">

                @if (session('success'))

                    <div class="alert alert-success custom-alert alert-dismissible fade show">

                        <i class="bi bi-check-circle-fill me-2"></i>

                        {{ session('success') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                        ></button>

                    </div>

                @endif

                @if ($errors->any())

                    <div class="alert alert-danger custom-alert">

                        @foreach ($errors->all() as $error)

                            <div>
                                <i class="bi bi-exclamation-circle me-2"></i>
                                {{ $error }}
                            </div>

                        @endforeach

                    </div>

                @endif

            </div>


            <!-- STATS -->

            <div class="stats-grid">

                <div class="stat-card">

                    <div>
                        <div class="stat-label">
                            Total Profiles
                        </div>

                        <div class="stat-value">
                            {{ count($profiles) }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                </div>


                <div class="stat-card">

                    <div>
                        <div class="stat-label">
                            Account Status
                        </div>

                        <div class="stat-value" style="font-size: 18px;">
                            Active
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                </div>


                <div class="stat-card">

                    <div>
                        <div class="stat-label">
                            Security
                        </div>

                        <div class="stat-value" style="font-size: 18px;">
                            Protected
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-lock-fill"></i>
                    </div>

                </div>

            </div>


            <!-- PROFILES -->

            <div class="panel">

                <div class="panel-header">

                    <div>

                        <h2 class="panel-title">
                            User Profiles
                        </h2>

                        <p class="panel-subtitle">
                            Manage the profiles associated with your account.
                        </p>

                    </div>

                    <span class="profile-count">
                        {{ count($profiles) }} records
                    </span>

                </div>


                @if (empty($profiles))

                    <div class="empty-state">

                        <div class="empty-icon">
                            <i class="bi bi-person-plus"></i>
                        </div>

                        <h5>
                            No profiles yet
                        </h5>

                        <p>
                            Create your first profile to get started.
                        </p>

                        <a
                            href="{{ url('/profiles/create') }}"
                            class="add-btn"
                        >
                            <i class="bi bi-plus-lg"></i>
                            Create Profile
                        </a>

                    </div>

                @else

                    <div class="table-responsive">

                        <table class="table">

                            <thead>

                                <tr>
                                    <th>Profile</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Created</th>
                                    <th class="text-end">Actions</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($profiles as $profile)

                                    <tr>

                                        <td>

                                            <div class="profile-name">

                                                <div class="profile-avatar">
                                                    {{ strtoupper(substr($profile['full_name'], 0, 1)) }}
                                                </div>

                                                <span>
                                                    {{ $profile['full_name'] }}
                                                </span>

                                            </div>

                                        </td>

                                        <td>
                                            {{ $profile['phone'] ?: '—' }}
                                        </td>

                                        <td class="muted">
                                            {{ $profile['address'] ?: '—' }}
                                        </td>

                                        <td class="muted">
                                            {{ $profile['created_at'] }}
                                        </td>

                                        <td class="text-end">

                                            <a
                                                href="{{ url('/profiles/' . $profile['id'] . '/edit') }}"
                                                class="action-btn edit-btn me-1"
                                                title="Edit profile"
                                            >
                                                <i class="bi bi-pencil"></i>
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
                                                    class="action-btn delete-btn"
                                                    title="Delete profile"
                                                >
                                                    <i class="bi bi-trash3"></i>
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

        </section>

    </main>

</div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>