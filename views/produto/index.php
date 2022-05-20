<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1>Buscar Produto</h1>
<div class="funcionario-form">

    <?php $form = ActiveForm::begin(); ?>
    <h6>Exemplos de Meli Ids</h6>
    <code>
        MLB1191972200<br>MLB1381222244<br>MLB-1689836021<br>MLB-1570636742<br>
    </code>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true])->label("Meli Id") ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php
    if (isset($model->id)) {
    ?>
        <h2><?= $model->title ?></h2>
        <h6><?= $model->id ?></h6>
        <h6>Link: <?= $model->permalink ?></h6>
        <h6>Link: <?= $model->category_id ?></h6>
        <h5>Preço: <?= str_replace('.', ',', Yii::$app->formatter->asCurrency($model->price, 'BRL')) ?></h5>
        <h5>Quantidade: <?= $model->available_quantity ?></h5>

        <img src="<?= $model->thumbnail ?>" alt="<?= $model->title ?>" width="150">
    <?php
    } else {
    ?>
        <h5>Produto: <?= $mensagem ?></h5>
    <?php
    }
    ?>
</div>