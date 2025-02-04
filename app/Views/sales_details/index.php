<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
            color: white;
            display: flex;
            min-height: 100vh;
            overflow: hidden;
        }

        #bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            filter: blur(3px) brightness(0.5);
        }

        .sidebar {
            width: 260px;
            background: rgba(0, 0, 0, 0.85);
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: 100vh;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
        }

        .sidebar h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #0ff;
        }

        .sidebar nav ul {
            list-style: none;
            padding: 0;
        }

        .sidebar nav ul li {
            margin: 15px 0;
        }

        .sidebar nav ul li a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            padding: 12px 18px;
            font-size: 16px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
        }

        .main-content {
            flex-grow: 1;
            padding: 40px;
            background: rgba(0, 0, 0, 0.7);
            box-shadow: 0 4px 15px rgba(0, 255, 255, 0.5);
            border-radius: 15px;
            margin: 20px;
            text-align: center;
        }

        .table {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
            color: #fff;
        }

        .table th {
            background-color: rgba(0, 255, 255, 0.3);
        }

        .btn-edit, .btn-delete {
            padding: 6px 12px;
            font-size: 14px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-edit { background-color: #0ff; }
        .btn-delete { background-color: #ff4d4d; }
    </style>
</head>
<body>
    <video id="bg-video" autoplay muted loop>
        <source src="<?= base_url('assets/videos/vape_background.mp4') ?>" type="video/mp4">
    </video>

    <div class="dashboard-container" style="display: flex; flex-grow: 1;">
        <aside class="sidebar">
            <h2>Vape Dashboard</h2>
            <nav>
                <ul>
                <li><a href="<?= site_url('dashboard/profile') ?>"><i class="fas fa-user"></i> Profile</a></li>
                    <li><a href="<?= site_url('products') ?>"><i class="fas fa-box"></i> Products</a></li>
                    <li><a href="<?= site_url('suppliers') ?>"><i class="fas fa-truck"></i> Suppliers</a></li>
                    <li><a href="<?= site_url('stock_in') ?>"><i class="fas fa-box"></i> Stock</a></li>
                    <li><a href="<?= site_url('sales') ?>"><i class="fas fa-chart-line"></i> Sales</a></li>
                    <li><a href="<?= site_url('sales-details') ?>"><i class="fas fa-chart-line"></i> Sales Details</a></li>
                    <li><a href="<?= site_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header>
                <h1>Sales Details</h1>
                <a href="<?= site_url('sales-details/create') ?>" class="action-btn">Add Sales Detail</a>
            </header>

            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sale ID</th>
                            <th>Product ID</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sales_details as $sales_detail): ?>
                            <tr>
                                <td><?= $sales_detail['id'] ?></td>
                                <td><?= $sales_detail['sale_id'] ?></td>
                                <td><?= $sales_detail['product_id'] ?></td>
                                <td><?= $sales_detail['quantity'] ?></td>
                                <td>₱<?= number_format($sales_detail['price'], 2) ?></td>
                                <td>₱<?= number_format($sales_detail['subtotal'], 2) ?></td>
                                <td>
                                    <a href="<?= site_url('sales-details/edit/' . $sales_detail['id']) ?>" class="btn-edit">Edit</a>
                                    <a href="<?= site_url('sales-details/delete/' . $sales_detail['id']) ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
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
