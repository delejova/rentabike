<?php
// source: C:\xampp\htdocs\TP\app/templates/Sign/default.latte

use Latte\Runtime as LR;

class Templatea825b74cc6 extends Latte\Runtime\Template
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

Profil pouzivatela. <br>
Si prihlaseny ako <b><?php echo LR\Filters::escapeHtmlText($email) /* line 4 */ ?></b>.</p>
<p>
    ID y tabulky: <?php echo LR\Filters::escapeHtmlText($idcko) /* line 6 */ ?>

Meno: <?php echo LR\Filters::escapeHtmlText($fisrtName) /* line 7 */ ?>

Priezvisko: <?php echo LR\Filters::escapeHtmlText($lastName) /* line 8 */ ?>

Zamestanec ID: <?php echo LR\Filters::escapeHtmlText($employeeId) /* line 9 */ ?>

Mail: <?php echo LR\Filters::escapeHtmlText($email) /* line 10 */ ?>

Status: <?php echo LR\Filters::escapeHtmlText($status) /* line 11 */ ?>


</p>

<b><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:logout")) ?>">Odhlásit</a></b>

<br><br>
Tvoje bycikle:
<br>

<b><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Place:")) ?>">Zarezervovat</a></b>
<?php
		/* line 22 */ $_tmp = $this->global->uiControl->getComponent("placeFormDefault");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

<br>
<?php
		if (!$admin) {
?><p>Nesi admin.</p>
<?php
		}
		if ($admin) {
?><p>Si admin.</p>
<?php
		}
		if ($receptionist) {
?><p>Si receptionist.</p>
<?php
		}
		if ($employee) {
?><p>Si employee.</p>
<?php
		}
		if ($facility) {
?><p>Si facility.</p>
<?php
		}
?>

 <br><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Facility:")) ?>">FACILITY</a></b>
    <br><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Receptionist:")) ?>">RECEPTIONIST</a></b><?php
	}

}
