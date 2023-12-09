<?php
@include 'config.php';

if (isset($_POST['submit'])) {
    $tracking_number = mysqli_real_escape_string($conn, $_POST['tracking_number']);
    $stu_id = mysqli_real_escape_string($conn, $_POST['stu_id']);
    $locker_id = mysqli_real_escape_string($conn, $_POST['locker']);
    $dropoff_time = date("Y-m-d H:i:s"); // Current timestamp

    // Check if the student with the given stu_id exists
    $check_student_query = "SELECT * FROM student WHERE stu_id = '$stu_id'";
    $result = mysqli_query($conn, $check_student_query);

    if (mysqli_num_rows($result) > 0) {
        // The student exists, proceed with the insertion
        $insert = "INSERT INTO parcel (tracking_number, stu_id, locker_id,  dropoff_time) VALUES ('$tracking_number', '$stu_id', '$locker_id', '$dropoff_time')";

        if (mysqli_query($conn, $insert)) {
            // Additional logic or redirection if needed
            header('location: success.php'); // Redirect to success page or any other page after opening a parcel
        } else {
            // Handle the case where the query fails
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // The student does not exist, handle accordingly
        echo "Error: Student with ID $stu_id does not exist.";
    }
}
?>



<body>
    <!-- Parcel Form -->
    <div class="add-parcel-form">
        <h3>Open a Parcel Locker</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="tracking_number">Tracking Number</label>
                <input type="text" id="tracking_number" name="tracking_number" required>
            </div>
            <div class="form-group">
                <label for="stu_id">Student ID</label>
                <input type="text" id="stu_id" name="stu_id" required>
            </div>
            <div class="form-group">
                <label for="locker">Locker</label>
                <select id="locker" name="locker" required>
                    <option value="1">Locker 1</option>
                    <option value="2">Locker 2</option>
                    <option value="3">Locker 3</option>
                </select>
            </div>
            <!-- Displaying Student ID and Drop-off Time -->
            <p>Student ID: <span id="display_stu_id"></span></p>
            <p>Drop-off Time: <span id="display_dropoff_time"></span></p>
            <button type="submit" name="submit">Open</button>
        </form>
    </div>

    <!-- JS -->
    <script>
        $(document).ready(function() {
            // Update display when Student ID changes
            $("#stu_id").on("input", function() {
                $("#display_stu_id").text($(this).val());
            });

            // Update display with current Drop-off Time
            $("#display_dropoff_time").text(new Date().toLocaleString());

            // Your existing JS code
        });
    </script>
</body>

</html>