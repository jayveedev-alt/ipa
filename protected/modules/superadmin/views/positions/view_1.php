<?php
$this->breadcrumbs=array(
	'Positions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Positions', 'url'=>array('index')),
	array('label'=>'Create Positions', 'url'=>array('create')),
	array('label'=>'Update Positions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Positions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage Positions', 'url'=>array('admin')),
);
?>

<h1>View Positions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'created_at',
		'updated_at',
		'name',
	),
)); ?>
