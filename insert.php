<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Your existing database connection code here...

    $name = $_POST['nameadd'];
    $email = $_POST['emailadd'];
    $contact = $_POST['contactadd'];
    $gender = $_POST['genderadd'];
    $course = $_POST['courseadd'];
    $subjects = $_POST['subjectsadd'];
    
    // File upload
    $imagePath = '';
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = 'img/';  // Change this to your desired folder
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $imagePath = $uploadFile;
        } else {
            echo 'Error uploading image.';
            exit();
        }
    }

    // Convert subjectsadd from comma-separated string to an array
    $subjectsArray = explode(' , ', $subjects);

    // Escape and sanitize each element in the array
    $escapedSubjects = array_map(function ($subject) use ($con) {
        return mysqli_real_escape_string($con, $subject);
    }, $subjectsArray);

    // Implode the sanitized subjects back to a comma-separated string
    $sanitizedSubjects = implode(' , ', $escapedSubjects);

    // Insert into the database
    $sql = "INSERT INTO student (name, emailId, contactNo, gender, course, subject, image) VALUES ('$name', '$email','$contact','$gender', '$course', '$sanitizedSubjects','$imagePath')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }

  
}
else {
    echo "Please fill in all details!";
}
?>
