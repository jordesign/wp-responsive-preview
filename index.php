
<!DOCTYPE html>
<html>
<?php //Get URL Parameter
	$src = (empty($_GET['url'])) ? 'http://jordesign.com' : addslashes(filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL));
?>
<head>
    <title>Responsive Preview: <?php echo $src; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="styles.css" media="all" />
</head>
<body>

<!--iFrame-->
<div id="tools">
    <h1>Responsive Preview</h1>
    <p>Select a size range to preview your page at.</p>
    <ul class="nav size" id="nav">
    	<li><a href="#" id="size-toggle" class="active">Size</a></li>
    	<li><a href="#" id="size-s">S</a></li>
    	<li><a href="#" id="size-m">M</a></li>
    	<li><a href="#" id="size-l">L</a></li>
    	<li><a href="#" id="size-xl">XL</a></li>
    	<li><a href="#" id="size-random">Random</a></li>
    </ul>

</div>
<div id="vp-wrap"><iframe id="viewport" src="<?php echo $src; ?>"></iframe></div>
<!--end iFrame-->


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<script type="text/javascript" src="js/init.js "></script>
</body>
</html>