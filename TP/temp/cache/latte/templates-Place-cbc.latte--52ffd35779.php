<?php
// source: C:\wamp\www\TP\app/templates/Place/cbc.latte

use Latte\Runtime as LR;

class Template52ffd35779 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['bike'])) trigger_error('Variable $bike overwritten in foreach on line 7');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<h1> CBC <h1>
<h2> Cassovar Business Center II, Žriedlová 13, 040 01, Košice: </h2>
<h3> You can rent these bikes: </h3>
<?php
		$iterations = 0;
		foreach ($bikesCBC as $bike) {
			?>    <b><?php echo LR\Filters::escapeHtmlText($bike->id) /* line 8 */ ?> </b>
    <b><?php echo LR\Filters::escapeHtmlText($bike->bike_name) /* line 9 */ ?> </b>
    <br> Bike mumber : <?php echo LR\Filters::escapeHtmlText($bike->bike_number) /* line 10 */ ?>

    <br> Stav : <?php echo LR\Filters::escapeHtmlText($bike->status) /* line 11 */ ?>

    <br> Id typ biku : <?php echo LR\Filters::escapeHtmlText($bike->id_bike_type) /* line 12 */ ?>

    <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */ ?>/images/<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($bike->photo_filename)) /* line 13 */ ?>" class="img-responsive img-circle" height="100" width="100">
    <!-- odkaz na prezenter book, v ktorom sa vola renderDefault s parametrom id (id_bike) -->
    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Book:default", [$bike->id])) ?>">Book</a>
    <br><br>
<?php
			$iterations++;
		}
		
	}

}
