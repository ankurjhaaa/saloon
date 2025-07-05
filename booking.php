<?php include_once('config/db.php') ?>
<?php

if (!isset($_SESSION['email'])) {
    header("Location: index.php#login");
    exit;
}
?>


<?php
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    // Convert GET date from d-m-Y to Y-m-d for comparison
    $inputDate = DateTime::createFromFormat('d-m-Y', $_GET['date'])->format('Y-m-d');

    // Define today, tomorrow, day after tomorrow
    $today = date('Y-m-d');
    $tomorrow = date('Y-m-d', strtotime('+1 day'));
    $dayAfter = date('Y-m-d', strtotime('+2 day'));

    // Match
    if ($inputDate === $today) {
        $selectdate = "Today";
    } elseif ($inputDate === $tomorrow) {
        $selectdate = "Tomorrow";
    } elseif ($inputDate === $dayAfter) {
        $selectdate = "Day After Tomorrow";

    } else {
        echo "<script>history.back();</script>";
    }
} else {
    echo "<script>history.back();</script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Glow & Shine - Salon</title>
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body class="bg-white">

    <?php include_once('includes/navbar.php') ?>

    <section class="bg-white mt-3 py-16 px-4 md:px-20">
        <div class="max-w-4xl mx-auto bg-pink-50 rounded-xl shadow-lg p-8 md:p-12">
            <h2 class="text-3xl font-bold text-center text-pink-600 mb-8">Book Your Appointment</h2>

            <form method="POST" action="" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <input type="hidden" name="userid" value="<?= $USERDETAIL['id'] ?>">


                <?php
                date_default_timezone_set('Asia/Kolkata');
                $today_value = date('d-m-Y');
                $tomorrow_value = date('d-m-Y', strtotime('+1 day'));
                $day_after_value = date('d-m-Y', strtotime('+2 day'));

                $today_label = date('d-m-Y');
                $tomorrow_label = date('d-m-Y', strtotime('+1 day'));
                $day_after_label = date('d-m-Y', strtotime('+2 day'));
                ?>

                <!-- Preferred Date Dropdown -->
                <div class="col-span-1">
                    <label class="block text-sm font-medium mb-1 text-gray-700">Preferred Date</label>
                    <select id="dateSelector" name="appointdate"
                        class="w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-700 focus:ring-2 focus:ring-pink-400 shadow-sm">
                        <option value="<?= $date ?>"><?= $selectdate . " (" . $date . ")" ?> </option>
                        <option value="<?= $today_value ?>">Today (<?= $today_label ?>)</option>
                        <option value="<?= $tomorrow_value ?>">Tomorrow (<?= $tomorrow_label ?>)</option>
                        <option value="<?= $day_after_value ?>">Day After Tomorrow (<?= $day_after_label ?>)</option>
                    </select>
                </div>

                <!-- JavaScript Redirect -->
                <script>
                    document.getElementById('dateSelector').addEventListener('change', function () {
                        const selectedDate = this.value;
                        if (selectedDate) {
                            window.location.href = '?date=' + selectedDate;
                        }
                    });
                </script>


                <!-- Time Slot -->
                <div class="col-span-1">
                    <label class="block text-sm font-medium mb-1 text-gray-700">Time Slot</label>
                    <button type="button" onclick="document.getElementById('timeModal').classList.remove('hidden')"
                        class="w-full p-3 border border-gray-300 rounded-lg text-left">
                        <span id="selectedTime">Select Time Slot</span>
                    </button>
                    <input type="hidden" name="appointslot" id="selectedTimeInput" required>
                </div>


                <!-- Service -->
                <div class="col-span-1">
                    <label class="block text-sm font-medium mb-1 text-gray-700">Select Service</label>
                    <button type="button" onclick="document.getElementById('serviceModal').classList.remove('hidden')"
                        class="w-full p-3 border border-gray-300 rounded-lg text-left">
                        <span id="selectedService">Choose Service</span>
                    </button>
                    <input type="hidden" name="appointservice" id="selectedServiceInput" required>
                </div>


                <!-- Notes (Full width) -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-sm font-medium mb-1 text-gray-700">Special Notes (optional)</label>
                    <textarea name="notes" rows="3"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-400"
                        placeholder="Mention any preference or allergy..."></textarea>
                </div>

                <!-- Submit -->
                <div class="col-span-1 md:col-span-2 text-center mt-4">
                    <button type="submit" name="submit"
                        class="bg-pink-600 hover:bg-pink-700 text-white font-semibold py-3 px-8 rounded-full transition shadow-md">
                        Confirm Booking
                    </button>
                </div>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                // 1. Sanitize & Validate Input
                $userid = trim($_POST['userid']);
                $appointdate = trim($_POST['appointdate']);
                $appointslot = trim($_POST['appointslot']);
                $appointservice = trim($_POST['appointservice']);
                $notes = trim($_POST['notes']);

                if (empty($userid) || empty($appointdate) || empty($appointslot) || empty($appointservice)) {
                    echo "<script>alert('All fields except notes are required.'); history.back();</script>";
                    exit;
                }

                // 2. Prevent Duplicate Booking (same user + date + slot)
                $check = $connect->prepare("SELECT id FROM appointments WHERE userid=? AND appointdate=? AND appointslot=? AND status != 'cancelled'");
                $check->bind_param("sss", $userid, $appointdate, $appointslot);
                $check->execute();
                $check->store_result();

                if ($check->num_rows > 0) {
                    echo "<script>alert('You already have an appointment at this time.'); history.back();</script>";
                    exit;
                }

                // 3. Insert New Appointment
                $stmt = $connect->prepare("INSERT INTO appointments (userid, appointdate, appointslot, appointservice, notes) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $userid, $appointdate, $appointslot, $appointservice, $notes);

                if ($stmt->execute()) {
                    echo "<script>window.location.href='bookingpayment.php?appoint_id=$connect->insert_id';</script>";
                } else {
                    echo "<script>alert('Failed to book appointment. Please try again.'); history.back();</script>";
                }
            }
            ?>

        </div>
    </section>


    <!-- Service Modal -->
    <div id="serviceModal" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl w-[90%] max-w-md p-6 shadow-lg">
            <h3 class="text-xl font-semibold mb-4 text-pink-600">Choose a Service</h3>

            <div class="grid grid-cols-2 gap-4 max-h-[60vh] overflow-y-auto">
                <?php $allservicequery = $connect->query("SELECT * FROM services ");
                while ($allservice = $allservicequery->fetch_array()) { ?>
                    <button onclick="selectService('<?= $allservice['name'] ?>')"
                        class="flex flex-col items-center p-3 border rounded-lg hover:bg-pink-50">
                        <img src="images/<?= $allservice['image'] ?>" class="w-14 h-14 mb-1" />
                        <span><?= $allservice['name'] ?></span>
                    </button>
                <?php } ?>


            </div>

            <div class="mt-6 text-right">
                <button onclick="document.getElementById('serviceModal').classList.add('hidden')"
                    class="text-sm text-gray-500 hover:text-pink-500">Close</button>
            </div>
        </div>
    </div>
    <script>
        function selectService(service) {
            document.getElementById('selectedService').innerText = service;
            document.getElementById('selectedServiceInput').value = service;
            document.getElementById('serviceModal').classList.add('hidden');
        }
    </script>




    <!-- Time Modal -->
    <div id="timeModal" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl w-[90%] max-w-md p-6 shadow-lg">
            <h3 class="text-xl font-semibold mb-4 text-pink-600">Choose Time Slot</h3>
            <?php
            // PHP Part — Fetch Booked Slots for Selected Date
            date_default_timezone_set('Asia/Kolkata');
            $selectedDate = $_GET['date'] ?? date('Y-m-d');

            // Get already booked slots for this date
            $bookedSlots = [];
            $query = $connect->prepare("SELECT appointslot FROM appointments WHERE appointdate = ? AND status != 'cancelled'");
            $query->bind_param("s", $selectedDate);
            $query->execute();
            $result = $query->get_result();

            while ($row = $result->fetch_assoc()) {
                $bookedSlots[] = $row['appointslot'];
            }

            // Slot arrays
            $morningSlots = ['08:00 AM', '08:45 AM', '09:30 AM', '10:15 AM', '11:00 AM'];
            $afternoonSlots = ['12:00 PM', '12:45 PM', '01:30 PM', '02:15 PM', '03:00 PM'];
            $eveningSlots = ['04:00 PM', '04:45 PM', '05:30 PM', '06:15 PM', '07:00 PM'];
            ?>

            <div class="space-y-6 max-h-[60vh] overflow-y-auto">
                <!-- Morning -->
                <div>
                    <p class="font-medium mb-2 text-gray-700">Morning</p>
                    <div class="grid grid-cols-3 gap-3">
                        <?php foreach ($morningSlots as $slot) {
                            $isBooked = in_array($slot, $bookedSlots);
                            ?>
                            <button type="button" onclick="selectTime('<?= $slot ?>')"
                                class="border rounded-lg py-2 px-2 text-sm transition <?= $isBooked ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'hover:bg-pink-100 text-gray-700' ?>"
                                <?= $isBooked ? 'disabled' : '' ?>>
                                <?= $slot ?>
                            </button>
                        <?php } ?>
                    </div>
                </div>

                <!-- Afternoon -->
                <div>
                    <p class="font-medium mb-2 text-gray-700">Afternoon</p>
                    <div class="grid grid-cols-3 gap-3">
                        <?php foreach ($afternoonSlots as $slot) {
                            $isBooked = in_array($slot, $bookedSlots);
                            ?>
                            <button type="button" onclick="selectTime('<?= $slot ?>')"
                                class="border rounded-lg py-2 px-2 text-sm transition <?= $isBooked ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'hover:bg-pink-100 text-gray-700' ?>"
                                <?= $isBooked ? 'disabled' : '' ?>>
                                <?= $slot ?>
                            </button>
                        <?php } ?>
                    </div>
                </div>

                <!-- Evening -->
                <div>
                    <p class="font-medium mb-2 text-gray-700">Evening</p>
                    <div class="grid grid-cols-3 gap-3">
                        <?php foreach ($eveningSlots as $slot) {
                            $isBooked = in_array($slot, $bookedSlots);
                            ?>
                            <button type="button" onclick="selectTime('<?= $slot ?>')"
                                class="border rounded-lg py-2 px-2 text-sm transition <?= $isBooked ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'hover:bg-pink-100 text-gray-700' ?>"
                                <?= $isBooked ? 'disabled' : '' ?>>
                                <?= $slot ?>
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Hidden Input to Store Selected Slot -->


            <div class="mt-6 text-right">
                <button onclick="document.getElementById('timeModal').classList.add('hidden')"
                    class="text-sm text-gray-500 hover:text-pink-500">Close</button>
            </div>
        </div>
    </div>
    <script>
        function selectTime(time) {
            document.getElementById('selectedTime').innerText = time;
            document.getElementById('selectedTimeInput').value = time;
            document.getElementById('timeModal').classList.add('hidden');
        }
    </script>

</body>

</html>