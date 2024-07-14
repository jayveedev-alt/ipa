<nav class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a class="sidebar-brand" href="#">
            <?php echo Utilities::get_appName(); ?>
        </a>
    </div>
    <div class="sidebar-nav">
        <?php
            $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'Home', 'url' => array('/administrator/dashboard/index')),
                    array('label' => 'Request', 'url' => array('/administrator/requests/admin')),
                    array('label' => 'Employees', 'url' => array('/administrator/users/admin')),
                    array('label' => 'Calculation of Fees', 'url' => array('/administrator/dashboard/computation')),
                    array('label' => 'Logs', 'url' => array('/administrator/usersLog/admin')),
                    array('label' => 'Logout (' . Yii::app()->user->username . ') ', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                ),
            ));
        ?>
    </div>
</nav>