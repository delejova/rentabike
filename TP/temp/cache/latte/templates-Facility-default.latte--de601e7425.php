<?php
// source: C:\wamp\www\TP\app/templates/Facility/default.latte

use Latte\Runtime as LR;

class Templatede601e7425 extends Latte\Runtime\Template
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
<h1>FACILITY Stanove Oddelenie :D </h1>


<br><b><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Facility:add")) ?>">Pridat novy bike</a></b>
<br> <b><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Facility:existing")) ?>">Upravit existujuce biky</a></b>

<?php
	}

}
