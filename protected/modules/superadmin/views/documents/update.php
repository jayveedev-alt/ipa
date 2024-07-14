<?php
$this->breadcrumbs=array(
	'Documents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Documents', 'url'=>array('index')),
	array('label'=>'Create Documents', 'url'=>array('create')),
	array('label'=>'View Documents', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Documents', 'url'=>array('admin')),
);
?>

<h1>Update Documents <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>