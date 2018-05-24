<?php
// source: C:\xampp\htdocs\TP\app/templates/Receptionist/default.latte

use Latte\Runtime as LR;

class Template2e2b745553 extends Latte\Runtime\Template
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
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 40');
		if (isset($this->params['rentt'])) trigger_error('Variable $rentt overwritten in foreach on line 55');
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
          <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Profil:default")) ?>"><span class="sr-only">Back</span>
                  <span class="icon icon-scroll-left"></span></a></li>
          
        </ul>
      </div>
    </div>
  </nav>
</header>
    
<div align="center">
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?><div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 40 */ ?></div>   
<?php
			$iterations++;
		}
?>
<h4>Manage Reservations</h4>
<table border="1">

    <tr> 
        <th> ID employee</th>
        <th> First name</th>
        <th> Last name</th>
        <th> Bike number</th>
        <th> Bike name</th>
        <th> Book start</th>
        <th> Book end</th>
        <th> Rent </th>
        <th> Action </th>
    </tr>
<?php
		$iterations = 0;
		foreach ($rent as $rentt) {
			?>        <!--    <br>Id bike:<?php echo LR\Filters::escapeHtmlComment($rentt->id_bike) /* line 56 */ ?>

            <br>ID user:<?php echo LR\Filters::escapeHtmlComment($rentt->id_user) /* line 57 */ ?>

        -->
        <tr>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->id_employee) /* line 60 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->first_name) /* line 61 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->last_name) /* line 62 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->bike_number) /* line 63 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->bike_name) /* line 64 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->book_start) /* line 65 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->book_end) /* line 66 */ ?> </td>
            <td> <?php echo LR\Filters::escapeHtmlText($rentt->rent_status) /* line 67 */ ?> </td>
            <td>
<?php
			/* line 69 */ $_tmp = $this->global->uiControl->getComponent("wasRentedButton-$rentt->id");
			if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
			$_tmp->render();
?>
            </td>
        </tr>
        <!--    <br>Rent start:<?php echo LR\Filters::escapeHtmlComment($rentt->rent_start) /* line 72 */ ?>

            <br>Rent end:<?php echo LR\Filters::escapeHtmlComment($rentt->rent_end) /* line 73 */ ?> -->

<?php
			$iterations++;
		}
?>

</table>
        

    <br>        
    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:login")) ?>">Back</a> 
</div>





<script>
 $(document).ready( function(){
        $("input[name=rent]").addClass("btn btn-all");
        $("input[name=return]").addClass("btn btn-all");
         $("form").find("th").remove();
    });
</script>

<?php
	}


	function blockHead($_args)
	{
?><style>
  
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
    
    </style><?php
	}

}
