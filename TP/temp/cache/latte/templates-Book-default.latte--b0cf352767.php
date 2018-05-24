<?php
// source: C:\wamp\www\TP\app/templates/Book/default.latte

use Latte\Runtime as LR;

class Templateb0cf352767 extends Latte\Runtime\Template
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
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>

<BR> <H1> <?php echo LR\Filters::escapeHtmlText($bike->bike_name) /* line 5 */ ?></H1>
<BR> <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 6 */ ?>/images/<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($bike->photo_filename)) /* line 6 */ ?>" class="img-responsive img-circle" height="100" width="100">
<BR> <B> number of bike: </B> <?php echo LR\Filters::escapeHtmlText($bike->bike_number) /* line 7 */ ?>

<BR> <B> Place of bike:	 </B> <?php echo LR\Filters::escapeHtmlText($bike->place) /* line 8 */ ?>

<BR> <B> Status of bike: </B> <?php echo LR\Filters::escapeHtmlText($bike->status) /* line 9 */ ?>

<BR> <B> Last return:	 </B> <?php echo LR\Filters::escapeHtmlText($bike->last_return) /* line 10 */ ?>

<BR> <B> Color:		 </B> <?php echo LR\Filters::escapeHtmlText($bike->color) /* line 11 */ ?>

<BR> <B> Size:           </B> <?php echo LR\Filters::escapeHtmlText($bike->size) /* line 12 */ ?>

<BR> <B> Gears:		 </B> <?php echo LR\Filters::escapeHtmlText($bike->gears) /* line 13 */ ?>

<BR> <B> Max speed:	 </B> <?php echo LR\Filters::escapeHtmlText($bike->max_speed_kmh) /* line 14 */ ?>

<BR> <B> Max load (kg):	 </B> <?php echo LR\Filters::escapeHtmlText($bike->max_load_kg) /* line 15 */ ?>

<BR> <B> Range (km):	 </B> <?php echo LR\Filters::escapeHtmlText($bike->range_km) /* line 16 */ ?>

<BR> <B> Weight (kg):	 </B> <?php echo LR\Filters::escapeHtmlText($bike->weight_kg) /* line 17 */ ?>

<h1> Create booking of this bike </h1>
<?php
		/* line 19 */ $_tmp = $this->global->uiControl->getComponent("bookForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

<?php
		if ($bike->bike_number) {
?><div>
    <BR> <B> number of bike: </B> <?php echo LR\Filters::escapeHtmlText($bike->bike_number) /* line 22 */ ?>

</div><?php
		}
		
	}

}
