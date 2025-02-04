<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Sales List</h2>
        <a href="/sales/create" class="btn btn-success mb-3">Add Sale</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Total Amount</th>
                    <th>Sale Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $sale): ?>
                    <tr>
                        <td><?= $sale['id'] ?></td>
                        <td><?= $sale['total_amount'] ?></td>
                        <td><?= $sale['sale_date'] ?></td>
                        <td>
                            <a href="/sales/edit/<?= $sale['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/sales/delete/<?= $sale['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>