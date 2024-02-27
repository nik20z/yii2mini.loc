<?php

/** @var yii\web\View $this */

$this->title = Yii::$app->name;
?>

<section class="blog-post-area">
    <div class="container">
        <div class="row">
            <div class="blog-post-area-style">
                <div class="col-md-12">
                    <div class="single-post-big">
                        <div class="big-image">
                            <?= \yii\helpers\Html::img("@web/{$postData->img}") ?>
                        </div>
                        <div class="big-text">
                            <h3><?= $postData->title ?></h3>
                            <?= $postData->excerpt ?>
                            <h4><span><?= Yii::$app->formatter->asDate($postData->created_at, 'php:d.m.Y') ?></span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pegination">
        
    </div>
</section>
