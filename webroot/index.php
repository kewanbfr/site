<?php
$debut = microtime(true);

define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'core');
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));
define('WEBROOT_INVRS' , 'C:/wamp64/www/siteseul/webroot');

require(CORE.DS.'includes.php');
new Dispatcher();
echo 'test git';
?>

<?php if(Conf::$debug >= 1){ ?>
<div style="position:fixed;bottom:0; background: #900; color:#FFF; line-height:30px; height:30px; left:0; right:0; padding-left:10px;">
<?php echo 'Page générée en '.round(microtime(true) - $debut, 5).' secondes'; ?>
</div>
<?php } ?>

