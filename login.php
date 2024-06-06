<?php  
    session_start();
    error_reporting(E_ERROR | E_WARNING);

    if (isset($_SESSION['login'])) {
        header('Location: dashboard/index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="berita_lokal" />
        <meta name="author" content="berita_lokal" />
        <title>Berita Lokal - Login</title>
        <link href="dashboard/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        <style>
            body {
                background-image: url('picture/pexels-kaboompics-6335.jpg');
                background-size: cover;
            }

            .judul-header {
                background-color: black;
                color: white;
            }

            .form-login {
                margin-top: 80px;
                margin-bottom: 80px;
            }

            .btn-dark {
                background-color: black;
                border-color: black;
            }

            .btn-dark:hover {
                background-color: red;
                border-color: red;
            }

        </style>
    </head>
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card border-0 rounded form-login">
                                    <div class="card-header judul-header">
                                        <h4 class="text-center font-weight-light my-3">BERITA LOKAL</h4>
                                    </div>
                                    <div class="card-body">
                                        
                                        <?php  
                                            if (isset($_SESSION['status']) && isset($_SESSION['pesan'])) :
                                        ?>
                                            <div class="alert alert-<?= $_SESSION['status']; ?> small" role="alert" id="alert">
                                              <?= $_SESSION['pesan']; ?>
                                            </div>
                                        <?php 
                                            endif;
                                            unset($_SESSION['status']);
                                            unset($_SESSION['pesan']);
                                        ?>
                                        
                                        <form method="post" action="dashboard/config/proses_login.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUser" type="text" placeholder="Username" name="username" required />
                                                <label for="inputUser">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberme" type="checkbox" name="remember" />
                                                <label class="form-check-label" for="inputRememberme">Remember Me</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <button class="btn btn-dark rounded-0 w-100 mb-3" type="submit">Masuk <i class="fas fa-sign-in"></i></button>
                                                <center>
                                                    <a class="small" href="password.html">Forgot Password?</a>
                                                </center>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-3 mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-between small">
                            <div class="text-white">Copyright &copy; Berita Lokal 2022 - <?= date('Y'); ?></div>
                            <div class="d-none d-lg-block">
                                <a href="#" class="text-white">Privacy Policy</a>
                                &middot;
                                <a href="#" class="text-white">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dashboard/js/scripts.js"></script>
    </body>

    <script>
        let popup = document.getElementById('alert');
        if (popup.style.display = 'block') {
            setTimeout(function() {
                popup.style.opacity = '0'
                popup.style.transition = 'opacity 1s ease-in-out';
                setTimeout(function() {
                    popup.style.display = 'none';
                }, 1000)
            }, 1000);
        }
    </script>

</html>
