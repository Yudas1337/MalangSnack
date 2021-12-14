<?php
require_once __DIR__ . "/../../../helpers/uriHelper.php";
require_once __DIR__ . "/../../../controllers/AuthController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="MalangSnack, Gudang Oleh-oleh, Malang" />
    <meta name="author" content="Yudas Malabi" />
    <meta name="description" content="MalangSnack - Gudangnya oleh-oleh khas Malang" />
    <meta property="og:title" content="MalangSnack - Gudangnya oleh-oleh khas Malang" />
    <meta property="og:description" content="MalangSnack - Gudangnya oleh-oleh khas Malang" />
    <meta property="og:image" content="<?= $helper->baseUrl("assets/images/logo_1.png") ?>" />
    <title>MalangSnack - Gudangnya oleh-oleh khas Malang</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $helper->baseUrl("assets/images/logo_1.png") ?>">
    <link href="<?= $helper->baseUrl("assets/vendor/sweetalert2/dist/sweetalert2.min.css") ?>" rel="stylesheet">
    <link href="<?= $helper->baseUrl("assets/css/style.css") ?>" rel="stylesheet">

</head>

<body class="mt-5">
    <div class="authincation">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="<?= $helper->baseUrl("assets/images/logo-full.png") ?>" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form method="POST">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" autofocus class="form-control" placeholder="johndoe@example.com" name="email" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-success btn-block">Masuk</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-4">
                                        <p>Belum punya akun? <a class="text-success" href="<?= $helper->baseUrl("index.php?page=register") ?>">Daftar</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= $helper->baseUrl("assets/vendor/sweetalert2/dist/sweetalert2.min.js") ?>"></script>
</body>

<?php
if (isset($_POST['submit'])) {
    $authController = new AuthController();
    $authController->login();
}
?>

</html>