<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <h1>Login</h1>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div>
            <strong>Login failed:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <div>
            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                maxlength="255"
            >
        </div>

        <div>
            <label>Password</label>

            <input
                type="password"
                name="password"
                required
            >
        </div>

        <button type="submit">
            Login
        </button>
    </form>

    <p>
        Don't have an account?
        <a href="{{ url('/register') }}">Register</a>
    </p>

</body>
</html>