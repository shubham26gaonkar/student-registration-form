$(document).ready(function (){

    displayData();
    //modal
    $('#open-modal-btn').on('click', function () {
        $('#modal').css('display', 'block');
        $('#modal-overlay').css('display', 'block');
    });

    $('#modal-close').on('click', function () {
        $('#modal').css('display', 'none');
        $('#modal-overlay').css('display', 'none');
        $("form").trigger("reset");
    });

    //delete button 
    // Delete Button Click Event
    $(document).on('click', '.delete', function() {
        var idToDelete = $(this).data('id');
        //console.log(idToDelete);
        // AJAX Request for Delete
        $.ajax({
            url: 'delete.php',
            type: 'post',
            data: { id: idToDelete },
            success: function(data, status) {
                // Reload the table after deletion
                displayData();
                alert(data); // Display the message (Record deleted successfully or an error message)
            }
        });
    });


    //Update

    // Edit Modal Close
    $(document).on('click', '#update-modal-close', function() {
        $('#update-modal').css('display', 'none');
        $('#modal-overlay').css('display', 'none');
        displayData();
    });


    $(document).on('click', '.edit', function() {

        // $('#update-modal-close').on('click', function () {
        //     $('#update-modal').css('display', 'none');
        //     $('#modal-overlay').css('display', 'none');
        // });
        
        var idToUpdate = $(this).data('id');
        console.log(idToUpdate);
        // AJAX Request for Delete
        $.ajax({
            url: 'edit.php',
            type: 'post',
            data: { 
                //'update-data': true,
                'id': idToUpdate ,
            },
            success: function(data, status) {
                // Reload the table after deletion
                $('#update-modal').css('display', 'block');
                $('#modal-overlay').css('display', 'block');
                $('#update-modal').html(data);
                //$('#update-modal-overlay').css('display', 'block');
                //displayData();
            }
        });
    });
});