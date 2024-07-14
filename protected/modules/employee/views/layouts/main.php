<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php print Utilities::get_appName(); ?></title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">

        <link rel="stylesheet" type="text/css" href="<?php echo Utilities::get_baseUrl(); ?>/css/yii.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Utilities::get_baseUrl(); ?>/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Utilities::get_baseUrl(); ?>/css/custom.css">
        <link rel="stylesheet" href="<?php echo Utilities::get_baseUrl(); ?>/vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    </head>
    <body class="">
        <?php $this->renderPartial('/layouts/_header'); ?>
        <?php $this->renderPartial('/layouts/_leftSide'); ?>
        
          <div id="overlay"></div>
        
        <div class="page-content">
            <?php $this->renderPartial('/layouts/_breadcrumbs'); ?>
            <div class="page-main">
                <?php print $content; ?>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/f7979fad69.js" crossorigin="anonymous"></script>
        <script src="<?php echo Utilities::get_baseUrl(); ?>/vendor/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
         <script type="text/javascript">
            document.querySelector('.header-toggle-bar').addEventListener('click', function () {
                var sidebar = document.getElementById('sidebar');
                var content = document.getElementById('content');
                var toggleSidebar = document.getElementById('toggleSidebar');

                if (sidebar.classList.contains('open-sidebar')) {
                    sidebar.classList.remove('open-sidebar');
                    //content.classList.remove('open-content');
                    toggleSidebar.classList.remove('open-header');
                     document.getElementById('overlay').classList.remove('overlay');
                } else {
                    sidebar.classList.add('open-sidebar');
                    //content.classList.add('open-content');
                    toggleSidebar.classList.add('open-header');
                     document.getElementById('overlay').classList.add('overlay');
                }
            });
        </script>
    </body>
</html>
