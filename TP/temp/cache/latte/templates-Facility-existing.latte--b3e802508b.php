<?php
// source: C:\xampp\htdocs\TP\app/templates/Facility/existing.latte

use Latte\Runtime as LR;

class Templateb3e802508b extends Latte\Runtime\Template
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



<?php $this->renderBlock('head', get_defined_vars()) ?>    <?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 43');
		if (isset($this->params['bikeCbc'])) trigger_error('Variable $bikeCbc overwritten in foreach on line 45');
		if (isset($this->params['bikeTesla'])) trigger_error('Variable $bikeTesla overwritten in foreach on line 63');
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
         <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Facility:default")) ?>"><span class="sr-only">Back</span>
                  <span class="icon icon-scroll-left"></span></a></li>  
         
           
                   
        </ul>
      </div>
    </div>
  </nav>
</header>

 
<div class="container" align="center">
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?><div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 43 */ ?></div>
<?php
			$iterations++;
		}
?>
<h4> CBC </h4>
<?php
		$iterations = 0;
		foreach ($bikesCbc as $bikeCbc) {
?>
    
 <div class="col-md-4 card">   
      <b><?php echo LR\Filters::escapeHtmlText($bikeCbc->id) /* line 48 */ ?> </b>
     <b><?php echo LR\Filters::escapeHtmlText($bikeCbc->bike_name) /* line 49 */ ?> </b>
    <br> Bike mumber : <?php echo LR\Filters::escapeHtmlText($bikeCbc->bike_number) /* line 50 */ ?>

    <br> Stav : <?php echo LR\Filters::escapeHtmlText($bikeCbc->status) /* line 51 */ ?>

    <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 52 */ ?>/images/<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($bikeCbc->photo_filename)) /* line 52 */ ?>" class="img-responsive img-circle" height="100" width="100">
    <!-- odkaz na prezenter book, v ktorom sa vola renderDefault s parametrom id (id_bike) -->
    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Facility:edit", [$bikeCbc->id])) ?>">Edit</a>
    <br><br>
 </div>
    
<?php
			$iterations++;
		}
?>
</div>
<div class="container" align="center">
<h4> Tesla </h4>

<?php
		$iterations = 0;
		foreach ($bikesTesla as $bikeTesla) {
?>
   
    <div class="col-md-4 card">
    <b><?php echo LR\Filters::escapeHtmlText($bikeTesla->id) /* line 66 */ ?> </b>
    <b><?php echo LR\Filters::escapeHtmlText($bikeTesla->bike_name) /* line 67 */ ?> </b>
    <br> Bike mumber : <?php echo LR\Filters::escapeHtmlText($bikeTesla->bike_number) /* line 68 */ ?>

    <br> Stav : <?php echo LR\Filters::escapeHtmlText($bikeTesla->status) /* line 69 */ ?>

    <br> Id typ biku : <?php echo LR\Filters::escapeHtmlText($bikeTesla->id_bike_type) /* line 70 */ ?>

    <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 71 */ ?>/images/<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($bikeTesla->photo_filename)) /* line 71 */ ?>" class="img-responsive img-circle" height="100" width="100">
    <!-- odkaz na prezenter book, v ktorom sa vola renderDefault s parametrom id (id_bike) -->
    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Facility:edit", [$bikeTesla->id])) ?>">Edit</a>
    <br><br>
    </div>
<?php
			$iterations++;
		}
?>
</div>

</div>



   

<?php
	}


	function blockHead($_args)
	{
?><style>
    h4{
        margin-top: 30px;
        margin-bottom: 20px;
    }
</style>
        
        
        
<?php
	}

}
