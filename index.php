<!DOCTYPE html>
<html>
<head>
    <title>My Library - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow" style="width:380px">
    <h4 class="text-center mb-3">Welcome Back</h4>

    <form action="auth/login.php" method="POST">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Sign In</button>
    </form>
    <p class="text-center mt-3">
    Don't have an account?
    <a href="signup.php">Sign up for free</a>
    </p>

</div>

</body>
</html>
