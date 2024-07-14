<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_no'); ?>
		<?php echo $form->textField($model,'application_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area_no'); ?>
		<?php echo $form->textField($model,'area_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applicant_id'); ?>
		<?php echo $form->textField($model,'applicant_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tin'); ?>
		<?php echo $form->textField($model,'tin',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ownership_form'); ?>
		<?php echo $form->textField($model,'ownership_form',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_location'); ?>
		<?php echo $form->textField($model,'project_location',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_type_id'); ?>
		<?php echo $form->textField($model,'project_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_purpose'); ?>
		<?php echo $form->textField($model,'project_purpose',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'structure_type_id'); ?>
		<?php echo $form->textField($model,'structure_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_floor_area'); ?>
		<?php echo $form->textField($model,'total_floor_area'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lot_area'); ?>
		<?php echo $form->textField($model,'lot_area',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'engineer_id'); ?>
		<?php echo $form->textField($model,'engineer_id',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'engineer_license'); ?>
		<?php echo $form->textField($model,'engineer_license',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prc_no'); ?>
		<?php echo $form->textField($model,'prc_no',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ptr_no'); ?>
		<?php echo $form->textArea($model,'ptr_no',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_issued'); ?>
		<?php echo $form->textField($model,'date_issued'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_reference'); ?>
		<?php echo $form->textField($model,'payment_reference',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->