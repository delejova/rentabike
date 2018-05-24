<?php
// source: C:\xampp\htdocs\TP\app/templates/Forgot/changepswd.latte

use Latte\Runtime as LR;

class Templatee4bd6f228d extends Latte\Runtime\Template
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
		?> <?php
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
         <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 9 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo" data-pin-nopin="true" style="
    height: 50px;">
      
      <span class="sr-only">Telekom Logo</span>
      </div>
      <div class="brand-claim">
        <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:login")) ?>"><h1><strong> Rent a bike </strong></h1></a>
        <span class="sr-only">Rent a bike</span>
      </div>
    </div>
  </div>
    
    <nav class="navbar navbar-default" style="
    margin-bottom: 0px;">
    <div class="container-fixed">
      
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
           
            <ul class="nav navbar-nav navbar-nav-icons navbar-right">
                  <li><a href="/TP/www/profil/"><span class="sr-only">My Profile</span>
                  <span class="icon icon-my-profile"></span></a></li>
                  <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:logout")) ?>">Log out</a></li>
                  <li><a href="/TP/www/place/">Back</a></li>
           
            </ul>
        </div>
      
    </div>
  </nav>

</header>
    
    <div aling:center>
    
<h4>Change password</h4>

<?php
		if ($resetPassword) {
?><div>
    
    <h3>Welcome <?php echo LR\Filters::escapeHtmlText($firstName) /* line 48 */ ?> <?php echo LR\Filters::escapeHtmlText($lastName) /* line 48 */ ?> </h3> 
        <br>
        <br>
<?php
			$form = $_form = $this->global->formsStack[] = $this->global->uiControl["changeForgotPasswordForm"];
			?>        <form class=form<?php
			echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
			'class' => NULL,
			), FALSE) ?>>
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
    <p><input class="btn btn-brand"<?php
			$_input = end($this->global->formsStack)["changePswd"];
			echo $_input->getControlPart()->addAttributes(array (
			'class' => NULL,
			))->attributes() ?>>
        
<?php
			echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>    </form> 
        
   
</div>
<?php
		}
?>
    </div>
        
<footer class="brand-footer">
  <div class="container-fixed">
    <div class="row brand-footer-bar hidden-xl hidden-l hidden-m">
      <div class="col-l-3 col-m-2 col-s-12">
        <div class="brand-logo">
          <a href="#">
            <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 68 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo">
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
            <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 87 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo">
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
