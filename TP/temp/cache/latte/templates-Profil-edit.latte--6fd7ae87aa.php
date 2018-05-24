<?php
// source: C:\wamp\www\TP\app/templates/Profil/edit.latte

use Latte\Runtime as LR;

class Template6fd7ae87aa extends Latte\Runtime\Template
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
<h1> Edit booking</h1>
<?php
		/* line 5 */ $_tmp = $this->global->uiControl->getComponent("editBookForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

<BR> <H1> <?php echo LR\Filters::escapeHtmlText($editedBooking->bike_name) /* line 7 */ ?></H1>
<BR> <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 8 */ ?>/images/<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($editedBooking->photo_filename)) /* line 8 */ ?>" class="img-responsive img-circle" height="100" width="100">
<BR> <B> number of bike: </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->bike_number) /* line 9 */ ?>

<BR> <B> Place of bike:	 </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->place) /* line 10 */ ?>

<BR> <B> Status of bike: </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->bike_status) /* line 11 */ ?>

<BR> <B> Status of rent: </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->rent_status) /* line 12 */ ?>

<BR> <B> Last return:	 </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->last_return) /* line 13 */ ?>

<BR> <B> Color:		 </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->color) /* line 14 */ ?>

<BR> <B> Size:           </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->size) /* line 15 */ ?>

<BR> <B> Gears:		 </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->gears) /* line 16 */ ?>

<BR> <B> Max speed:	 </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->max_speed_kmh) /* line 17 */ ?>

<BR> <B> Max load (kg):	 </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->max_load_kg) /* line 18 */ ?>

<BR> <B> Range (km):	 </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->range_km) /* line 19 */ ?>

<BR> <B> Weight (kg):	 </B> <?php
		echo LR\Filters::escapeHtmlText($editedBooking->weight_kg) /* line 20 */;
	}

}
