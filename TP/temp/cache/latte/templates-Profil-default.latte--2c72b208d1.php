<?php
// source: C:\wamp\www\TP\app/templates/Profil/default.latte

use Latte\Runtime as LR;

class Template2c72b208d1 extends Latte\Runtime\Template
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
		if (isset($this->params['reservedBike'])) trigger_error('Variable $reservedBike overwritten in foreach on line 26');
		if (isset($this->params['rentedBike'])) trigger_error('Variable $rentedBike overwritten in foreach on line 64');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<h1> Profil </h1>
<p>Usermail: <b><?php echo LR\Filters::escapeHtmlText($email) /* line 3 */ ?></b>
    <br> Name:<b> <?php echo LR\Filters::escapeHtmlText($fisrtName) /* line 4 */ ?> <?php echo LR\Filters::escapeHtmlText($lastName) /* line 4 */ ?> </b>
    <br> Employee ID: <b><?php echo LR\Filters::escapeHtmlText($employeeId) /* line 5 */ ?> </b>
    </p>


<b><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:logout")) ?>">Odhlásit</a></b>

<h1>  My reserved  bikes </h1>
<table border="1">
    <tr> 
        <th> ID employee</th>
        <th> First name</th>
        <th> Last name</th>
        <th> Bike number</th>
        <th> Bike name</th>
        <th> Book start</th>
        <th> Book end</th>
        <th> Status rent </th>
        <th> Status bike</th>
        <th> Action </th>
        <th> Action </th>
    </tr>
<?php
		$iterations = 0;
		foreach ($reservedBikes as $reservedBike) {
?>
        <tr>
            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->id_employee) /* line 28 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->first_name) /* line 29 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->last_name) /* line 30 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->bike_number) /* line 31 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->bike_name) /* line 32 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->book_start) /* line 33 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->book_end) /* line 34 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->rent_status) /* line 35 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->bike_status) /* line 36 */ ?> </td>
            <td>
                 <?php
			/* line 38 */ $_tmp = $this->global->uiControl->getComponent("deleteRentButton-$reservedBike->id");
			if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
			$_tmp->render();
?> <!--  prenasa sa rent id-->
            </td>
            <td>
                 <?php
			/* line 41 */ $_tmp = $this->global->uiControl->getComponent("editRentButton-$reservedBike->id");
			if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
			$_tmp->render();
?> <!--  prenasa sa rent id-->
            </td>
        </tr>
<?php
			$iterations++;
		}
?>
</table>

<b><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Place:")) ?>">New reservation</a></b>
<?php
		/* line 48 */ $_tmp = $this->global->uiControl->getComponent("placeFormDefault");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

<h1>  My rented bikes </h1>
<table border="1">
    <tr> 
        <th> ID employee</th>
        <th> First name</th>
        <th> Last name</th>
         <th> Bike number</th>
        <th> Bike name</th>
        <th> Book start</th>
        <th> Book end</th>
        <th> Status rent</th>
        <th> Status bike</th>
        <th> Rent start </th>
    </tr>
<?php
		$iterations = 0;
		foreach ($rentedBikes as $rentedBike) {
?>
        <tr>
            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->id_employee) /* line 66 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->first_name) /* line 67 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->last_name) /* line 68 */ ?> </td>
             <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->bike_number) /* line 69 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->bike_name) /* line 70 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->book_start) /* line 71 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->book_end) /* line 72 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->rent_status) /* line 73 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->bike_status) /* line 74 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->rent_start) /* line 75 */ ?> </td>
        </tr>
<?php
			$iterations++;
		}
?>
</table>


<h1> Role  (to sa odstrani) </h1>
<?php
		if (!$admin) {
?><div>Nesi admin.</div>
<?php
		}
		if ($admin) {
?><div>Si admin.
    <br><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Receptionist:")) ?>">RECEPTIONIST</a>
    <br><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Facility:")) ?>">FACILITY</a>
</div>
<?php
		}
		if ($receptionist) {
?><div>Si receptionist.
    <br><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Receptionist:")) ?>">RECEPTIONIST</a>
</div>
<?php
		}
		if ($employee) {
?><div>Si employee.
</div>
<?php
		}
		if ($facility) {
?><div>Si facility.
    <br><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Facility:")) ?>">FACILITY</a>
</div>
<?php
		}
		
	}

}
