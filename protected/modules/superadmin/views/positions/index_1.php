<?php
$this->breadcrumbs=array(
	'Positions',
);

$this->menu=array(
	array('label'=>'Create Positions', 'url'=>array('create')),
	array('label'=>'Manage Positions', 'url'=>array('admin')),
);
?>

<h1>Positions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
