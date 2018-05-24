<?php
// source: C:\wamp\www\TP\app/templates/Sign/profil.latte

use Latte\Runtime as LR;

class Template38de92b2a4 extends Latte\Runtime\Template
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
?>Profil pouzivatela. <br>
Si prihlaseny ako </b>.</p>
<?php
	}

}
