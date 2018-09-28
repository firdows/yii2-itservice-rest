<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\ReactAppAsset;

ReactAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

    </head>
    <body>
        <?php $this->beginBody() ?>
        <noscript>
        You need to enable JavaScript to run this app.
        </noscript>
        <div id="root"></div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
