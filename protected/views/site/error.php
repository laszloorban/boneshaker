<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>


<h2>Error <?php echo $error['code']; ?></h2>

<div class="error">
<?php

    echo $error['message'];

?>
</div>