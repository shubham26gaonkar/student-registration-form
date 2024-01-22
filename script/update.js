function updateStudent(){
    //console.log("hello");
    var id = $("#update-id").val();
    var name = $("#update-name").val();
    var email = $("#update-email").val();
    var contact = $("#update-contact").val();
    var gender = $("input[name='gender']:checked").val();
    var course = $("#update-course").val();

    // Handle checkbox data
    var subjects = [];
    $('input[name^="update-sub"]:checked').each(function() {
        subjects.push($(this).val());
    });

     // Get the selected image
    var imageData = new FormData($('#update-modal-form')[0]);
    var imageInput = $("#update-image")[0].files[0];
    imageData.append("image", imageInput);
    
    if (!validateForm(name, email, contact, gender)) {
    // Validation failed, do not proceed
        return;
    }

    // Add image data to the form data
    imageData.append("id", id);
    imageData.append("name", name);
    imageData.append("email", email);
    imageData.append("contact", contact);
    imageData.append("gender", gender);
    imageData.append("course", course);
    imageData.append("subjects", subjects.join(','));

    $.ajax({
        url: 'update.php',
        type: 'post',
        data: imageData,
        contentType: false,
        processData: false,
        success: function(data, status){
            console.log(status);
        }
    });
    alert('Changes saved!');
    $('#update-modal').css('display', 'none');
    $('#modal-overlay').css('display', 'none');
    displayData();
}