<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vape Shop - Suppliers</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="dashboard-container" style="display: flex; flex-grow: 1;">
        <aside class="sidebar">
            <h2>Vape Dashboard</h2>
            <nav>
                <ul>
                <li><a href="<?= site_url('dashboard/profile') ?>"><i class="fas fa-user"></i> Profile</a></li>
                    <li><a href="<?= site_url('products') ?>"><i class="fas fa-box"></i> Products</a></li>
                    <li><a href="<?= site_url('suppliers') ?>"><i class="fas fa-truck"></i> Suppliers</a></li>
                    <li><a href="<?= site_url('stock_in') ?>"><i class="fas fa-box"></i> Stock In</a></li>
                    <li><a href="<?= site_url('sales') ?>"><i class="fas fa-box"></i> Sales</a></li>
                    <li><a href="<?= site_url('sales-details') ?>"><i class="fas fa-box"></i> Sales Details</a></li>
                    <li><a href="<?= site_url('inventory_logs') ?>"><i class="fas fa-box"></i> Inventory Logs</a></li>
                    <li><a href="<?= site_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header>
                <h1>Supplier List</h1>
                <a href="<?= site_url('suppliers/create') ?>" class="action-btn">Add Supplier</a>
            </header>

            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact Person</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($suppliers as $supplier): ?>
                            <tr>
                                <td><?= $supplier['id'] ?></td>
                                <td><?= $supplier['name'] ?></td>
                                <td><?= $supplier['contact_person'] ?></td>
                                <td><?= $supplier['phone'] ?></td>
                                <td><?= $supplier['email'] ?></td>
                                <td>
                                    <a href="<?= site_url('suppliers/edit/' . $supplier['id']) ?>" class="btn-edit">Edit</a>
                                    <a href="<?= site_url('suppliers/delete/' . $supplier['id']) ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this supplier?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
