$(document).ready(function () {

    $('#swap-with-owner-btn').click(function (e) {
        e.preventDefault();

        // Provider's Item
        const item_id = $("#item_id").val();

        // Receivers' Item that wanted to be swapped
        const receiver_item_id = $("#receiver_item_id").val();

        // Receiver id
        const receiver_id = $("#receiver_id").val();

        // Provider id
        const provider_id = $("#provider_id").val();

        $.ajax({
            method: "POST",
            url: "functions/Swap/send_swap_request.php",
            dataType: "json",
            data: {
                receiver_item_id,
                item_id,
                provider_id,
                receiver_id
            },
            success: (data) => {
                if (data.code == "200")
                    alert("Send swap request: " + data.msg);
            },
            error: (err) => {
                console.log(err.msg)
                alert("Something went wrong. Please try again.");
            }
        })
    });

    

});

$('#accept-request-btn').click(function () {

    // Swap Request ID
    const swap_request_id = $(this).attr("data-requestID");
        
    $.ajax({
        method: "POST",
        url: "functions/Swap/accept_request.php",
        dataType: "json",
        data: {
            swap_request_id
        },
        success: (data) => {
            if (data.code == "200") {                
                alert("You have accepted the request.");
                window.location = "swap_request.php";
            }                
        },
        error: (err) => {
            console.log(err.msg)
            alert("Something went wrong to accept the request. Please try again.");
        }
    })
});

$('#reject-request-btn').click(function () {

    // Swap Request ID
    const swap_request_id = $(this).attr("data-requestID");
        
    $.ajax({
        method: "POST",
        url: "functions/Swap/reject_request.php",
        dataType: "json",
        data: {
            swap_request_id
        },
        success: (data) => {
            if (data.code == "200") {
                alert("You have rejected the request.");
                window.location = "swap_request.php";
            }                
        },
        error: (err) => {
            console.log(err.msg)
            alert("Something went wrong to accept the request. Please try again.");
        }
    })

});