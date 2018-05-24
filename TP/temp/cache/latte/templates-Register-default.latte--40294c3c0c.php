<?php
// source: C:\xampp\htdocs\projektT\app/templates/Register/default.latte

use Latte\Runtime as LR;

class Template40294c3c0c extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		?>c<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
