<?php
    include 'connect.php';

    if(isset($_POST['display'])){
        $sql = "SELECT * FROM student WHERE active = 0";
        $result = mysqli_query($con, $sql);
        
        $data = mysqli_num_rows($result);
        $output='';
        if($data>0){
            $output = 
                '<table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th>Subjects</th>
                        <th>Actions</th>
                    </tr>
                </thead>';

            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['emailId'];
                $contact = $row['contactNo'];
                $gender = $row['gender'];
                $course = $row['course'];
                $subject = $row['subject'];
                $imagePath = $row['image']; // Assuming 'image' is the column name for the image path

                $output .=
                "<tr>
                    <td class='image-cell'><img src='$imagePath' alt='Image Not Available' style='width: 100px; height: 100px;'></td>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$contact</td>
                    <td>$gender</td>
                    <td>$course</td>
                    <td>$subject</td>
                    <td>
                        <div class='action'>
                            <button class='edit' data-id='$id'><i class='material-icons' id='edit-icon'>edit</i></button>
                            <button class='delete' data-id='$id'><i class='material-icons' id='delete-icon'>delete</i></button>
                        </div>
                    </td>
                </tr>";
            }
            $output .="</table>";
        
            echo $output;
        }
        else{
            echo "<h2> No Record Found.</h2>";
        }
    }
?>
