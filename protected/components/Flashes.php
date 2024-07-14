<?php

    class Flashes extends CWidget
    {

        public function run()
        {
            Yii::app()->clientScript->registerScript(
                'myHideEffect', '$(".flashes").animate({opacity: 0.9}, 3500).fadeOut("slow");', CClientScript::POS_READY
            );
            $flashMessages = Yii::app()->user->getFlashes();
            if($flashMessages) {
                foreach($flashMessages as $key => $message) {

                    $isSuccess = 0;

                    if(!strcmp($key, 'danger')) {
                        $caption = 'Error';
                    } else if(!strcmp($key, 'success')) {
                        $caption = 'Success';
                        $isSuccess = 1;
                    } else if(!strcmp($key, 'warning')) {
                        $caption = 'Warning';
                    } else if(!strcmp($key, 'info')) {
                        $caption = 'Info';
                    }

                    if($isSuccess == Utilities::YES) {
                        $msg = '<div class="alert alert-success">
                                    <strong>' . $caption . ':</strong> ' . $message . '
                                </div>';
                    } else {
                        $msg = '<div class="alert alert-' . $key . '" role="alert">
                                    <strong>' . $caption . ':</strong> ' . $message . '
                                </div>';
                    }
                }
                print $msg;
            }
        }

    }

?>