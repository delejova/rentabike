<?php
// source: C:\wamp\www\TP\app/templates/Sign/changepswd.latte

use Latte\Runtime as LR;

class Templatee6de032a21 extends Latte\Runtime\Template
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

<p>
    Toto je link na zmenu hesla :) <br>
</p>

<?php
		if ($resetPassword) {
?><div>
    <p>
        Ty si používateľ: <?php echo LR\Filters::escapeHtmlText($firstName) /* line 9 */ ?> <?php echo LR\Filters::escapeHtmlText($lastName) /* line 9 */ ?>

        <br>
        Formular na zmenu hesla: <br>
<?php
			/* line 12 */ $_tmp = $this->global->uiControl->getComponent("changeForgotPasswordForm");
			if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
			$_tmp->render();
?>
    </p>
</div><?php
		}
		
	}

}
