<?php
/** @var \app\models\User $model */

use app\core\form\Form;

?>
<h1>Register form</h1>
<?php
    $form = Form::begin('','post');?>
    <div class="row">
        <div class="col-lg-6">
            <?php echo  $form->field($model,"firstname");  ?>
        </div>
        <div class="col-lg-6">
            <?php echo  $form->field($model,"lastname"); ?>
        </div>
    </div>
    <?php echo  $form->field($model,"email"); ?>
    <?php echo  $form->field($model,"password")->password(); ?>
    <?php echo  $form->field($model,"confirmPassword")->password(); ?>

    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end();?>
