<?php
// source: C:\xampp\htdocs\TP\app\presenters/../templates/Mail/forgotlink.latte

use Latte\Runtime as LR;

class Templateca67ce470c extends Latte\Runtime\Template
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
        <p>Dear user <strong><?php echo LR\Filters::escapeHtmlText($firstName) /* line 10 */ ?> <?php echo LR\Filters::escapeHtmlText($lastName) /* line 10 */ ?></strong>,</p>

        <p>Somebody has requested change of your password on the portal <a href="https://rentabike.generacia.xyz">https://rentabike.generacia.xyz</a>.<br></p>
        <p>In case, it was not you, please ignore this email.</p>
        <p>In case, you have requested such change, please follow the link: <br>
            <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("//Forgot:changepswd", [$token])) ?>"><?php
		echo LR\Filters::escapeHtmlText($this->global->uiControl->link("//Forgot:changepswd", [$token])) ?></a>
        </p>
        <p><div style="font-style: italic;">S pozdravom / Yours sincerely </div>
        <strong>Hipsteri</strong></p>
    <p><strong><div style="font-size: 11px;">This email has been automatically generated, please do not reply.</div></strong></p>
</body>
</html>
<?php
	}

}
