<?php
    include 'config.php';
    session_start();

    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    } else {
        // Redirect to login page or display an error message
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>

        .transition-hidden {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-dark">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">My Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <button id="addDetailsButtonNavbar" class="btn btn-secondary mt-1 btn-sm me-2">Add Details</button>
            </li>
            <li class="nav-item">
                <button id="openDetailsModal" class="btn btn-secondary mt-1 btn-sm me-2">Profile</button>
            </li>

            <li class="nav-item">
                <button id="logoutButton" class="btn btn-secondary mt-1 btn-sm">Logout</button>
            </li>

        </ul>
    </div>
</nav>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="welcome-box">
                <h2 class="text-light">Welcome, <?php echo $_SESSION["username"]; ?></h2>
                <!-- <button class="btn btn-primary mt-3" id="addDetailsButton" data-bs-toggle="modal" data-bs-target="#addDetailsModal">Add Details</button> -->
            </div>
        </div>
    </div>
</div>

<!-- model for form details -->

<<div class="modal fade" id="addDetailsModal" tabindex="-1" role="dialog" aria-labelledby="addDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDetailsModalLabel">Add Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" data-bs-toggle="model" aria-label="Close"> <!-- if the data-bs-toggle="model" is not added then close wont appear-->
                     <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateDetailsForm">
                    <div class="form-group">
                        <label for="dob">DOB</label>
                        <input type="date" class="form-control" id="dob" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phonenumber" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" autocomplete="off">
                    </div>
                                        <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                    </div>
                    <button type="submit" class="btn btn-primary"data-bs-dismiss="modal" data-bs-toggle="modal">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">ProfilDetails</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                include 'config.php';

                // Query to fetch details from 'log' table for the logged-in user
                $logQuery = "SELECT username, name, email, dob, phone_number, age, address FROM logins WHERE username = ?";
                $stmt = $conn->prepare($logQuery);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $logResult = $stmt->get_result();

                // Display data from 'log' table
                if ($logResult->num_rows > 0) {
                    $logRow = $logResult->fetch_assoc();
                    echo "<p class='mb-3'><strong>Username:</strong> " . $logRow["username"] . "</p>";
                    echo "<p class='mb-3'><strong>Name:</strong> " . $logRow["name"] . "</p>";
                    echo "<p class='mb-3'><strong>Email:</strong> " . $logRow["email"] . "</p>";
                    echo "<p class='mb-3'><strong>DOB:</strong> " . $logRow["dob"] . "</p>";
                    echo "<p class='mb-3'><strong>Phone Number:</strong> " . $logRow["phone_number"] . "</p>";
                    echo "<p class='mb-3'><strong>Age:</strong> " . $logRow["age"] . "</p>";
                    echo "<p class='mb-3'><strong>Address:</strong> " . $logRow["address"] . "</p>";
                } else {
                    echo "<p>No data available.</p>";
                }
                $stmt->close();
                $conn->close();
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="passwordMismatchPopup" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Error</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-danger">New password and confirm password do not match.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="profile.js"></script>
</body>
</html>
