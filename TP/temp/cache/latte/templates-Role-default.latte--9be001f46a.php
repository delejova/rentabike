<?php
// source: C:\xampp\htdocs\projektT\app/templates/Role/default.latte

use Latte\Runtime as LR;

class Template9be001f46a extends Latte\Runtime\Template
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
		if (isset($this->params['rola'])) trigger_error('Variable $rola overwritten in foreach on line 13');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>

Teraz vypisujem content Role; <br>
<br>
Vypis vsetkych prvkov pola:
<?php
		$iterations = 0;
		foreach ($role as $rola) {
?>
<tr>
	<td><?php echo LR\Filters::escapeHtmlText($rola->id) /* line 15 */ ?></td>
        <td><?php echo LR\Filters::escapeHtmlText($rola->role_name) /* line 16 */ ?></td>
</tr>
<?php
			$iterations++;
		}
?>

<br>
Skuska na insert: <br>
<?php
		/* line 25 */ $_tmp = $this->global->uiControl->getComponent("roleForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>
A tu je na vymazavanie: <br>
<?php
		/* line 27 */ $_tmp = $this->global->uiControl->getComponent("deleteForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>
Vyskusanie update: <br>
<?php
		/* line 29 */ $_tmp = $this->global->uiControl->getComponent("updateRoleForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

<?php
	}

}
