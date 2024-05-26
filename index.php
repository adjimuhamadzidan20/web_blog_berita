<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home1.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Berita Lokal</title>
</head>
<body>

    <!-- header -->
    <?php include 'section/header.php'; ?>

    <!-- container -->
    <div class="container">
        <!-- main -->
        <div class="main">

            <!-- <div class="highlight">
                <h2>News Highlight</h2>
            </div> -->

            <?php include 'route_artikel.php'; ?>

        </div>

        <!-- side bar -->
        <?php include 'section/sidebar.php'; ?>

    </div>

    <!-- footer -->
    <?php include 'section/footer.php'; ?>    

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>