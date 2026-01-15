<?php
include "config/db.php";

if ($_POST) {
    $title    = $_POST['title'];
    $author   = $_POST['author'];
    $category = $_POST['category'];
    $isbn     = $_POST['isbn'];
    $status   = $_POST['status'];

    mysqli_query(
        $conn,
        "INSERT INTO books VALUES (NULL,'$title','$author','$category','$isbn','$status')"
    );

    header("Location: books.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>
                        <i class="fa-solid fa-plus"></i> Add Book
                    </h4>
                </div>

                <div class="card-body">
                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fa-solid fa-book-open"></i> Title
                            </label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fa-solid fa-user"></i> Author
                            </label>
                            <input type="text" name="author" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fa-solid fa-list"></i> Category
                            </label>
                            <input type="text" name="category" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fa-solid fa-barcode"></i> ISBN
                            </label>
                            <input type="text" name="isbn" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                <i class="fa-solid fa-circle-info"></i> Status
                            </label>
                            <select name="status" class="form-select">
                                <option value="AVAILABLE" selected>AVAILABLE</option>
                                <option value="BORROWED">BORROWED</option>
                                <option value="LOST">LOST</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Save Book
                            </button>
                        </div>

                    </form>
                </div>

                <div class="card-footer text-center text-muted">
                    Library Management System
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>
