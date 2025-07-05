<?php include_once('../config/db.php') ?>
<?php include_once('includes/adminaccess.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Glow & Shine - Salon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">




</head>

<body class="bg-white">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen bg-gray-100 flex flex-col">
        <?php include_once('includes/navbar.php') ?>
        <div class="flex flex-1">
            <?php include_once('includes/sidebar.php') ?>


            <main class="flex-1 p-6 md:ml-64 overflow-y-auto w-full min-h-screen bg-gray-50">
                <!-- Page Header -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Add Service  category</h1>
                    <p class="text-gray-600">Add and manage available salon services.</p>
                </div>

                <!-- Add New Service Form -->
                <div class="bg-white p-6 rounded-lg shadow mb-8 max-w-3xl">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Add New Service</h2>
                    <!-- Add Service Form -->
                    <form action="" method="POST" enctype="multipart/form-data"
                        class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm bg-white p-6 rounded-lg shadow mb-8 max-w-3xl">
                        <!-- Service Name -->
                        <div>
                            <label class="block mb-1 text-gray-600">Service Name</label>
                            <input type="text" name="name" placeholder="e.g. Haircut"
                                class="w-full border rounded-md px-3 py-2 border-gray-300" required>
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block mb-1 text-gray-600">Price (₹)</label>
                            <input type="number" name="price" placeholder="e.g. 100"
                                class="w-full border rounded-md px-3 py-2 border-gray-300" required>
                        </div>

                        <!-- Duration -->
                        <div>
                            <label class="block mb-1 text-gray-600">Duration (mins)</label>
                            <input type="number" name="duration" placeholder="e.g. 30"
                                class="w-full border rounded-md px-3 py-2 border-gray-300" required>
                        </div>

                        <!-- Image Upload -->
                        <div>
                            <label class="block mb-1 text-gray-600">Service Image</label>
                            <input type="file" name="image"
                                class="w-full text-sm border border-gray-300 rounded-md px-3 py-2 bg-white" required>
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2">
                            <label class="block mb-1 text-gray-600">Description</label>
                            <textarea name="description" rows="3" placeholder="Short description of the service..."
                                class="w-full border rounded-md px-3 py-2 border-gray-300" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="md:col-span-2 text-right">
                            <button type="submit" name="add"
                                class="bg-pink-600 text-white px-5 py-2 rounded-md hover:bg-pink-700">Add
                                Service</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['add'])) {
                        $name = $connect->real_escape_string($_POST['name']);
                        $price = $_POST['price'];
                        $duration = $_POST['duration'];
                        $description = $connect->real_escape_string($_POST['description']);

                        // Image upload
                        $image = $_FILES['image']['name'];
                        $tmp = $_FILES['image']['tmp_name'];
                        $upload_path = "../images/" . $image;

                        if (move_uploaded_file($tmp, $upload_path)) {
                            $query = "INSERT INTO services (name, price, duration, description, image) 
                  VALUES ('$name', '$price', '$duration', '$description', '$image')";

                            if ($connect->query($query)) {
                                echo "<script>alert('Service Added');</script>";
                            } else {
                                echo "Error: " . $connect->error;
                            }
                        } else {
                            echo "Image upload failed.";
                        }
                    }
                    ?>

                </div>


                <?php
                // DELETE
                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    $connect->query("DELETE FROM services WHERE id = $id");
                    echo "<script>window.location.href='services.php';</script>";
                }

                // UPDATE
                if (isset($_POST['update'])) {
                    $id = $_POST['service_id'];
                    $name = $connect->real_escape_string($_POST['name']);
                    $price = $_POST['price'];
                    $duration = $_POST['duration'];
                    $description = $connect->real_escape_string($_POST['description']);

                    if (!empty($_FILES['image']['name'])) {
                        $image = $_FILES['image']['name'];
                        $tmp = $_FILES['image']['tmp_name'];
                        move_uploaded_file($tmp, "../images/" . $image);
                        $connect->query("UPDATE services SET name='$name', price='$price', duration='$duration', description='$description', image='$image' WHERE id=$id");
                    } else {
                        $connect->query("UPDATE services SET name='$name', price='$price', duration='$duration', description='$description' WHERE id=$id");
                    }

                    echo "<script>window.location.href='services.php';</script>";
                }
                ?>




                <?php
                $getservices = $connect->query("SELECT * FROM services");
                ?>

                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Service</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Duration</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php while ($service = $getservices->fetch_assoc()): ?>
                            <tr>
                                <td class="px-4 py-3">
                                    <img src="../images/<?php echo $service['image']; ?>"
                                        class="w-14 h-14 object-cover rounded">
                                </td>
                                <td class="px-4 py-3"><?php echo $service['name']; ?></td>
                                <td class="px-4 py-3">₹<?php echo $service['price']; ?></td>
                                <td class="px-4 py-3"><?php echo $service['duration']; ?> mins</td>
                                <td class="px-4 py-3"><?php echo $service['description']; ?></td>
                                <td class="px-4 py-3 text-center space-x-2">
                                    <button onclick="openEditModal(
                                         '<?php echo $service['id']; ?>',
                                         '<?php echo htmlspecialchars($service['name']); ?>',
                                         '<?php echo $service['price']; ?>',
                                         '<?php echo $service['duration']; ?>',
                                         `<?php echo htmlspecialchars($service['description']); ?>`
                                       )"
                                        class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded hover:bg-yellow-300 text-xs">Edit</button>

                                    <a href="?delete=<?php echo $service['id']; ?>"
                                        onclick="return confirm('Delete this service?')"
                                        class="bg-red-200 text-red-800 px-3 py-1 rounded hover:bg-red-300 text-xs">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>


            </main>





        </div>
    </div>



    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
            <button onclick="document.getElementById('editModal').classList.add('hidden')"
                class="absolute top-2 right-3 text-gray-500 hover:text-red-500 text-xl">&times;</button>
            <h3 class="text-lg font-semibold mb-4">Edit Service</h3>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="service_id" id="edit_id">
                <div class="mb-2">
                    <label class="block text-sm">Name</label>
                    <input type="text" name="name" id="edit_name" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-2">
                    <label class="block text-sm">Price</label>
                    <input type="number" name="price" id="edit_price" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-2">
                    <label class="block text-sm">Duration</label>
                    <input type="number" name="duration" id="edit_duration" class="w-full border px-3 py-2 rounded"
                        required>
                </div>
                <div class="mb-2">
                    <label class="block text-sm">Description</label>
                    <textarea name="description" id="edit_description" class="w-full border px-3 py-2 rounded"
                        required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-sm">New Image (optional)</label>
                    <input type="file" name="image" class="w-full border px-3 py-2 rounded">
                </div>
                <div class="text-right">
                    <button type="submit" name="update"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function openEditModal(id, name, price, duration, description) {
            document.getElementById("edit_id").value = id;
            document.getElementById("edit_name").value = name;
            document.getElementById("edit_price").value = price;
            document.getElementById("edit_duration").value = duration;
            document.getElementById("edit_description").value = description;
            document.getElementById("editModal").classList.remove("hidden");
        }
    </script>


</body>

</html>