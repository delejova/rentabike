<?php
// source: /home/gs011800/sub_generacia.xyz/hipsteri-test/app/templates/Sign/login.latte

use Latte\Runtime as LR;

class Template0c12ebd017 extends Latte\Runtime\Template
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
?>

<?php
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
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
  
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:register")) ?>">Sign Up</a></li>
            <li><a href="#">I forget my password</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div align="center">
    <img src="images/bike.png" class="img-responsive img-circle">
</div>
  
<h1>
    <strong> Rent a bike </strong>  
</h1>

<p>
<div align="center">
<?php
		/* line 26 */ $_tmp = $this->global->uiControl->getComponent("loginForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>
</p>
<!--
<form>
    <div class="checkbox">
        <label>
            <input type="checkbox">
            I agree with....
        </label>
    </div>
 </form>
-->
</div>

<?php
	}


	function blockHead($_args)
	{
		extract($_args);
?>
<style>
	body {
	background: #808080;
	color: #333;
	text-align: center;
	font-family: sans-serif;
}


h1 {
    font-family: 'Lobster', cursive;
	font-size: 80px;

	font-weight: 500;
	line-height: 157.4px;
	background: #E20074;
	color: #fff;
}

table {

}

img {

	width: 150px;
    height: 100px;
    position: relative; 
    top: 0px; 

 }

 form{
 	width: 30%;
 	margin: 40px;
 }

 p{
 	
 
 	margin: 20;
 	

 }

 label {
 	margin: 10px;
 }
</style>
<?php
	}

}
