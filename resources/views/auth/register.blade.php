<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <h1>Register</h1>

    @if ($errors->any())
        <div>
            <strong>Please fix the following errors:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <div>
            <label>Name</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                maxlength="100"
            >
        </div>

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
                minlength="8"
            >
        </div>

        <div>
            <label>Confirm Password</label>

            <input
                type="password"
                name="password_confirmation"
                required
                minlength="8"
            >
        </div>

        <button type="submit">Register</button>
    </form>

    <p>
        Already have an account?
        <a href="{{ url('/login') }}">Login</a>
    </p>

</body>
</html>