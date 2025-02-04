<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sale</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Sale</h2>
        <form action="/sales/update/<?= $sale['id'] ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Total Amount</label>
                <input type="number" name="total_amount" class="form-control" value="<?= $sale['total_amount'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Sale Date</label>
                <input type="datetime-local" name="sale_date" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($sale['sale_date'])) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Sale</button>
        </form>
    </div>
</body>
</html>
