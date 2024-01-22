function displayData(){
    var displayData = "true";
    $.ajax({
        url: 'display.php',
        type: "POST",
        data:{
            display: displayData,
        },
        success: function(data, status) {
            console.log(status);                
            $('#display-data').html(data);
        }
    });
}