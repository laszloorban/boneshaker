<div>

    <div class="grid_6 push_6 padding-top-5">

        <?php

        $photoSource = Yii::app()->getBaseUrl(true) . '/' . 'images/design/logo_merida_lg.png';

        $generalImage = CHtml::image($photoSource);
        echo CHtml::link($generalImage, 'http://www.bikefun.eu');
        ?>

    </div>

</div>

<?php $homePageProd = HomePageProduct::getAllForSlider(); ?>

<?php foreach ($homePageProd as $hpp): ?>

<?php if ($hpp instanceof HomePageProduct): ?>

    <div>

        <div class="grid_6 push_3 padding-top-5">

            <?php

            $link = $this->createUrl(
                $hpp->product->itemType->itemController() . '/' . $hpp->product->itemType->itemView(),
                array('makerAndProduct' => $hpp->product->getDisplayNameWithId())
            );

            $photoSource = Yii::app()->getBaseUrl(true) . '/' . $hpp->product->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_MEDIUM_ID);
            $normalizeImage = Photo::normalizePhoto($hpp->product->getPrimaryPhotoByType(PhotoType::PHOTO_TYPE_MEDIUM_ID));
            $generalImage = CHtml::image($photoSource, $hpp->product->name);
            echo CHtml::link($generalImage, $link);
            ?>

        </div>

        <div class="grid_6 push_3 padding-top-5">

            <span class="bigNameGrey"><?php echo $hpp->product->getDisplayName(); ?></span>

            <?php

                echo $hpp->product->getLimitedDescription();
            ?>
        </div>

    </div>
 <?php endif; ?>
<?php endforeach; ?>