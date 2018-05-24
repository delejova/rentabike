<?php
// source: C:\xampp\htdocs\TP\app/templates/Profil/default.latte

use Latte\Runtime as LR;

class Templatee0ac0ee246 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'head' => 'blockHead',
	];

	public $blockTypes = [
		'content' => 'html',
		'head' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>


<?php
		$this->renderBlock('head', get_defined_vars());
?>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 41');
		if (isset($this->params['reservedBike'])) trigger_error('Variable $reservedBike overwritten in foreach on line 72');
		if (isset($this->params['rentedBike'])) trigger_error('Variable $rentedBike overwritten in foreach on line 149');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>

<header class="brand-header">
  <div class="brandbar">
    <div class="container-fixed">
      <div class="brand-logo">
        <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 9 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo" data-pin-nopin="true" style="height: 50px;">
        <span class="sr-only">Telekom Logo</span>
      </div>
      <div class="brand-claim">
        <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:login")) ?>"><h1><strong> Rent a bike </strong></h1></a>
        <span class="sr-only">Rent a bike</span>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-default" style="margin-bottom: 0px;">
    <div class="container-fixed">
      <div class="navbar-expanded">

        </div>
      </div>
      <div class="navbar-persistent">

        <ul class="nav navbar-nav navbar-nav-icons navbar-right">
            
            <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Profil:default")) ?>"><?php
		echo LR\Filters::escapeHtmlText($email) /* line 28 */ ?></a></li>
           <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:logout")) ?>">Log out</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
          
           



<div align="center"> <br>
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>    <div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 41 */ ?></div>
<?php
			$iterations++;
		}
?>

  
<h2><strong> <?php echo LR\Filters::escapeHtmlText($fisrtName) /* line 44 */ ?> <?php echo LR\Filters::escapeHtmlText($lastName) /* line 44 */ ?> </h2>


                
    

     <h4>  Reservations </h4>
<?php
		if ($reservedBikes) {
?>
        
        
                <div class="table-responsive">
                 <table class="table">


                <table border="1">
                    <tr> 
                        <!--<th> ID employee</th>-->
<!--                        <th> First name</th>
                        <th> Last name</th>-->
                        <th> Bike number</th>
                        <th> Bike name</th>
                        <th> Book start</th>
                        <th> Book end</th>
                        <!--<th> Status rent </th>-->
                        <!--<th> Status bike</th>-->
                        <th> Action </th>
                        <th> Action </th>
                    </tr>
<?php
			$iterations = 0;
			foreach ($reservedBikes as $reservedBike) {
?>
                        <tr>
                            <!--<td>  </td>-->
<!--                            <td>  </td>
                            <td>  </td>-->
                            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->bike_number) /* line 77 */ ?> </td>
                            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->bike_name) /* line 78 */ ?> </td>
                            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->book_start) /* line 79 */ ?> </td>
                            <td> <?php echo LR\Filters::escapeHtmlText($reservedBike->book_end) /* line 80 */ ?> </td>
                            <!--<td>  </td>-->
                            <!--<td>  </td>-->
                           
                            <td>
                                <button type="button"  class="btn btn-all" data-toggle="modal" data-target="#myModal">delete</button>

                            </td>
                            <td>
                                <?php
				/* line 89 */ $_tmp = $this->global->uiControl->getComponent("editRentButton-$reservedBike->id");
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
                    <br>
            </div>
                    
       
<?php
			$form = $_form = $this->global->formsStack[] = $this->global->uiControl["placeFormDefault"];
			?>        <form class=form<?php
			echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
			'class' => NULL,
			), FALSE) ?>>
            <p><input class="btn btn-brand"<?php
			$_input = end($this->global->formsStack)["rezervovat"];
			echo $_input->getControlPart()->addAttributes(array (
			'class' => NULL,
			))->attributes() ?>>
