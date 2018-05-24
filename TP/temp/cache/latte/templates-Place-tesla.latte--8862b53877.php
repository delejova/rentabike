<?php
// source: C:\xampp\htdocs\TP\app/templates/Place/tesla.latte

use Latte\Runtime as LR;

class Template8862b53877 extends Latte\Runtime\Template
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
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 42');
		if (isset($this->params['bike'])) trigger_error('Variable $bike overwritten in foreach on line 49');
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
          <a href="/TP/www/profil/"> <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo" data-pin-nopin="true" style="height: 50px;"></a>
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
		echo LR\Filters::escapeHtmlText($email) /* line 30 */ ?></a></li> 
         <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:logout")) ?>">Log out</a></li>
           <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Place:default")) ?>"><span class="sr-only">Back</span>
                  <span class="icon icon-scroll-left"></span></a></li>  
        </ul>
      </div>
    </div>
  </nav>
</header>
 
    
<div class="container" align="center"> <br>
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?><div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 42 */ ?></div>  
<?php
			$iterations++;
		}
?>
 
<h3> Tesla, Business centrum BCT, Moldavská cesta 8/A, 040 11  Košice </h3> 
<br>
<h4> You can rent these bikes: </h4>
<br>
<p>
<?php
		$iterations = 0;
		foreach ($bikesTesla as $bike) {
?>
    <div class="col-md-6 card">
    <p>    
    <b><?php echo LR\Filters::escapeHtmlText($bike->id) /* line 52 */ ?> </b>
    <b><?php echo LR\Filters::escapeHtmlText($bike->bike_name) /* line 53 */ ?> </b>
    <br> Bike mumber : <?php echo LR\Filters::escapeHtmlText($bike->bike_number) /* line 54 */ ?>

    <br> Stav : <strong><?php echo LR\Filters::escapeHtmlText($bike->status) /* line 55 */ ?></strong>
    <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 56 */ ?>/images/<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($bike->photo_filename)) /* line 56 */ ?>" class="img-responsive img-circle" height="100" width="100">
    <!-- odkaz na prezenter book, v ktorom sa vola renderDefault s parametrom id (id_bike) -->
    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Book:default", [$bike->id])) ?>">Book</a>
</p>
    </div>
<?php
			$iterations++;
		}
?>

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
