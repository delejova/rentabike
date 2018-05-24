<?php
// source: C:\xampp\htdocs\projektT\app/templates/User/default.latte

use Latte\Runtime as LR;

class Templatec5105657da extends Latte\Runtime\Template
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
		if (isset($this->params['us'])) trigger_error('Variable $us overwritten in foreach on line 11');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
Toto je testovanie pre User:
<br>
Tlacidlo na testovanie vlozenie do tabulky pouzivatela
<?php
		/* line 7 */ $_tmp = $this->global->uiControl->getComponent("addUserForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>


Vypis celej tabulky pouzivatelov:
<?php
		$iterations = 0;
		foreach ($user as $us) {
?>
<tr>
	<td><?php echo LR\Filters::escapeHtmlText($us->id) /* line 13 */ ?></td>
        <td><?php echo LR\Filters::escapeHtmlText($us->first_name) /* line 14 */ ?></td>
        <td><?php echo LR\Filters::escapeHtmlText($us->last_name) /* line 15 */ ?></td>
        <td><?php echo LR\Filters::escapeHtmlText($us->email) /* line 16 */ ?></td>
</tr>
<?php
			$iterations++;
		}
		
	}

}
