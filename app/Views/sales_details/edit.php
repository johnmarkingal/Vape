<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sales Detail</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            transition: 0.3s ease;
        }

        .sidebar h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
            color: #0ff;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.7);
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
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: inset 0 0 10px rgba(0, 255, 255, 0.3);
        }

        .sidebar nav ul li a i {
            font-size: 20px;
            margin-right: 15px;
        }

        .sidebar nav ul li a:hover {
            background-color: #ff00ff;
            color: #fff;
            font-weight: bold;
            box-shadow: 0 0 15px #ff00ff;
        }

        .main-content {
            flex-grow: 1;
            padding: 40px;
            background: rgba(0, 0, 0, 0.7);
            box-shadow: 0 4px 15px rgba(0, 255, 255, 0.5);
            border-radius: 15px;
            margin: 20px;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        header h1 {
            font-size: 28px;
            color: #0ff;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.7);
        }

        .form-label {
            font-size: 16px;
            color: white;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            border: 1px solid #0ff;
            color: white;
            font-size: 16px;
            padding: 10px;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: #ff00ff;
            box-shadow: 0 0 10px #ff00ff;
        }

        .btn-primary {
            background: linear-gradient(45deg, #0ff, #ff00ff);
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.7);
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #ff00ff, #0ff);
            transform: scale(1.05);
        }
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
                li><a href="<?= site_url('dashboard/profile') ?>"><i class="fas fa-user"></i> Profile</a></li>
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
        <main class="main-content">
            <header>
                <h1>Edit Sales Detail</h1>
            </header>

            <div class="container">
                <form action="/sales-details/update/<?= $sales_detail['id'] ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Sale ID</label>
                        <input type="number" name="sale_id" class="form-control" value="<?= $sales_detail['sale_id'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product ID</label>
                        <input type="number" name="product_id" class="form-control" value="<?= $sales_detail['product_id'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="<?= $sales_detail['quantity'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" value="<?= $sales_detail['price'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtotal</label>
                        <input type="text" name="subtotal" class="form-control" value="<?= $sales_detail['subtotal'] ?>" required>
                    </div>
                    <button type="submit" class="btn-primary">Update Sales Detail</button>
                </form>
            </div>
        </main>
    </div>

</body>
</html>
