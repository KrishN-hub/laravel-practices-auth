
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="/post-registration">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input id="name" type="text" name="name" required autofocus>
        </div>
        <div>
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>

    <p>Already have an account? <a href="/login">Login</a></p>
    <p><a href="">Back to Home</a></p>

</body>
</html>
