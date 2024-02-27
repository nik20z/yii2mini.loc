<?php

/** @var yii\web\View $this */

$this->title = Yii::$app->name;
?>

<section class="blog-post-area">
    <div class="container">
        <div class="row">
            <div class="blog-post-area-style">
                <?php foreach($posts as $post): ?>
                <div class="col-md-3">
                    <div class="single-post">
                        <?= \yii\helpers\Html::img("@web/{$post->img}") ?>
                        <h3><a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>"><?= $post->title ?></a></h3>
                        <h4><span>Category: <span class="author-name">
                            <a href="<?= \yii\helpers\Url::to(['category/view', 'alias' => $post->category->alias]) ?>">
                                <?= $post->category->title ?>
                            </a>
                            </span></span>
                        </h4>
                        <?= $post->excerpt ?>
                        <h4><span><?= Yii::$app->formatter->asDate($post->created_at, 'php:d.m.Y') ?></span></h4>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="pegination">
        <div class="nav-links">
            <?= \yii\widgets\LinkPager::widget([
                'pagination' => $pages
            ]) ?>
        </div>
    </div>
</section>
