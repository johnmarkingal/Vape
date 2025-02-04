<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Stock In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Stock In</h2>
        <form action="/stock_in/update/<?= $stock_in['id'] ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Product</label>
                <select name="product_id" class="form-control" required>
                    <option value="">Select Product</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?= $product['id'] ?>" <?= $product['id'] == $stock_in['product_id'] ? 'selected' : '' ?>><?= $product['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Supplier</label>
                <select name="supplier_id" class="form-control" required>
                    <option value="">Select Supplier</option>
                    <?php foreach ($suppliers as $supplier): ?>
                        <option value="<?= $supplier['id'] ?>" <?= $supplier['id'] == $stock_in['supplier_id'] ? 'selected' : '' ?>><?= $supplier['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="<?= $stock_in['quantity'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Cost Price</label>
                <input type="text" name="cost_price" class="form-control" value="<?= $stock_in['cost_price'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date Received</label>
                <input type="date" name="date_received" class="form-control" value="<?= $stock_in['date_received'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Stock In</button>
        </form>
    </div>
</body>
</html>
