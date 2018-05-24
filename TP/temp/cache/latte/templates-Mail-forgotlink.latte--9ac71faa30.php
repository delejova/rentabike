<?php
// source: C:\wamp\www\TP\app\presenters/../templates/Mail/forgotlink.latte

use Latte\Runtime as LR;

class Template9ac71faa30 extends Latte\Runtime\Template
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
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Predmet mailu -->
        <title>Forgot password</title>

    </head>
    <body>
        <p>Dobrý den, <?php echo LR\Filters::escapeHtmlText($firstName) /* line 10 */ ?> <?php echo LR\Filters::escapeHtmlText($lastName) /* line 10 */ ?></p>

        <p>Tvoje heslo si mozes zmenit na tejto adrese: <br>

            <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("//Forgot:changepswd", [$token])) ?>">Odkaz na zmenu hesla</a>
        </p>
        <p>Vasi Hipstery ;)</p>
    </body>
</html>
<?php
	}

}
