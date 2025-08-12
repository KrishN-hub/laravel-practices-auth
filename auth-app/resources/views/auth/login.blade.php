
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="/post-login">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" required autofocus>
        </div>
        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>

    <p>Don't have an account? <a href="/registration">Registration</a></p>
    <p><a href="">Forgot your password?</a></p>
    <p><a href="">Back to Home</a></p>
    </body>
</html>
