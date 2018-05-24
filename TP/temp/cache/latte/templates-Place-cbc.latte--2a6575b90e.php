<?php
// source: C:\xampp\htdocs\projektT\app/templates/Place/cbc.latte

use Latte\Runtime as LR;

class Template2a6575b90e extends Latte\Runtime\Template
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
		if (isset($this->params['bike'])) trigger_error('Variable $bike overwritten in foreach on line 5');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>

<?php
		$iterations = 0;
		foreach ($bikesCBC as $bike) {
?>
    <table border="5">
        <tr>
            <td><b>place</b> : <?php echo LR\Filters::escapeHtmlText($bike->place) /* line 8 */ ?></td>
            <td><b>bike mumber</b> : <?php echo LR\Filters::escapeHtmlText($bike->bike_number) /* line 9 */ ?></td>
            <td><b>bike name</b> : <?php echo LR\Filters::escapeHtmlText($bike->bike_name) /* line 10 */ ?></td>
        </tr>
    </table>
<?php
			$iterations++;
		}
		
	}

}
