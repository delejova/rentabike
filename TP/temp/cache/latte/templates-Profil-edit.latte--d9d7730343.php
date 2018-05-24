<?php
// source: C:\xampp\htdocs\TP\app/templates/Profil/edit.latte

use Latte\Runtime as LR;

class Templated9d7730343 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'head' => 'blockHead',
	];

	public $blockTypes = [
		'content' => 'html',
		'head' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>


<?php
		$this->renderBlock('head', get_defined_vars());
?>





<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 39');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>

<header class="brand-header">
  <div class="brandbar">
    <div class="container-fixed">
      <div class="brand-logo">
          <a href="/TP/www/profil/"><img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 9 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo" data-pin-nopin="true" style="height: 50px;"></a>
        <span class="sr-only">Telekom Logo</span>
      </div>
      <div class="brand-claim">
        <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:login")) ?>"><h1><strong> Rent a bike </strong></h1></a>
        <span class="sr-only">Rent a bike</span>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-default" style="margin-bottom: 0px;">
    <div class="container-fixed">
      <div class="navbar-expanded">

        </div>
      </div>
      <div class="navbar-persistent">

        <ul class="nav navbar-nav navbar-nav-icons navbar-right">
        
         <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Profil:default")) ?>"><?php
		echo LR\Filters::escapeHtmlText($email) /* line 28 */ ?></a></li> 
         <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:logout")) ?>">Log out</a></li>
           <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Profil:default")) ?>"><span class="sr-only">Back</span>
                  <span class="icon icon-scroll-left"></span></a></li>  
        </ul>
      </div>
    </div>
  </nav>
</header>
  
  <div class="text-center">
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>  <div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 39 */ ?></div>
<?php
			$iterations++;
		}
?>
    
  <h4> Edit booking</h4>

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["editBookForm"];
		?><form class=form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), FALSE) ?>>
    <p><label <?php
		$_input = end($this->global->formsStack)["startTime"];
		echo $_input->getLabelPart()->attributes() ?>>Rent time: <input type="date" size=20<?php
		$_input = end($this->global->formsStack)["startTime"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'size' => NULL,
		))->attributes() ?>></label>
    <p><label<?php
		$_input = end($this->global->formsStack)["endTime"];
		echo $_input->getLabelPart()->attributes() ?>>Return time: <input type="date" size=20<?php
		$_input = end($this->global->formsStack)["endTime"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'size' => NULL,
		))->attributes() ?>></label>
    <p><input class="btn btn-brand" style="width:25%!important"<?php
		$_input = end($this->global->formsStack)["save"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		'style' => NULL,
		))->attributes() ?>>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?></form>
  <div class="container">
      <div class="col-md-4 col-sm-1"></div>
      <div class="col-md-4 col-sm-10">
  <br> <H2> <strong><?php echo LR\Filters::escapeHtmlText($editedBooking->bike_name) /* line 51 */ ?></strong></H2>
 <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 52 */ ?>/images/<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($editedBooking->photo_filename)) /* line 52 */ ?>" class="img-responsive img-circle booking-img">
 
<?php
		if ($editedBooking->bike_number) {
?> <div>
    <BR> <B> Number of bike: </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->bike_number) /* line 55 */ ?>

</div>
<?php
		}
?>


<?php
		if ($editedBooking->bike_status) {
?><div>
     <B> Status of bike: </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->bike_status) /* line 60 */ ?>

</div>
<?php
		}
?>

<?php
		if ($editedBooking->rent_status) {
?><div>
     <B> Status of rent: </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->rent_status) /* line 64 */ ?>

</div>
<?php
		}
?>

<?php
		if ($editedBooking->last_return) {
?><div>
     <B> Last return: </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->last_return) /* line 68 */ ?>

</div>
<?php
		}
?>

<?php
		if ($editedBooking->color) {
?><div>
     <B> Color: </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->color) /* line 72 */ ?>

</div>
<?php
		}
?>

<?php
		if ($editedBooking->size) {
?><div>
     <B> Size: </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->size) /* line 76 */ ?>

</div>
<?php
		}
?>

<?php
		if ($editedBooking->gears) {
?><div>
    <B> Gears: </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->gears) /* line 80 */ ?>

</div>
<?php
		}
?>

<?php
		if ($editedBooking->max_load_kg) {
?><div>
    <B> Max speed: </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->max_speed_kmh) /* line 84 */ ?>

</div>
<?php
		}
?>

<?php
		if ($editedBooking->max_speed_kmh) {
?><div>
     <B> Max load: </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->max_load_kg) /* line 88 */ ?>

</div>
<?php
		}
?>

<?php
		if ($editedBooking->range_km ) {
?><div>
     <B> Range (km) : </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->range_km) /* line 92 */ ?>

</div>
<?php
		}
?>

<?php
		if ($editedBooking->weight_kg ) {
?><div>
     <B> Weight (kg): </B> <?php echo LR\Filters::escapeHtmlText($editedBooking->weight_kg) /* line 96 */ ?>

</div>
<?php
		}
?>
 
<!-- <BR> <B> number of bike: </B> 
<BR> <B> Place of bike:	 </B> 
<BR> <B> Status of bike: </B> 
<BR> <B> Status of rent: </B> 
<BR> <B> Last return:	 </B> 
<BR> <B> Color:		 </B> 
<BR> <B> Size:           </B> 
<BR> <B> Gears:		 </B> 
<BR> <B> Max speed:	 </B> 
<BR> <B> Max load (kg):	 </B> 
<BR> <B> Range (km):	 </B> 
<BR> <B> Weight (kg):	 </B>  -->
</div>
</div>
</div>

    

            
<?php
	}


	function blockHead($_args)
	{
?><style>

</style>
<?php
	}

}
