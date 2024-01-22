<?php
include 'connect.php';

if (isset($_POST['id'])) {
    $idToUpdate = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];

    // Handle checkbox data
    $subjects = $_POST['subjects'];


     // Check if a new image is uploaded
     if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Handle image upload
        $image = $_FILES['image'];
        $imagePath = "img/" . time() . "_" . $image['name']; // Customize the path as needed
        move_uploaded_file($image['tmp_name'], $imagePath);

        // Update the image path in the database
        $sql = "UPDATE student SET name = '$name', emailId = '$email', contactNo = '$contact', gender='$gender', course='$course', subject='$subjects', image='$imagePath' WHERE id = $idToUpdate";
    } else {
        // No new image, update other details
        $sql = "UPDATE student SET name = '$name', emailId = '$email', contactNo = '$contact', gender='$gender', course='$course', subject='$subjects' WHERE id = $idToUpdate";
    }
    
    //$sql = "UPDATE student SET name = '$name', emailId = '$email', contactNo = '$contact', gender='$gender', course='$course', subject='$subjects' ,image='$imagePath' WHERE id = $idToUpdate";

    $result = mysqli_query($con, $sql);

    // Check for success (you might want to add more error handling)
    if ($result) {
        echo "Changes saved successfully";
    } else {
        echo "Error saving changes: " . mysqli_error($con);
    }
}
?>
