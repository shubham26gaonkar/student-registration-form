<?php
include 'connect.php';

if (isset($_POST['id'])) {
    $idToEdit = $_POST['id'];

    // Fetch the data for the specified ID
    $sql = "SELECT * FROM student WHERE id = $idToEdit";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['emailId'];
        $contact = $row['contactNo'];
        $gender = $row['gender'];
        $course = $row['course'];
        $subjects = explode(',', $row['subject']); // Convert comma-separated string to an array
        $imagePath = $row['image']; // Assuming 'image' is the column name for the image path


        // Return the HTML content for the update modal
        echo "
            <input type='hidden' id='update-id' value='$id'>
            <div class='modal-header'>
                <span class='modal-close' id='update-modal-close'>&times;</span>
                <h2>Update Student Data</h2>
            </div>
            <form  id='update-modal-form'>
                <div class='image-cell'>
                    <img src='$imagePath' alt='Student Image' style='width: 100px; height: 100px;'>
                    <input type='file' name='update-image' id='update-image'>
                </div>
                
                <div class='form-group'>
                    <label for='update-name'><b>Name:</b></label>
                    <div class='text-box'>
                        <input type='text' id='update-name' name='update-name' value='$name' required>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='update-email'><b>Email:</b></label>
                    <div class='text-box'>
                        <input type='email' id='update-email' name='update-email' value='$email' required>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='update-contact'><b>Contact No:</b></label>
                    <div class='text-box'>
                        <input type='number' id='update-contact' name='update-contact' value='$contact'  required>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='update-gender'><b>Gender</b></label>
                    <div class='radio-button'>
                        <div class='radio-btn'>
                            <input type='radio'  name='gender' value='Male'". ($gender === 'Male' ? 'checked' : '') . " />Male
                        </div>
                        <div class='radio-btn'>
                            <input type='radio'  name='gender' value='Female'". ($gender === 'Female' ? 'checked' : '') . " />Female
                        </div>
                        <div class='radio-btn'>
                            <input type='radio'  name='gender' value='Other'". ($gender === 'Other' ? 'checked' : '') . " />Other
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='update-course'><b>Course:</b></label>
                    <select id='update-course' name='update-course' required>
                        <option value='B.Sc' " . ($course === 'B.Sc' ? 'selected' : '') . ">B.Sc</option>
                        <option value='B.A' " . ($course === 'B.A' ? 'selected' : '') . ">B.A</option>
                        <option value='B.Com' " . ($course === 'B.Com' ? 'selected' : '') . ">B.Com</option>
                        <option value='BCA' " . ($course === 'BCA' ? 'selected' : '') . ">BCA</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label for='update-subjects'><b>Subjects:</b></label>
                    <div class='check-cont-1'>
                        <div class='check-cont-2'>
                            <div class='check-cont-3'>";
                            $availableSubjects = ["Physics", "Chemistry", "Mathematics"];
                            foreach ($availableSubjects as $subject) {
                                $checked = in_array($subject, $subjects) ? 'checked' : '';
                                echo "<div class='checkbox-btn'><input type='checkbox' name='update-sub[]' value='$subject' $checked />$subject</div>";
                            }
                            echo "
                            </div>
                        </div>
                        <div class='check-cont-2'>
                            <div class='check-cont-3'>";
                            $availableSubjects = ["Accounts","OOP","History"]; // Replace with your actual subjects
                            foreach ($availableSubjects as $subject) {
                                $checked = in_array($subject, $subjects) ? 'checked' : '';
                                echo "<div class='checkbox-btn'><input type='checkbox' name='update-sub[]' value='$subject' $checked />$subject</div>";
                            }
                            echo "
                            </div>
                        </div>
                        <div class='check-cont-2'>
                            <div class='check-cont-3'>";
                            $availableSubjects= ["Economics","DBMS","Finance"]; // Replace with your actual subjects
                            foreach ($availableSubjects as $subject) {
                                $checked = in_array($subject, $subjects) ? 'checked' : '';
                                echo "<div class='checkbox-btn'><input type='checkbox' name='update-sub[]' value='$subject' $checked />$subject</div>";
                            }
                            echo "
                            </div>
                        </div>
                    </div>
                </div>
                <div id='update-btn'>
                    <button type='button' id='update-data' onclick='updateStudent()'>Save Changes</button>
                </div>
            </form>";
    } else {
        echo "Error fetching data: " . mysqli_error($con);
    }
}
?>
