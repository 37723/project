<?php
include "config/db.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
$book = mysqli_fetch_assoc($result);

if ($_POST) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $isbn = $_POST['isbn'];
    $status = $_POST['status'];

    mysqli_query($conn, "
        UPDATE books 
        SET title='$title',
            author='$author',
            category='$category',
            isbn='$isbn',
            status='$status'
        WHERE id=$id
    ");

    header("Location: books.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4><i class="fa-solid fa-pen"></i> Edit Book</h4>
                </div>

                <div class="card-body">
                    <form method="POST">

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="<?= $book['title'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label>Author</label>
                            <input type="text" name="author" class="form-control" value="<?= $book['author'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label>Category</label>
                            <input type="text" name="category" class="form-control" value="<?= $book['category'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label>ISBN</label>
                            <input type="text" name="isbn" class="form-control" value="<?= $book['isbn'] ?>" required>
                        </div>

                        <div class="mb-4">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="AVAILABLE" <?= $book['status']=='AVAILABLE'?'selected':'' ?>>AVAILABLE</option>
                                <option value="BORROWED" <?= $book['status']=='BORROWED'?'selected':'' ?>>BORROWED</option>
                                <option value="LOST" <?= $book['status']=='LOST'?'selected':'' ?>>LOST</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Update Book
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>
