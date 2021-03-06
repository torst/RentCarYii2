<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>

<section id="advertisement">
    <div class="container">
        <!--        <img src="/images/shop/advertisement.jpg" alt="" />-->
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <ul class="type category-products">
                        <?=  \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
                    </ul>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Поиск по запросу: <?= Html::encode($q) ?></h2>
                    <?php if (!empty($autos)): ?>
                        <?php foreach ($autos as $auto): ?>
                            <?php $mainImg = $auto->getImage();?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?= Html::img($mainImg->getUrl(), ['alt' => $auto->name])?>
                                            <h2>$<?= $auto->price?></h2>
                                            <p><a href="<?= \yii\helpers\Url::to(['auto/view', 'id' => $auto->id])?>"><?= $auto->name?></a></p>
                                        </div>
                                        <?php if ($auto->new): ?>
                                            <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
                                        <?php endif; ?>
                                        <?php if ($auto->sale): ?>
                                            <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new'])?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <?php echo \yii\widgets\LinkPager::widget([
                            'pagination' => $pages,
                        ]); ?>

                    <?php else :?>
                        <h2>Ничего не найдено, досвидули....</h2>
                    <?php endif; ?>

                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>