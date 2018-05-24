<?php
// source: C:\xampp\htdocs\projektT\app\presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Template01ea75e8d4 extends Latte\Runtime\Template
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
   
    <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 28 */ ?>/css/style.css">
    
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    
    <?php
		$this->renderBlock('head', get_defined_vars());
?>
    
</head>
<body>

<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?><div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 37 */ ?></div>
<?php
			$iterations++;
		}
?>

<?php
		$this->renderBlock('content', $this->params, 'html');
?>

</body>
</html>
 
 
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 37');
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
    <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 25 */ ?>/js/main.js"></script>
<?php
	}


	function blockHead($_args)
	{
		
	}

}
