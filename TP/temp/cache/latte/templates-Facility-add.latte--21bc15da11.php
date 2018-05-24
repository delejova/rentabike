<?php
// source: C:\xampp\htdocs\TP\app/templates/Facility/add.latte

use Latte\Runtime as LR;

class Template21bc15da11 extends Latte\Runtime\Template
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
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 39');
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
          <a href="/TP/www/profil/"><img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 8 */ ?>/images/deutsche-telekom-logo.svg" alt="Telekom Logo" data-pin-nopin="true" style="height: 50px;"></a>
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
		echo LR\Filters::escapeHtmlText($email) /* line 27 */ ?></a></li>
         <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Facility:default")) ?>"><span class="sr-only">Back</span>
                  <span class="icon icon-scroll-left"></span></a></li>  
         <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Sign:logout")) ?>">Log out</a></li>
            
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
			echo LR\Filters::escapeHtmlText($flash->message) /* line 39 */ ?></div>
<?php
			$iterations++;
		}
?>
<h4> Add bike of existing type</h4>
<br>
<?php
		/* line 42 */ $_tmp = $this->global->uiControl->getComponent("addNewForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>



<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["addNewType"];
		?><form class=form style="padding-left: 200px;"<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		'style' => NULL,
		), FALSE) ?>>
    <p><input class="btn btn-brand"<?php
		$_input = end($this->global->formsStack)["add_new_type"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?></form>





</div>



    

 <script>
 $(document).ready( function(){
        $("label[name=edit]").addClass("form");
        $("input[name=add]").addClass("btn btn-all");
      
    });
</script>


<?php
	}


	function blockHead($_args)
	{
		extract($_args);
?>


<style>
    
    label {
    text-align: right;
    width: 100%;
    padding: 10px;
}

th {
    width: 200px;
}


 @media screen and (max-width: 700px){
    
     input.btn.btn-brand.form-input{
         width: 90%!important;
         text-align: center;
      
     }
     
    form{
            padding-left:0px!important;
            
        }
     
     
    td{
         padding-top: 15px;
         text-align: center!important;
     }
     
     
     
     table{
         margin-left:65px!important;
         
     }
     
     select{
         width:100%;
     }
     
     th,td{
         
         width: 80%!important;
         display: block;
         
         
         
     }
     
     label{
         text-align: center!important;
         width: 80%;
     }
     
     
     
     
 }
</style>



<?php
	}

}
