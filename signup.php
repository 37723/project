<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up | Lumina Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card login-card p-4 shadow">
    <h4 class="text-center mb-2">Create Account</h4>
    <p class="text-center text-muted mb-4">Sign up to manage your library</p>

    <form action="auth/register.php" method="POST">
        <div class="mb-3">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required minlength="6">
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Sign Up</button>
    </form>

    <p class="text-center mt-3 mb-0">
        Already have an account?
        <a href="index.php">Sign in</a>
    </p>
</div>

</body>
</html>
