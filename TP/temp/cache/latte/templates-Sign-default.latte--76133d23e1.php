<?php
// source: C:\xampp\htdocs\projektT\app/templates/Sign/default.latte

use Latte\Runtime as LR;

class Template76133d23e1 extends Latte\Runtime\Template
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

Jeeeej - pouzivatelsky profil
Si prihlaseny ako <b><?php echo LR\Filters::escapeHtmlText($username) /* line 4 */ ?></b>.</p>

<h1><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:logout")) ?>">Odhlásit</a></h1>

<?php
	}

}
