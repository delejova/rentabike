<?php
// source: C:\xampp\htdocs\TP\app/templates/Forgot/default.latte

use Latte\Runtime as LR;

class Templateb6d906fd3a extends Latte\Runtime\Template
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
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 40');
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
        <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 9 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo" data-pin-nopin="true" style="height: 50px;">
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
          <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:logout")) ?>">Back</a></li>
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
			echo LR\Filters::escapeHtmlText($flash->message) /* line 40 */ ?></div><?php
			$iterations++;
		}
?>
</h2>    
<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["forgotForm"];
		?>   <form class=form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), FALSE) ?>>
    <p><label<?php
		$_input = end($this->global->formsStack)["email"];
		echo $_input->getLabelPart()->attributes() ?>>Your email: <input<?php
		$_input = end($this->global->formsStack)["email"];
		echo $_input->getControlPart()->attributes() ?>></label>
    <p><input class="btn btn-brand"<?php
		$_input = end($this->global->formsStack)["send"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?></form>




</div>
    
    <div style="min-height: 100px;"></div>

<footer class="brand-footer">
  <div class="container-fixed">
    <div class="row brand-footer-bar hidden-xl hidden-l hidden-m">
      <div class="col-l-3 col-m-2 col-s-12">
        <div class="brand-logo">
          <a href="#">
            <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 59 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo">
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
            <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 78 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo">
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
            
<?php
	}


	function blockHead($_args)
	{
?><style>

</style>
<?php
	}

}
