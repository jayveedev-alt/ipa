<?php
$this->breadcrumbs=array(
	'Statuses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Statuses', 'url'=>array('index')),
	array('label'=>'Create Statuses', 'url'=>array('create')),
	array('label'=>'View Statuses', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Statuses', 'url'=>array('admin')),
);
?>

<h1>Update Statuses <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>