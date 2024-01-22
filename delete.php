<?php
    include 'connect.php';

    if(isset($_POST['id'])) {
        $idToDelete = $_POST['id'];

        // Perform the delete operation
        $sql = "UPDATE student SET active = 1 WHERE id = $idToDelete";
        $result = mysqli_query($con, $sql);

        // Check for success (you might want to add more error handling)
        if ($result) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    }
?>
