<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

/* Stats */
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) total FROM books"))['total'];
$available = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) total FROM books WHERE status='AVAILABLE'"))['total'];
$borrowed = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) total FROM books WHERE status='BORROWED'"))['total'];
$reserved = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) total FROM books WHERE status='RESERVED'"))['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | My Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f5f6fa;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #ffffff;
            position: fixed;
            left: 0;
            top: 0;
            border-right: 1px solid #ddd;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
        }

        .sidebar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            padding: 12px 15px;
            color: #333;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #0d6efd;
            color: #fff;
        }

        .user-box {
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: #0d6efd;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }

        .logout-btn {
            display: block;
            margin-top: 10px;
            color: #dc3545;
            text-decoration: none;
            font-weight: 500;
        }

        .logout-btn:hover {
            text-decoration: underline;
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .stat-card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .stat-icon {
            font-size: 1.8rem;
            padding: 10px;
            border-radius: 50%;
        }

        .quick-actions a {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div>
        <div class="logo">📚 My Library</div>
        <a href="dashboard.php" class="active"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        <a href="books.php"><i class="fa-solid fa-book"></i> Books</a>
        <!-- Add more menu items if needed -->
    </div>

    <div class="user-box d-flex flex-column align-items-start">
        <div class="d-flex align-items-center">
            <div class="user-avatar"><?= strtoupper(substr($_SESSION['user'],0,1)) ?></div>
            <div>
                <small class="text-muted">Logged in as</small><br>
                <strong><?= $_SESSION['user'] ?></strong>
            </div>
        </div>
        <a href="auth/logout.php" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Welcome, <?= $_SESSION['user'] ?>!</h2>
        <small class="text-muted">Overview of your library</small>
    </div>

   <!-- STAT CARDS -->
<div class="row g-4 mb-4">

    <!-- Total Books -->
    <div class="col-md-3">
        <a href="books.php" class="text-decoration-none">
            <div class="stat-card d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Total Books</small>
                    <h3><?= $total ?></h3>
                </div>
                <div class="stat-icon bg-primary text-white">📘</div>
            </div>
        </a>
    </div>

    <!-- Available -->
    <div class="col-md-3">
        <a href="books.php?status=AVAILABLE" class="text-decoration-none">
            <div class="stat-card d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Available</small>
                    <h3><?= $available ?></h3>
                </div>
                <div class="stat-icon bg-success text-white">✅</div>
            </div>
        </a>
    </div>

    <!-- Borrowed -->
    <div class="col-md-3">
        <a href="books.php?status=BORROWED" class="text-decoration-none">
            <div class="stat-card d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Borrowed</small>
                    <h3><?= $borrowed ?></h3>
                </div>
                <div class="stat-icon bg-warning text-white">📕</div>
            </div>
        </a>
    </div>

    <!-- Reserved -->
    <div class="col-md-3">
        <a href="books.php?status=RESERVED" class="text-decoration-none">
            <div class="stat-card d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Reserved</small>
                    <h3><?= $reserved ?></h3>
                </div>
                <div class="stat-icon bg-danger text-white">⏳</div>
            </div>
        </a>
    </div>

</div>

    <!-- QUICK ACTIONS -->
    <div class="card p-4">
        <h5 class="mb-3"><i class="fa-solid fa-bolt"></i> Quick Actions</h5>
        <div class="quick-actions">
            <a href="add_book.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New Book</a>
            <a href="books.php" class="btn btn-outline-secondary"><i class="fa-solid fa-book"></i> View Books</a>
        </div>
    </div>

</div>

</body>
</html>
