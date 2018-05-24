<?php
// source: C:\wamp\www\TP\app/templates/Forgot/default.latte

use Latte\Runtime as LR;

class Templatee069bcf6bf extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
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

Zabudol si heslo: <br>
nevadiii.. <br>

<br>

<?php
		/* line 10 */ $_tmp = $this->global->uiControl->getComponent("forgotForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:login")) ?>">Naspat.</a><?php
	}

}
