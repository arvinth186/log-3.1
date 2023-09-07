    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login and Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </head>
    <body class="bg-dark">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-lg-4 col-md-6">
                    <div id="login-form" class="mb-4 p-4 bg-light rounded">
                        <h2 class="text-primary text-center mb-4">Login</h2>
                        <form id="login">
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block ">Login</button>
                        </form>
                        <p class="mt-3 text-center">Don't have an account? <a href="#" id="show-register" style="text-decoration: none;" class="text-primary">Register</a></p>
                    </div>
            
                    <div id="register-form" class="mb-4 p-4 bg-light rounded" style="display: none;">
                        <h2 class="text-success text-center mb-4">Register</h2>
                        <form id="register">
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Name" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password"id="regPassword">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"id="confirmPassword">
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Register</button>
                        </form>
                        <p class="mt-3 text-center">Already have an account? <a href="#" id="show-login" class="text-success" style="text-decoration: none;">Login</a></p>
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

    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
  


    </html>
