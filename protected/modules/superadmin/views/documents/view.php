<?php
$this->breadcrumbs=array(
	'Documents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Documents', 'url'=>array('index')),
	array('label'=>'Create Documents', 'url'=>array('create')),
	array('label'=>'Update Documents', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Documents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage Documents', 'url'=>array('admin')),
);
?>

<h1>View Documents #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'created_at',
		'updated_at',
		'applicant_id',
		'filename',
		'is_valid',
	),
)); ?>
