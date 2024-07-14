<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo Utilities::get_appName(); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <link rel="stylesheet" href="<?php echo Utilities::get_baseUrl(); ?>/css/main.css">
        <link rel="stylesheet" href="<?php echo Utilities::get_baseUrl(); ?>/css/custom.css">
        <link rel="stylesheet" href="<?php echo Utilities::get_baseUrl(); ?>/vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    </head>

    <body class="">



        <div class="page-content">
            <?php echo $content; ?>
        </div>
        <?php // $this->renderPartial('/layouts/_footer'); ?>

        <script src="https://kit.fontawesome.com/f7979fad69.js" crossorigin="anonymous"></script>
        <script src="<?php echo Utilities::get_baseUrl(); ?>/vendor/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>

    </body>
</html>
