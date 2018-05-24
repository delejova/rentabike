<?php
// source: C:\xampp\htdocs\projektT\app/templates/Sign/login.latte

use Latte\Runtime as LR;

class Template2e0dbffb70 extends Latte\Runtime\Template
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
?>

<?php
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
Prihlasenie

<?php
		/* line 6 */ $_tmp = $this->global->uiControl->getComponent("loginForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

<p>Ak este nemas ucet, <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:register")) ?>">zaregistruj sa</a>.</p>
<?php
	}

}
