function addStudent()
    {
        var name = $("#name").val();
        var email = $("#email").val();
        var contact = $("#contact").val();
        var gender = $("input[name='gender']:checked").val();
        var course = $("#course").val();
        
        // Handle checkbox data
        var subjects = [];
        $('input[name^="sub"]:checked').each(function() {
            subjects.push($(this).val());
        });
        

        var image = $('#image')[0].files[0];

        if (!validateForm(name, email, contact, gender)) {
        // Validation failed, do not proceed
            return;
        }
        
        // Use FormData to handle file upload
        var formData = new FormData($('#modal-form')[0]);
        formData.append('nameadd', name);
        formData.append('emailadd', email);
        formData.append('contactadd', contact);
        formData.append('genderadd', gender);
        formData.append('courseadd', course);
        formData.append('subjectsadd', subjects.join(','));
        formData.append('image', image);
        // Handle form submission using Ajax or other logic
    
        $.ajax({
            url: "insert.php",
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success: function(data, status){
                if(status=="success"){
                    alert('Form submitted!');
                    $('#modal').css('display', 'none');
                    $('#modal-overlay').css('display','none');
                    displayData();
                    $("form").trigger("reset");
                    console.log(status);
                }
                //function to display data
            }
        })
        
        //hide modal
    }