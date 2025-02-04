<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vape Shop | Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .action-btn {
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background: linear-gradient(45deg, #0ff, #ff00ff);
            transition: 0.3s ease;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.7);
            margin-top: 15px;
        }

        .action-btn:hover {
            background: linear-gradient(45deg, #ff00ff, #0ff);
            transform: scale(1.05);
        }

        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            padding: 20px;
            border-radius: 15px;
            color: white;
            text-align: left;
            transition: all 0.3s ease;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
        }

        .stat-card:hover {
            transform: scale(1.05);
        }

        .bg-pink { background: linear-gradient(to right, #ec4899, #f97316); }
        .bg-blue { background: linear-gradient(to right, #3b82f6, #4f46e5); }
        .bg-teal { background: linear-gradient(to right, #14b8a6, #10b981); }

        .chart-container {
            margin-top: 30px;
            padding: 30px;
            border-radius: 15px;
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
            width: 90%;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        canvas {
            width: 100% !important;
            height: 350px !important;
        }
    </style>
</head>
<body>

    <video id="bg-video" autoplay muted loop>
        <source src="<?= base_url('assets/videos/vape_background.mp4') ?>" type="video/mp4">
    </video>

    <div class="dashboard-container" style="display: flex; flex-grow: 1;">
        
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
                    <li><a href="<?= site_url('inventory_logs') ?>"><i class="fas fa-box"></i> Inventory Logs</a></li>
                    <li><a href="<?= site_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header>
                <h1>Welcome, <?= esc($user['username']) ?>!</h1>
            </header>

            <!-- Dashboard Stats -->
            <div class="dashboard-stats">
                <div class="stat-card bg-pink">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-semibold">Weekly Sales</h2>
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="mt-4 text-3xl font-bold">$ 15,0000</div>
                    <div class="mt-2">Increased by 60%</div>
                </div>
                <div class="stat-card bg-blue">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-semibold">Weekly Orders</h2>
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <div class="mt-4 text-3xl font-bold">45,6334</div>
                    <div class="mt-2">Decreased by 10%</div>
                </div>
                <div class="stat-card bg-teal">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-semibold">Visitors Online</h2>
                        <i class="fas fa-gem"></i>
                    </div>
                    <div class="mt-4 text-3xl font-bold">95,5741</div>
                    <div class="mt-2">Increased by 5%</div>
                </div>
            </div>

            <!-- Bar Chart Container -->
            <div class="chart-container">
                <canvas id="barChart"></canvas>
            </div>
        </main>
    </div>

    <script>
        const ctx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctx, {
            type: 'bar', // Change from 'line' to 'bar'
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Sales',
                    data: [15000, 20000, 18000, 22000, 25000, 23000, 26000],
                    backgroundColor: 'rgba(75, 192, 192, 0.6)', // Semi-transparent for a 3D effect
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    hoverBackgroundColor: 'rgba(75, 192, 192, 0.8)', // On hover effect
                    hoverBorderColor: 'rgba(75, 192, 192, 1)',
                    borderRadius: 5, // Rounded bars
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 1000, // Duration of the animation in ms
                    easing: 'easeOutBounce', // Bounce effect on animation
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: { color: '#fff' }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#fff' }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.7)', // Darker tooltip
                        titleColor: '#fff',
                        bodyColor: '#fff'
                    }
                },
                elements: {
                    bar: {
                        borderWidth: 2,
                        borderColor: 'rgba(0, 0, 0, 0.2)', // Subtle border effect for depth
                        shadowOffsetX: 5, // Horizontal shadow offset
                        shadowOffsetY: 5, // Vertical shadow offset
                        shadowColor: 'rgba(0, 0, 0, 0.3)', // Shadow color
                        shadowBlur: 10, // Shadow blur
                    }
                }
            }
        });
    </script>
</body>
</html>
