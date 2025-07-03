<?php include_once('config/db.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Signup | Glow & Shine</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include_once('includes/navbar.php') ?>
    <div class="min-h-screen bg-gradient-to-br from-pink-100 to-pink-300 flex items-center justify-center px-4">

        <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
            <h2 class="text-3xl font-bold text-pink-600 text-center mb-6">Create Account 💅</h2>

            <form action="" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Full Name</label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Phone</label>
                    <input type="number" name="phone" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400" />
                </div>



                <button name="signup" type="submit"
                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 rounded-lg transition">
                    Sign Up
                </button>
            </form>
            <?php
            
            if (isset($_POST['signup'])) {
                // Collect & sanitize input
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $phone = trim($_POST['phone']);
                $password = trim($_POST['password']);

                // Validate fields
                if (empty($name) || empty($email) || empty($phone) || empty($password)) {
                    echo "<script>alert('All fields are required.'); window.history.back();</script>";
                    exit;
                }

                // Validate email format
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<script>alert('Invalid email format'); window.history.back();</script>";
                    exit;
                }

                // Check if email already exists
                $checkEmail = $connect->prepare("SELECT id FROM users WHERE email = ?");
                $checkEmail->bind_param("s", $email);
                $checkEmail->execute();
                $result = $checkEmail->get_result();

                if ($result->num_rows > 0) {
                    echo "<script>alert('Email already registered. Please login or use another email.'); window.history.back();</script>";
                    exit;
                }

                // Hash the password (better to use password_hash)
                $hashedPassword = sha1($password); // You can replace with password_hash() for stronger security
            
                // Insert user into database
                $stmt = $connect->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $name, $email, $phone, $hashedPassword);

                if ($stmt->execute()) {
                    $_SESSION['email'] = $email;
                    echo "<script>window.location.href = 'index.php';</script>";
                } else {
                    echo "<script>alert('Signup failed. Please try again later.');</script>";
                }
            }
            ?>


            <p class="text-center text-sm text-gray-600 mt-6">
                Already have an account?
                <a href="index.php/#login" class="text-pink-500 hover:underline font-medium">Login</a>
            </p>
        </div>

    </div>

</body>

</html>