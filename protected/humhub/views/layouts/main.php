<?php
/* @var $this \yii\web\View */
/* @var $content string */


$display=false;
if(Yii::$app->user->isGuest){
    $display=false;
}else{
    $display=true;
}

\humhub\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= strip_tags($this->pageTitle); ?></title>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <?php $this->head() ?>
        <?= $this->render('head'); ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <!-- start: second top navigation bar -->
        <div id="topbar-second" class="topbar">
            <div class="container">
                <div class="topbar-brand hidden-xs">
                    <?= \humhub\widgets\SiteLogo::widget(); ?>
                </div>

                <ul class="nav" id="top-menu-nav">
                    <!-- load space chooser widget -->
                    <?php
                    if($display){
                        echo \humhub\modules\space\widgets\Chooser::widget();
                    }
                    ?>
                    <!-- load navigation from widget -->
                    <?php
                    if($display){
                        echo \humhub\widgets\TopMenu::widget();
                    }
                    ?>
                </ul>

                <ul class="nav pull-right" id="search-menu-nav">
                    <?php
                    if($display){
                        echo \humhub\widgets\TopMenuRightStack::widget();
                    }
                    ?>
                </ul>
                
                <div class="topbar-actions pull-right">
                    <?= \humhub\modules\user\widgets\AccountTopMenu::widget(); ?>
                </div>

                <div class="notifications pull-right">
                    <?php
                    if($display){
                        echo \humhub\widgets\NotificationArea::widget();
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- end: second top navigation bar -->

        <?php 
        if($this->context->id=='dashboard'||$display){
            echo $content;
        }
        ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
