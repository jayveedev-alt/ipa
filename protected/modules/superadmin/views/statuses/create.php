<?php
$this->breadcrumbs=array(
	'Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Statuses', 'url'=>array('index')),
	array('label'=>'Manage Statuses', 'url'=>array('admin')),
);
?>

<h1>Create Statuses</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>