<?php
// source: C:\xampp\htdocs\TP\app/templates/Sign/register.latte

use Latte\Runtime as LR;

class Template90ad6e8f80 extends Latte\Runtime\Template
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
           <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:licence")) ?>">Licence</a></li>
           <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:login")) ?>">Back</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
         
  
            
            

    
    
<div align="center">

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["registerForm"];
		?><form class=form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), FALSE) ?>>
    <p><label<?php
		$_input = end($this->global->formsStack)["usermail"];
		echo $_input->getLabelPart()->attributes() ?>>Email: <input<?php
		$_input = end($this->global->formsStack)["usermail"];
		echo $_input->getControlPart()->attributes() ?>></label>
    <p><label<?php
		$_input = end($this->global->formsStack)["password"];
		echo $_input->getLabelPart()->attributes() ?>>Password: <input<?php
		$_input = end($this->global->formsStack)["password"];
		echo $_input->getControlPart()->attributes() ?>></label>
    <p><label<?php
		$_input = end($this->global->formsStack)["password_repeat"];
		echo $_input->getLabelPart()->attributes() ?>>Password again: <input<?php
		$_input = end($this->global->formsStack)["password_repeat"];
		echo $_input->getControlPart()->attributes() ?>></label>
    <p><label<?php
		$_input = end($this->global->formsStack)["firstName"];
		echo $_input->getLabelPart()->attributes() ?>>First name: <input<?php
		$_input = end($this->global->formsStack)["firstName"];
		echo $_input->getControlPart()->attributes() ?>></label>
    <p><label<?php
		$_input = end($this->global->formsStack)["lastName"];
		echo $_input->getLabelPart()->attributes() ?>>Last name: <input<?php
		$_input = end($this->global->formsStack)["lastName"];
		echo $_input->getControlPart()->attributes() ?>></label>
    <p><label<?php
		$_input = end($this->global->formsStack)["employeeId"];
		echo $_input->getLabelPart()->attributes() ?>>Your ID: <input<?php
		$_input = end($this->global->formsStack)["employeeId"];
		echo $_input->getControlPart()->attributes() ?>></label>
    <p><input class="btn btn-brand"<?php
		$_input = end($this->global->formsStack)["register"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
    <p><label class="checkbox"<?php
		$_input = end($this->global->formsStack)["regAgree"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>    
            <p><input type="checkbox"<?php
		$_input = end($this->global->formsStack)["regAgree"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		))->attributes() ?>> I have read and agree to the <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:licence")) ?>">TERMS & CONDITIONS OF THE T-SYSTEMS SLOVAKIA.</a> 
    </label>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?></form>
        
</div>
     
 





<?php
	}


	function blockHead($_args)
	{
?><style>
    
background {
    background-image:url("../../images/cbc2.jpg");
    border: 2px solid black;
    
      background-repeat:no-repeat; 
      background-size:100% 100%;
    
}

   
</style>
<?php
	}

}
