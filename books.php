<?php
include "config/db.php";

// Check if a status filter is set from dashboard
$status = isset($_GET['status']) ? $_GET['status'] : '';

// Fetch books from database
if($status) {
    $books = mysqli_query($conn, "SELECT * FROM books WHERE status='$status'");
} else {
    $books = mysqli_query($conn, "SELECT * FROM books");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books Collection | Lumina Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f5f6fa;
        }

        .table-container {
            margin-left: 260px; /* same as sidebar width */
            padding: 30px;
        }

        .table-card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .table-hover tbody tr:hover {
            background-color: #f0f8ff;
        }

        .status-badge {
            font-weight: 500;
        }

        .action-btn i {
            margin-right: 3px;
        }

        .filter-title {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="table-container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="filter-title">
            <i class="fa-solid fa-book"></i>
            <?= $status ? ucfirst(strtolower($status)) . " Books" : "All Books" ?>
        </h3>
        <a href="add_book.php" class="btn btn-success">
            <i class="fa-solid fa-plus"></i> Add New Book
        </a>
    </div>

    <div class="table-card">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>ISBN</th>
                    <th>Status</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($books) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($books)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['title']) ?></td>
                            <td><?= htmlspecialchars($row['author']) ?></td>
                            <td><?= htmlspecialchars($row['category']) ?></td>
                            <td><?= htmlspecialchars($row['isbn']) ?></td>
                            <td>
                                <span class="badge status-badge bg-<?= 
                                    $row['status']=='AVAILABLE'?'success':($row['status']=='BORROWED'?'warning':'danger')
                                ?>">
                                    <?= $row['status'] ?>
                                </span>
                            </td>
                            <td>
                                <a href="edit_book.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary action-btn">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                                <a href="delete_book.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger action-btn" onclick="return confirm('Are you sure you want to delete this book?');">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">No books found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
