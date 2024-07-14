<?php
$this->breadcrumbs=array(
	'Positions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Positions', 'url'=>array('index')),
	array('label'=>'Create Positions', 'url'=>array('create')),
	array('label'=>'View Positions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Positions', 'url'=>array('admin')),
);
?>

<h1>Update Positions <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>