<?php
$this->breadcrumbs=array(
	'Project Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ProjectTypes', 'url'=>array('index')),
	array('label'=>'Create ProjectTypes', 'url'=>array('create')),
	array('label'=>'Update ProjectTypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage ProjectTypes', 'url'=>array('admin')),
);
?>

<h1>View ProjectTypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'created_at',
		'updated_at',
		'name',
		'is_with_free_text',
	),
)); ?>
