<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vape Shop | Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        /* Global Styling */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
        }

        /* Background Video Styling */
        #bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            filter: blur(5px) brightness(0.5);
        }

        /* Main Login Container */
        .login-container {
            position: relative;
            max-width: 420px;
            margin: 10% auto;
            padding: 30px;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(0, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            text-align: center;
            color: #fff;
            transition: 0.3s ease;
        }

        .login-container h2 {
            font-size: 2.5em;
            font-weight: bold;
            color: #0ff;
            text-shadow: 0 0 15px rgba(0, 255, 255, 0.7);
            margin-bottom: 30px;
        }

        /* Alert Box */
        .alert {
            background-color: rgba(255, 0, 0, 0.8);
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 0.9em;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            font-weight: bold;
            font-size: 1em;
            color: #0ff;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid rgba(0, 255, 255, 0.5);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1.1em;
            outline: none;
            transition: 0.3s ease;
        }

        .form-group input:focus {
            border-color: #ff00ff;
            box-shadow: 0 0 10px #ff00ff;
        }

        /* Button Styling */
        button[type="submit"] {
            width: 100%;
            padding: 15px;
            font-size: 1.1em;
            color: #fff;
            background: linear-gradient(45deg, #0ff, #ff00ff);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.8);
        }

        button[type="submit"]:hover {
            background: linear-gradient(45deg, #ff00ff, #0ff);
            transform: scale(1.05);
        }

        /* Switch Between Forms */
        .switch-form {
            font-size: 1em;
            margin-top: 20px;
            color: #0ff;
            cursor: pointer;
            text-decoration: underline;
            transition: 0.3s ease;
        }

        .switch-form:hover {
            color: #ff00ff;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .login-container {
                max-width: 90%;
                margin: 10% auto;
            }

            .login-container h2 {
                font-size: 2em;
            }

            .form-group input, button[type="submit"] {
                font-size: 1em;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <!-- Background Video -->
    <video id="bg-video" autoplay muted loop>
        <source src="<?= base_url('assets/videos/vape_background.mp4') ?>" type="video/mp4">
    </video>

    <!-- Login Form Container -->
    <div class="login-container" id="login-form">
        <h2>Vape Shop Login</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= site_url('auth/loginProcess') ?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p class="switch-form" onclick="switchForm('register')">Don't have an account? Register here.</p>
    </div>

    <!-- Registration Form Container -->
    <div class="login-container" id="register-form" style="display: none;">
        <h2>Register</h2>
        <?php if (session()->getFlashdata('register_error')): ?>
            <div class="alert">
                <?= session()->getFlashdata('register_error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= site_url('auth/registerProcess') ?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <p class="switch-form" onclick="switchForm('login')">Already have an account? Login here.</p>
    </div>

    <!-- JavaScript to Switch Forms -->
    <script>
        function switchForm(formType) {
            if (formType === 'register') {
                document.getElementById('login-form').style.display = 'none';
                document.getElementById('register-form').style.display = 'block';
            } else {
                document.getElementById('login-form').style.display = 'block';
                document.getElementById('register-form').style.display = 'none';
            }
        }
    </script>
</body>
</html>
