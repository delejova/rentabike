<?php
// source: C:\xampp\htdocs\TP\app/templates/Facility/new.latte

use Latte\Runtime as LR;

class Templatef79f0a12e4 extends Latte\Runtime\Template
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
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 39');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
		echo LR\Filters::escapeHtmlText($email) /* line 4 */ ?>

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
         <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Profil:default")) ?>"><span class="sr-only">My Profile</span><span class="icon icon-my-profile"></span></a></li>
         <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Facility:default")) ?>"><span class="sr-only">Back</span>
                  <span class="icon icon-scroll-left"></span></a></li>  
         <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:logout")) ?>">Log out</a></li>
          
        </ul>
      </div>
    </div>
  </nav>
</header> 

<div align="center">
<h2><?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?><div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 39 */ ?></div><?php
			$iterations++;
		}
?>
</h2>
<h4>Add new biketype </h4>
<br>

<?php
		/* line 43 */ $_tmp = $this->global->uiControl->getComponent("addNewTypeForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

<!--<form n:name=addNewTypeForm class=form>
    <p><label n:name=bike_name>Name of bike: <input n:name=bike_name ></label>
    <p><label n:name=color>Color: <input n:name=color></label>
    <p><label n:name=size>Size: <input n:name=size></label>
    <p><label n:name=gears>Gears: <input n:name=gears></label>
    <p><label n:name=max_speed_kmh>Max speed: <input n:name=max_speed_kmh></label>
    <p><label n:name=max_load_kg>Max load: <input n:name=max_load_kg></label>
    <p><label n:name=range_km>Range: <input n:name=range_km></label>
    <p><label n:name=weight_kg>Weight: <input n:name=color></label>
    <p><label n:name=photo_filename>Photo: <input n:name=photo_filename></label>
    <p><input n:name=add class="btn btn-brand" style="width:25%!important">
</form>   -->



</div>

<div style="min-height: 100px;"></div>

    <footer class="brand-footer">
  <div class="container-fixed">
    <div class="row brand-footer-bar hidden-xl hidden-l hidden-m">
      <div class="col-l-3 col-m-2 col-s-12">
        <div class="brand-logo">
          <a href="#">
            <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 70 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo">
            <span class="sr-only">Telekom Logo</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="brand-footer-separator hidden-xl hidden-l hidden-m"></div>
  <div class="container-fixed">
   <!-- <div class="row hidden-s hidden-xs">
      <div class="col-l-12">
        <div class="brand-footer-separator">
        </div>
      </div>
    </div> -->
    <div class="row brand-footer-bar">
      <div class="col-l-3 col-m-2 hidden-s hidden-xs">
        <div class="brand-logo">
          <a href="#">
            <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 89 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo">
            <span class="sr-only">Telekom Logo</span>
          </a>
        </div>
      </div>
      <div class="col-m-12 hidden-xl hidden-l hidden-m text-center text-muted">
        <div class="brand-footer-bar-text">&copy; 2017 šikuľky </div>
      </div>
      
      <div class="col-l-3 col-m-12 hidden-s hidden-xs text-l-right text-m-center text-muted">
        <div class="brand-footer-bar-text">&copy; 2017 šikuľky </div>
      </div>
    </div>
  </div>
</footer>

<script>
 $(document).ready( function(){
        $("input[name=add]").addClass("btn btn-all");
    });
</script>



<?php
	}


	function blockHead($_args)
	{
		extract($_args);
?>

<style>
    
    label {
    text-align: right;
    width: 100%;
    padding: 10px;
}

 @media screen and (max-width: 700px){
     
     td{
         padding-top: 15px;
         text-align: center!important;
     }
     
     th,td{
         
         width: 80%!important;
         display: block;
         padding-left: 70px;
         
         
     }
     
     label{
         text-align: center!important;
     }
     
 }

</style>



<?php
	}

}
