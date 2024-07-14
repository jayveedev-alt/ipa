<?php
$this->breadcrumbs=array(
	'Statuses',
);

$this->menu=array(
	array('label'=>'Create Statuses', 'url'=>array('create')),
	array('label'=>'Manage Statuses', 'url'=>array('admin')),
);
?>

<h1>Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
