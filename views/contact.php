<?php 
    
    /**
    * @var $this View
    * @var $model Model
    */

use app\core\form\Form;
use app\core\form\TextareaField;
use app\core\Model;
use app\core\View;

$this->title = 'Contact';
?>

<h1>contact form</h1>
<?php $form = Form::begin('','post') ?>
    <?php echo $form->field($model,'subject') ?>
    <?php echo $form->field($model,'email')->email() ?>
    <?php echo new TextareaField($model,'body') ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>