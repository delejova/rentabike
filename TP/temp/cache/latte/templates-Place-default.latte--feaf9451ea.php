<?php
// source: C:\wamp\www\TP\app/templates/Place/default.latte

use Latte\Runtime as LR;

class Templatefeaf9451ea extends Latte\Runtime\Template
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


<h1>Choose your place:</h1>

<h4>Important notice!</h4>

Place of renting the bike must be the same place of its returning. :)
<br>(When you rent the bike from CBC, you must return this bike on CBC.
<br>When you rent the bike from Tesla, you must return this bike on Tesla.)
<br>(nemam sajnu ci to je napisane spravne :D, ale treba tu napisat par viet aby to nebola len obrazovka s 2 tlacidlami)

<?php
		/* line 15 */ $_tmp = $this->global->uiControl->getComponent("placeFormCBC");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
		/* line 16 */ $_tmp = $this->global->uiControl->getComponent("placeFormTesla");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>




<?php
	}

}
