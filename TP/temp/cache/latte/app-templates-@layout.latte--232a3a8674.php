<?php
// source: C:\xampp\htdocs\TP\app/templates/@layout.latte

use Latte\Runtime as LR;

class Template232a3a8674 extends Latte\Runtime\Template
{
	public $blocks = [
		'scripts' => 'blockScripts',
		'head' => 'blockHead',
	];

	public $blockTypes = [
		'scripts' => 'html',
		'head' => 'html',
	];


	function main()
	{
		extract($this->params);
?>

 <!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 8 */ ?>/css/bootstrap-responsive-min.css">
    
    <title><?php
		if (isset($this->blockQueue["title"])) {
			$this->renderBlock('title', $this->params, function ($s, $type) {
				$_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($_fi, 'html', $this->filters->filterContent('striphtml', $_fi, $s));
			});
			?> | <?php
		}
?>Rent a Bike</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('scripts', get_defined_vars());
?>
   
    <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 31 */ ?>/css/components.min.css">
    
     <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 33 */ ?>/css/bootstrap-datetimepicker.min.css">
   
     <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 35 */ ?>/css/customstyle.css">
    
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    
    <link rel="shortcut icon" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 39 */ ?>/favicon.ico" type="image/x-icon">
   

     
          
    
    <?php
		$this->renderBlock('head', get_defined_vars());
?>
    
</head>
<body>


   

<?php
		$this->renderBlock('content', $this->params, 'html');
?>
<script >
     $(document).ready( function(){
        $("form").addClass("form-input-set");
        $("input").addClass("form-input");
        $("#frm-loginForm-expiration").addClass("form-checkbox-js");
        $("#frm-loginForm-expiration").removeClass("form-input");
        
        $("#frm-loginForm-expiration").click( function(){
            $(this).toggleClass("checked");
        });
        $("#frm-registerForm-regAgree").removeClass("form-input");
        $("#frm-registerForm-regAgree").addClass("form-checkbox-js");
        $("#frm-registerForm-regAgree").click( function(){
            $(this).toggleClass("checked");
        });
        
        

    });
            
    
 
</script>

<!--<script>
$('#modal-init-demo').on('show.tc.modal', function (event) {
  var $button = $(event.relatedTarget) ;
  var value = $button.data('init-value') ;


  var $modal = $(this);
  $modal.find('input[name="text-modal"]').val(value);
});


$('form[name="exampleModalForm3"]').on('submit', function (event) {
  event.preventDefault() ;

  var $modal = $('#modal-init-demo');
  $modal.modal('hide');

  var $form = $(this);
  alert($form.serialize()) ;
});
</script>-->




</body>
</html>
 
 



<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://nette.github.io/resources/js/netteForms.min.js"></script>
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 26 */ ?>/js/components.min.js"></script>
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 27 */ ?>/js/bootstrap-datetimepicker.min.js"></script>
    
<?php
	}


	function blockHead($_args)
	{
		
	}

}
