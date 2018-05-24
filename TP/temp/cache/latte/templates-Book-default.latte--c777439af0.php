<?php
// source: C:\xampp\htdocs\TP\app/templates/Book/default.latte

use Latte\Runtime as LR;

class Templatec777439af0 extends Latte\Runtime\Template
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
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 52');
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
          <a href="/TP/www/profil/"> <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 9 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo" data-pin-nopin="true" style="height: 50px;"> </a>
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
         <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Place:default")) ?>"><span class="sr-only">Back</span>
                  <span class="icon icon-scroll-left"></span></a></li>  
         
         
        </ul>
      </div>
    </div>
  </nav>
</header>
            

                
               
 
  
  
    
    
 

    
    <div align="center"> <br>
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?><div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 52 */ ?></div>
<?php
			$iterations++;
		}
		?> <H2> <strong> <?php echo LR\Filters::escapeHtmlText($bike->bike_name) /* line 53 */ ?> </strong></H2>
 <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 54 */ ?>/images/<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($bike->photo_filename)) /* line 54 */ ?>" class="img-responsive img-circle" height="100" width="100">
 
 
<?php
		if ($bike->bike_number) {
?><div>
    <BR> <B> Number of bike: </B> <?php echo LR\Filters::escapeHtmlText($bike->bike_number) /* line 58 */ ?>

</div>
<?php
		}
?>


<?php
		if ($bike->status) {
?><div>
     <B> Status: </B> <?php echo LR\Filters::escapeHtmlText($bike->status) /* line 63 */ ?>

</div>
<?php
		}
?>

<?php
		if ($bike->last_return) {
?><div>
     <B> Last return: </B> <?php echo LR\Filters::escapeHtmlText($bike->last_return) /* line 67 */ ?>

</div>
<?php
		}
?>

<?php
		if ($bike->color) {
?><div>
     <B> Color: </B> <?php echo LR\Filters::escapeHtmlText($bike->color) /* line 71 */ ?>

</div>
<?php
		}
?>

<?php
		if ($bike->size) {
?><div>
     <B> Size: </B> <?php echo LR\Filters::escapeHtmlText($bike->size) /* line 75 */ ?>

</div>
<?php
		}
?>

<?php
		if ($bike->gears) {
?><div>
    <B> Gears: </B> <?php echo LR\Filters::escapeHtmlText($bike->gears) /* line 79 */ ?>

</div>
<?php
		}
?>

<?php
		if ($bike->max_load_kg) {
?><div>
    <B> Max speed: </B> <?php echo LR\Filters::escapeHtmlText($bike->max_speed_kmh) /* line 83 */ ?>

</div>
<?php
		}
?>

<?php
		if ($bike->max_speed_kmh) {
?><div>
     <B> Max load: </B> <?php echo LR\Filters::escapeHtmlText($bike->max_load_kg) /* line 87 */ ?>

</div>
<?php
		}
?>

<?php
		if ($bike->range_km ) {
?><div>
     <B> Range (km) : </B> <?php echo LR\Filters::escapeHtmlText($bike->range_km) /* line 91 */ ?>

</div>
<?php
		}
?>

<?php
		if ($bike->weight_kg ) {
?><div>
     <B> Weight (kg): </B> <?php echo LR\Filters::escapeHtmlText($bike->weight_kg) /* line 95 */ ?>

</div>
<?php
		}
?>


<h4><strong> Create booking of this bike </strong></h4>

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["bookForm"];
		?> <form class=form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), FALSE) ?>>

    <p><label <?php
		$_input = end($this->global->formsStack)["startTime"];
		echo $_input->getLabelPart()->attributes() ?>>Rent time: <input type="datetime-local" size=20<?php
		$_input = end($this->global->formsStack)["startTime"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'size' => NULL,
		))->attributes() ?>></label>    
    <p><label<?php
		$_input = end($this->global->formsStack)["endTime"];
		echo $_input->getLabelPart()->attributes() ?>>Return time: <input type="datetime-local"<?php
		$_input = end($this->global->formsStack)["endTime"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		))->attributes() ?>></label>
   
        <br>    
    <p>   
    <button type="button"  class="btn btn-brand btn-lg" data-toggle="modal" data-target="#myModal">Reserve</button>
    </p>
    <!--<p><input n:name="reserve" class="btn btn-brand">-->
        
  <div id="myModal" class="modal" role="dialog">
  <div class="modal-dialog">

     
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Warning!</h4>
      </div>
      <div class="modal-body">
        <p>Are you really sure you want to rent a bike?</p>
      </div>
      <div class="modal-footer">
          <p><input class="btn btn-brand"<?php
		$_input = end($this->global->formsStack)["reserve"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
              <br>
        <button type="button" class="btn btn-brand form-input" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
   

<!--<button type="button" class="btn btn-brand" data-toggle="modal"
        data-target="#modal-init-demo">Modal-Dialog öffnen<button type="button" class="btn btn-brand" data-toggle="modal"
 </button>-->

<!-- Der Modal-Dialog -->
<!--<div id="modal-init-demo" class="modal fade" aria-labelledby="exampleModalLabel"
     aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">x</span>
              <span class="sr-only">Close</span>
            </button>
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Headline</h4>
            </div>
            <div class="modal-body">
                <p>Content...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-brand"
                        data-dismiss="modal">Schließen</button>
                <button type="button" class="btn btn-brand"
                        data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>-->

<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?> </form>
  
</div>
     
     
   
   
</form>

   




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
