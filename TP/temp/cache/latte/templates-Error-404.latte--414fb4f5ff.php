<?php
// source: C:\xampp\htdocs\TP\app\presenters/../templates/Error/404.latte

use Latte\Runtime as LR;

class Template414fb4f5ff extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'title' => 'blockTitle',
		'head' => 'blockHead',
	];

	public $blockTypes = [
		'content' => 'html',
		'title' => 'html',
		'head' => 'html',
	];


	function main()
	{
		extract($this->params);
?>

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		$this->renderBlock('head', get_defined_vars());
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


<?php
		$this->renderBlock('title', get_defined_vars());
?>



<h2 style="
    margin-top: 150px;
">The page you requested could not be found. It is possible that the address is
    incorrect,<br> or that the page no longer exists. Please use a search engine to find
what you are looking for.</h2>
<br>
<p><h5><strong>error 404</strong></h5></p>

<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?><h6 styl >Page Not Found</h6>
<?php
	}


	function blockHead($_args)
	{
		
	}

}
