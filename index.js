$(document).ready(function() {
    $("#register-form").hide();
    
    $("#show-register").click(function() {
        $("#login-form").hide();
        $("#register-form").show();
    });
    
    $("#show-login").click(function() {
        $("#register-form").hide();
        $("#login-form").show();
    });
    
    $("#login").submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        console.log("Login form submitted:", formData);
        $.ajax({
            type: "POST",
            url: "login.php",
            data: formData,
            success: function(response) {
                console.log(response);
                var responseData = JSON.parse(response);
                if (responseData.status === "success") {
                    console.log(response);
                    console.log("Login successful!");
                    window.location.href = "profile.php";
                }
                else {
        console.log("Login failed:", responseData.message);
    }
            },
            error: function(xhr, status, error) {
        console.log("Error:", error);
    }
        });

    });
    
    $("#register").submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        console.log("Register form submitted:", formData);
        $.ajax({
            type: "POST",
            url: "register.php",
            data: formData,
            success: function(response) {
                var responseData = JSON.parse(response);
                if (responseData.status === "success") {
                    console.log(response);
                    console.log("Login successful!");
                    window.location.href = "index.php";
                }
                else {
        console.log("Login failed:", responseData.message);
    }
            },
            error: function(xhr, status, error) {
        console.log("Error:", error); 
    }
        });
    });
    
    
});
$(document).ready(function() {
    // Handle the "Profile" button click event
    $('#openProfileModal').click(function() {
        $('#profileModal').modal('show'); // Open the profile modal
    });

    // Other JavaScript code here
});