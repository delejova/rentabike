<?php
// source: /home/gs011800/sub_generacia.xyz/hipsteri-test/app/templates/Place/default.latte

use Latte\Runtime as LR;

class Templatee9a6c63f26 extends Latte\Runtime\Template
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


Choose you place: 
<?php
		/* line 7 */ $_tmp = $this->global->uiControl->getComponent("placeFormCBC");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
		/* line 8 */ $_tmp = $this->global->uiControl->getComponent("placeFormTesla");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>




<?php
	}

}