<?php
/** @var \app\models\User $model */

use app\core\form\Form;

?>
<h1>Login</h1>
<?php
$form = Form::begin('','post');?>
<div class="row">
        <?php echo  $form->field($model,"email");  ?>
        <?php echo  $form->field($model,"password")->password(); ?>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end();?>
