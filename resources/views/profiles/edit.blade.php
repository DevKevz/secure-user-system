<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Profile</title>
</head>

<body>

    <h1>Edit Profile</h1>

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

    <form method="POST" action="{{ url('/profiles/' . $profile['id'] . '/update') }}">
        @csrf

        <div>
            <label for="full_name">Full Name</label>

            <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name', $profile['full_name']) }}"
                maxlength="100"
                required
            >
        </div>

        <br>

        <div>
            <label for="phone">Phone</label>

            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', $profile['phone']) }}"
                maxlength="30"
            >
        </div>

        <br>

        <div>
            <label for="address">Address</label>

            <textarea
                id="address"
                name="address"
                maxlength="500"
            >{{ old('address', $profile['address']) }}</textarea>
        </div>

        <br>

        <button type="submit">
            Update Profile
        </button>

        <a href="{{ url('/dashboard') }}">
            Cancel
        </a>
    </form>

</body>
</html>