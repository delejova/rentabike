<?php
// source: C:\xampp\htdocs\projektT\app/templates/Place/tesla.latte

use Latte\Runtime as LR;

class Template43c95b3aec extends Latte\Runtime\Template
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
		if (isset($this->params['bike'])) trigger_error('Variable $bike overwritten in foreach on line 7');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>



<?php
		$iterations = 0;
		foreach ($bikesTesla as $bike) {
?>
       <table border="5">
<tr>
    <td><b>place</b> : <?php echo LR\Filters::escapeHtmlText($bike->place) /* line 10 */ ?></td>
	<td><b>bike mumber</b> : <?php echo LR\Filters::escapeHtmlText($bike->bike_number) /* line 11 */ ?></td>
	<td><b>bike name</b> : <?php echo LR\Filters::escapeHtmlText($bike->bike_name) /* line 12 */ ?></td>
</tr>
    </table>
<?php
			$iterations++;
		}
		
	}

}
