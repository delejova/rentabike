<?php
// source: C:\wamp\www\TP\app/templates/Valid/validSuccess.latte

use Latte\Runtime as LR;

class Template1eea86360d extends Latte\Runtime\Template
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

<h1>Ďakujeme za registráciu.</h1>
<br>
Váš validačný kód je správny. <br>
Pre potvrdenie používania aplikácie <br>
sa prihláste ešte raz, prosím. <br> 
<br>

<b><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:logout")) ?>">Prihlásiť</a></b>
<?php
	}

}
