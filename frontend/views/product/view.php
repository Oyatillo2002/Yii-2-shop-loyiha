<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">

    <div class="col-lg-5 mt-5">
        <div class="card mb-3">
            <img class="card-img img-fluid" src="<?= $model->getMainImageUrl() ?>" alt="Card image cap" id="product-detail">
        </div>
        <div class="row">
            <!--Start Controls-->
            <div class="col-1 align-self-center">
                <a href="#multi-item-example" role="button" data-bs-slide="prev">
                    <i class="text-dark fas fa-chevron-left"></i>
                    <span class="sr-only">Previous</span>
                </a>
            </div>
            <!--End Controls-->
            <!--Start Carousel Wrapper-->
            <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                <!--Start Slides-->
                <div class="carousel-inner product-links-wap" role="listbox">

                    <!--First slide-->
                    <div class="carousel-item active">
                        <div class="row">
                            <?php foreach ($model->productImages as $productImage) { ?>
                            <div class="col-4">
                                <a href="#">
                                    <img class="card-img img-fluid" src="/admin/uploads/<?= $productImage->image ?>" alt="Product Image 1">
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--/.First slide-->

                    <!--Second slide-->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-4">
                                <a href="#">
                                    <img class="card-img img-fluid"
                                        src="<?php Yii::getAlias('@webroot'); ?> /zay/img/product_single_04.jpg" alt="Product Image 4">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#">
                                    <img class="card-img img-fluid"
                                        src="<?php Yii::getAlias('@webroot'); ?> /zay/img/product_single_05.jpg" alt="Product Image 5">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#">
                                    <img class="card-img img-fluid"
                                        src="<?php Yii::getAlias('@webroot'); ?> /zay/img/product_single_06.jpg" alt="Product Image 6">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--/.Second slide-->

                    <!--Third slide-->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-4">
                                <a href="#">
                                    <img class="card-img img-fluid"
                                        src="<?php Yii::getAlias('@webroot'); ?> /zay/img/product_single_07.jpg" alt="Product Image 7">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#">
                                    <img class="card-img img-fluid"
                                        src="<?php Yii::getAlias('@webroot'); ?> /zay/img/product_single_08.jpg" alt="Product Image 8">
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#">
                                    <img class="card-img img-fluid"
                                        src="<?php Yii::getAlias('@webroot'); ?> /zay/img/product_single_09.jpg" alt="Product Image 9">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--/.Third slide-->
                </div>
                <!--End Slides-->
            </div>
            <!--End Carousel Wrapper-->
            <!--Start Controls-->
            <div class="col-1 align-self-center">
                <a href="#multi-item-example" role="button" data-bs-slide="next">
                    <i class="text-dark fas fa-chevron-right"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--End Controls-->
        </div>
    </div>
    <!-- col end -->
    <div class="col-lg-7 mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="h2"><?= $model->name ?></h1>
                <p class="h3 py-2"><?= $model->price ?> so'm</p>
                <p class="py-2">
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-secondary"></i>
                    <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                </p>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <h6>Brand:</h6>
                    </li>
                    <li class="list-inline-item">
                        <p class="text-muted"><strong>Easy Wear</strong></p>
                    </li>
                </ul>

                <h6>Description:</h6>
                <p><?= $model->description ?></p>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <h6>Avaliable Color :</h6>
                    </li>
                    <li class="list-inline-item">
                        <p class="text-muted"><strong>White / Black</strong></p>
                    </li>
                </ul>

                <form action="" method="GET">
                    <input type="hidden" name="product-title" value="Activewear">
                    <div class="row">

                        <div class="col-auto">
                            <ul class="list-inline pb-3">
                                <li class="list-inline-item text-right">
                                    Quantity
                                    <input type="hidden" name="product-quanity" id="product-quanity"
                                        value="1">
                                </li>
                                <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span>
                                </li>
                                <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span>
                                </li>
                                <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col d-grid">
                            <button type="submit" class="btn btn-success btn-lg" name="submit"
                                value="buy">Sotib olish</button>
                        </div>
                        <div class="col d-grid">
                            <button type="submit" class="btn btn-success btn-lg" name="submit"
                                value="addtocard">Savatga qo'shish</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