<?php
			echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>        </form>

  <div id="myModal" class="modal" role="dialog">
  <div class="modal-dialog">

   
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Warning!</h4>
      </div>
      <div class="modal-body">
        <p>Are you really sure you want to delete a bike?</p>
      </div>
      <div class="modal-footer">
          <?php
			/* line 115 */ $_tmp = $this->global->uiControl->getComponent("deleteRentButton-$reservedBike->id");
			if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
			$_tmp->render();
?><br>
        <button type="button" class="btn btn-brand" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>


<?php
		}
		else {
?>
        <br> <br> <br>
        <strong> You don't have any reserved bikes. </strong><br><br><br>
<?php
			$form = $_form = $this->global->formsStack[] = $this->global->uiControl["placeFormDefault"];
			?>        <form class=form<?php
			echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
			'class' => NULL,
			), FALSE) ?>>
            <p><input class="btn btn-brand"<?php
			$_input = end($this->global->formsStack)["rezervovat"];
			echo $_input->getControlPart()->addAttributes(array (
			'class' => NULL,
			))->attributes() ?>>
<?php
			echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>        </form>
<?php
		}
?>

<?php
		if ($rentedBikes) {
?>
        <h4>  Bookings </h4>
        <div class="table-responsive">
            <table class="table">
                <table border="1">
                    <tr> 
                        <!--<th> ID employee</th>-->
<!--                        <th> First name</th>
                        <th> Last name</th>-->
                        <th> Bike number</th>
                        <th> Bike name</th>
                        <th> Book start</th>
                        <th> Book end</th>
                        <!--<th> Status rent</th>-->
                        <!--<th> Status bike</th>-->
                        <th> Rent start </th>
                    </tr>
<?php
			$iterations = 0;
			foreach ($rentedBikes as $rentedBike) {
?>
                        <tr>
                            <!--<td>  </td>-->
<!--                            <td>  </td>
                            <td>  </td>-->
                            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->bike_number) /* line 154 */ ?> </td>
                            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->bike_name) /* line 155 */ ?> </td>
                            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->book_start) /* line 156 */ ?> </td>
                            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->book_end) /* line 157 */ ?> </td>
                            
                            

                            <!--<td>  </td>-->
                            <!--<td>  </td>-->
                            <td> <?php echo LR\Filters::escapeHtmlText($rentedBike->rent_start) /* line 163 */ ?> </td>
                        </tr>
<?php
				$iterations++;
			}
?>
                </table>

        </div>
<?php
		}
		else {
		}
?>



<?php
		if ($admin) {
?>    <div>
        <br><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Receptionist:")) ?>">MANAGE RESERVATIONS</a> <br>
        <br><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Facility:")) ?>">MANAGE BIKES</a>
        <br>
    </div>
<?php
		}
?>

<?php
		if ($receptionist) {
?>    <div>
        <br><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Receptionist:")) ?>">MANAGE RESERVATIONS</a>
        <br>
    </div>
<?php
		}
?>
    <br>
<?php
		if ($employee) {
?>    <div>
        <br>
    </div>
<?php
		}
?>
    <br>
<?php
		if ($facility) {
?>    <div>
        <br><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Facility:")) ?>">MANAGE BIKES</a>
    </div>
<?php
		}
?>



</div>





<script>
 $(document).ready( function(){
        $("input[name=edit]").addClass("btn btn-all");
        $("input[name=delete]").addClass("btn btn-all");
        $("input[name=delete]").attr("data-toggle", "modal");
        $("input[name=delete]").attr("data-target", "#myModal");
        $("form").find("th").remove();
    });
</script>
                        
<?php
	}


	function blockHead($_args)
	{
?><style>
  
   
    
    h4{
        margin-top: 30px;
        padding-bottom: 0px;
    }

         td {
    border: 0px solid rgb(75,75,75);
    }
    
    th{
        border: transparent;
    }
    
    th {
    background-color: #e20074;
    color: #fff;
   
    } 
    
    th, td {
    border-bottom: 1px solid rgb(75,75,75);
}
     
    
</style>
<?php
	}

}
