<?php
// source: C:\xampp\htdocs\projektT\app\presenters/templates/User/default.latte

use Latte\Runtime as LR;

class Template37adc51722 extends Latte\Runtime\Template
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
Toto je testovanie pre User:
<br>
Tlacidlo na testovanie vlozenie do tabulky pouzivatela
<?php
		/* line 7 */ $_tmp = $this->global->uiControl->getComponent("addUserForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

<?php
	}

}
