<?php if (!isset($_SESSION['email'])) { ?>

    <!-- Stylish Login Section -->
    <section id="login" class="relative py-20 bg-gradient-to-br from-pink-50 via-white to-pink-300 px-4">
        <div class="max-w-md mx-auto bg-white/80 backdrop-blur-lg border border-white shadow-2xl rounded-2xl p-8">

            <h2 class="text-3xl font-bold text-center text-pink-600 mb-6">Welcome Back 💖</h2>

            <form action="" method="POST" class="space-y-6">
                <!-- Email -->
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Email address</label>
                    <div
                        class="flex items-center border rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-pink-400">
                        <span class="bg-pink-100 px-3 text-pink-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M16 12l-4 4-4-4m8-4l-4 4-4-4" />
                            </svg>
                        </span>
                        <input type="email" name="email" required
                            class="w-full px-4 py-2 focus:outline-none bg-white placeholder-gray-400"
                            placeholder="you@example.com">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Password</label>
                    <div
                        class="flex items-center border rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-pink-400">
                        <span class="bg-pink-100 px-3 text-pink-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M12 11c0-.6-.4-1-1-1s-1 .4-1 1v2c0 .6.4 1 1 1s1-.4 1-1v-2zm-7 6h14v2H5v-2zm7-14a6 6 0 100 12 6 6 0 000-12z" />
                            </svg>
                        </span>
                        <input type="password" name="password" required
                            class="w-full px-4 py-2 focus:outline-none bg-white placeholder-gray-400"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Button -->
                <button name="login" type="submit"
                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 rounded-lg transition">
                    Login
                </button>

            </form>
            <?php
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = sha1($_POST['password']);

                $stmt = $connect->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
                $stmt->bind_param("ss", $email, $password);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $_SESSION['email'] = $email;
                    echo "<script>window.location.href = 'index.php';</script>";
                } else {
                    echo "<script>alert('Invalid Email Or Pssword , Try Again');</script>";
                }



            }
            ?>

            <!-- Bottom text -->
            <p class="text-center text-sm text-gray-600 mt-6">
                New here?
                <a href="signup.php" class="text-pink-500 hover:underline font-semibold">Create an account</a>
            </p>
        </div>
    </section>


<?php } ?>