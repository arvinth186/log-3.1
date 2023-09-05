document.getElementById("addDetailsButtonNavbar").addEventListener("click", function () {
    $('#addDetailsModal').modal('show');
});

document.getElementById("logoutButton").addEventListener("click", function () {
    document.querySelector(".container").classList.add("transition-hidden");
    setTimeout(function () {
        window.location.href = "logout.php";
    }, 500);
});

$(document).ready(function () {
    $("#updateDetailsForm").submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        console.log("update form submitted:", formData);
        $.ajax({
            type: "POST",
            url: "update_details.php",
            data: formData,
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});

$(document).ready(function () {
    $('#updateDetailsForm').submit(function (e) {
        e.preventDefault();
    });
});

$(document).ready(function () {
    $("#updateDetailsForm").submit(function (event) {
        event.preventDefault();
        var newPassword = $("#newPassword").val();
        var confirmPassword = $("#confirmPassword").val();

        // Check if new password and confirm password match
        if (newPassword != confirmPassword) {
            $("#passwordMismatchPopup").modal("show");
        } else {
            // If passwords match, proceed with the AJAX submission to update details
            $.ajax({
                type: "POST",
                url: "update_profile.php", // Change this to the correct URL
                data: $(this).serialize(),
                success: function (response) {
                    var responseData = JSON.parse(response);
                    if (responseData.status === "success") {
                        // Handle success
                    } else {
                        // Handle error
                    }
                },
                error: function (xhr, status, error) {
                    // Handle AJAX error
                }
            });
        }
    });
});

$(document).ready(function () {
    // Handle the "Details" button click event
    $('#openDetailsModal').click(function () {
        $('#detailsModal').modal('show'); // Open the details modal
    });
    
    // Other JavaScript code here
});
