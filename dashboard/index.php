<?php  
    session_start();

    if (!isset($_SESSION['login'])) {
        header('Location: ../login.php');
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
        <title>Berita Lokal - Dashboard</title>
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/style_dashboard.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/summernote/summernote-bs4.min.css">

        <script src="assets/ckeditor5-build-classic/ckeditor.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark">

            <!-- navbar -->
            <?php include 'section/navbar.php'; ?>
        
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    
                    <!-- sidebar -->
                    <?php include 'section/sidebar.php'; ?>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                
                <main>
                    <?php include 'config/route_pages.php'; ?>
                </main>

                <footer class="py-4 bg-light mt-auto">

                    <!-- footer -->
                    <?php include 'section/footer.php'; ?>
                
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="assets/summernote/summernote-bs4.min.js"></script>
        <script src="assets/jquery/jquery.min.js"></script>

       <script>
            ClassicEditor
                .create( document.querySelector( '#artikel' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>

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
    </body>
</html>
