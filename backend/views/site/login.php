<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use yii\bootstrap\Modal;


$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
Modal::begin([
    'header' => '<h1>'.$this->title.'</h1>',
    'id'=>'login-modal',
]);
?>
<div class="site-login">


    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form',
                'enableAjaxValidation' => true,
                'action' => ['site/ajax-login']
                ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton(''.$this->title.'', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php Modal::end(); ?>