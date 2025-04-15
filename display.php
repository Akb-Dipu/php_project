<?php
include 'connect.php';

// Fetch data from the users table
$sql = "SELECT * FROM `table`";
$result = mysqli_query($conn, $sql);

// Check if the notice update is being submitted
if (isset($_POST['update_notice'])) {
    $newNotice = $_POST['new_notice'];

    // Update the notice in the database (you can modify the SQL as needed)
    $updateNoticeQuery = "UPDATE `notices` SET `notice` = '$newNotice' WHERE id = 1"; // Assume you have a notices table
    if (mysqli_query($conn, $updateNoticeQuery)) {
        echo "<script>alert('Notice updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating the notice.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="table.css">
    <script>
        // Function to update the notice dynamically using LocalStorage
        function updateNotice() {
            const newNotice = document.getElementById('new-notice').value;
            if (newNotice.trim() !== '') {
                // Save notice in LocalStorage
                localStorage.setItem('gymNotice', newNotice);
                // Update the notice in the database using a form submit
                document.getElementById('notice-form').submit(); // Submit the form to update the notice in DB
                alert('Notice updated successfully!');
                document.getElementById('new-notice').value = ''; // Clear input field
            } else {
                alert('Please enter a valid notice.');
            }
        }
    </script>
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>

    <h2>Registered Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Package</th>
            <th>Fee</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['gmail']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['package']; ?></td>
            <td><?php echo $row['fee']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Update Notice</h2>
    <form id="notice-form" method="POST">
        <textarea id="new-notice" name="new_notice" rows="4" cols="50" placeholder="Enter the new notice here" style="margin-left: 30px; padding-left: 30px;"></textarea><br>
        <button type="button" onclick="updateNotice()" style="margin-left: 30px;">Update Notice</button>
    </form>

    <br><br>
    <!-- Home Button -->
    <button onclick="window.location.href='index.html';" style="margin-left: 30px;">Home</button>

    <footer>
        <h1>Contact Us</h1>
        <p>Phone: 01666690912</p>
        <p>Location: Khagan Bazar, Ashulia, SAVAR, Dhaka-1320</p>
    </footer>
</body>
</html>
