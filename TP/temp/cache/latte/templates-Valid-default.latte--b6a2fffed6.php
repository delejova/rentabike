<?php
// source: C:\xampp\htdocs\TP\app/templates/Valid/default.latte

use Latte\Runtime as LR;

class Templateb6a2fffed6 extends Latte\Runtime\Template
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
          <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:logout")) ?>">Log out</a></li>   
        </ul>
      </div>
    </div>
  </nav>
</header>
    
    
<div align="center">

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["validationForm"];
		?><form class=form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), FALSE) ?>>
    <p><label<?php
		$_input = end($this->global->formsStack)["validationCode"];
		echo $_input->getLabelPart()->attributes() ?>>Validation Code: <input<?php
		$_input = end($this->global->formsStack)["validationCode"];
		echo $_input->getControlPart()->attributes() ?>></label>

    <p><input class="btn btn-brand"<?php
		$_input = end($this->global->formsStack)["confirm"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?></form>
    

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
