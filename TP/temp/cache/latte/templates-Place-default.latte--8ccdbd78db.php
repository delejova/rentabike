<?php
// source: C:\xampp\htdocs\TP\app/templates/Place/default.latte

use Latte\Runtime as LR;

class Template8ccdbd78db extends Latte\Runtime\Template
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
        <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo" data-pin-nopin="true" style="height: 50px;">
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
           <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Profil:default")) ?>"><span class="sr-only">Back</span>
          <span class="icon icon-scroll-left"></span></a></li>  
        </ul>
      </div>
    </div>
  </nav>
</header>
    
    <div align:center>   <br>
        
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?><div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 42 */ ?></div>
<?php
			$iterations++;
		}
?>
<h4>Choose your place</h4>

<h2><b>Important notice!</b></h2><br>
<p>
Place of renting the bike must be the same place of its returning. 
<br>When you rent the bike from CBC, you must return this bike on CBC.
<br>When you rent the bike from Tesla, you must return this bike on Tesla.</p>
<br>


<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["placeFormCBC"];
		?><form class=form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), FALSE) ?>>
    <p><input class="btn btn-brand"<?php
		$_input = end($this->global->formsStack)["cbc"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?></form>
 
<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["placeFormTesla"];
		?><form class=form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), FALSE) ?>>
    <p><input class="btn btn-brand"<?php
		$_input = end($this->global->formsStack)["tesla"];
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
    p{
        font-size: 15px;
   
        line-height: 1.5;
    }
</style>
<?php
	}

}
