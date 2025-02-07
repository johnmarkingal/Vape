<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            color: white;
            margin: 0;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            box-shadow: 2px 0 15px rgba(0, 255, 255, 0.3);
        }

        .sidebar h2 {
            color: #0ff;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.7);
        }

        .sidebar nav ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar nav ul li {
            margin: 15px 0;
        }

        .sidebar nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
            transition: 0.3s ease;
        }

        .sidebar nav ul li a:hover {
            background-color: #0ff;
            color: #000;
            border-radius: 8px;
        }

        .main-content {
            margin-left: 250px;
            padding: 40px;
            background-color: #222;
            min-height: 100vh;
        }

        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            max-width: 600px;
            margin: 0 auto;
        }

        h2 {
            font-size: 28px;
            color: #0ff;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.7);
        }

        .form-label {
            font-size: 18px;
            color: #fff;
        }

        .form-control {
            background-color: #222;
            border: 1px solid #444;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #ff00ff;
            outline: none;
        }

        .btn {
            background: linear-gradient(45deg, #0ff, #ff00ff);
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            transition: 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
            width: 100%;
        }

        .btn:hover {
            background: linear-gradient(45deg, #ff00ff, #0ff);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
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
                    <li><a href="<?= site_url('inventory-dashboard') ?>"><i class="fas fa-cogs"></i> Inventory Dashboard</a></li>
                    <li><a href="<?= site_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container mt-5">
            <h2>Add New Supplier</h2>
            <form action="/suppliers/store" method="post">
                <div class="mb-3">
                    <label class="form-label">Supplier Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact Person</label>
                    <input type="text" name="contact_person" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn">Save Supplier</button>
            </form>
        </div>
    </div>
</body>
</html>
