<?php
/**
 * Created by PhpStorm.
 * User: lewis
 * Date: 10/05/15
 * Time: 21:03
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = 'Calendar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-5">
                <?php echo $numberOfDays ?>

                <?php $form = ActiveForm::begin(['id' => 'date-form']); ?>
                <?= $form->field($dateForm, 'month') ?>
                <?= $form->field($dateForm, 'year') ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

</div>
