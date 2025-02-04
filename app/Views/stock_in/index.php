<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock In List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Stock In List</h2>
        <a href="/stock_in/create" class="btn btn-success mb-3">Add Stock In</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Supplier</th>
                    <th>Quantity</th>
                    <th>Cost Price</th>
                    <th>Date Received</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stock_in as $stock): ?>
                    <tr>
                        <td><?= $stock['id'] ?></td>
                        <td><?= $stock['product_id'] ?></td>
                        <td><?= $stock['supplier_id'] ?></td>
                        <td><?= $stock['quantity'] ?></td>
                        <td><?= $stock['cost_price'] ?></td>
                        <td><?= $stock['date_received'] ?></td>
                        <td>
                            <a href="/stock_in/edit/<?= $stock['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/stock_in/delete/<?= $stock['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>