<?php
// source: C:\wamp\www\TP\app/templates/Receptionist/default.latte

use Latte\Runtime as LR;

class Templatec6dd3406db extends Latte\Runtime\Template
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
		if (isset($this->params['rentt'])) trigger_error('Variable $rentt overwritten in foreach on line 16');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<h1>Receptionist</h1>
<table border="1">

    <tr> 
        <th> ID employee</th>
        <th> First name</th>
        <th> Last name</th>
        <th> Book start</th>
        <th> Book end</th>
        <th> Rent </th>
        <th> Action </th>
    </tr>
<?php
		$iterations = 0;
		foreach ($rent as $rentt) {
			?>        <!--    <br>Id bike:<?php echo LR\Filters::escapeHtmlComment($rentt->id_bike) /* line 17 */ ?>

            <br>ID user:<?php echo LR\Filters::escapeHtmlComment($rentt->id_user) /* line 18 */ ?>

        -->
        <tr>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->id_employee) /* line 21 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->first_name) /* line 22 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->last_name) /* line 23 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->book_start) /* line 24 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->book_end) /* line 25 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->rent_status) /* line 26 */ ?> </td>
            <td>
               
<?php
			/* line 29 */ $_tmp = $this->global->uiControl->getComponent("wasRentedButton-$rentt->id");
			if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
			$_tmp->render();
?>
            </td>
        </tr>
        <!--    <br>Rent start:<?php echo LR\Filters::escapeHtmlComment($rentt->rent_start) /* line 32 */ ?>

            <br>Rent end:<?php echo LR\Filters::escapeHtmlComment($rentt->rent_end) /* line 33 */ ?> -->

<?php
			$iterations++;
		}
?>

</table>
<!--b.id,
b.bike_number	    ,
b.place	        ,
b.status	        ,
b.last_return	    ,
b.id_bike_type,
bt.bike_name,
bt.photo_filename,
bt.color,--><?php
	}

}
