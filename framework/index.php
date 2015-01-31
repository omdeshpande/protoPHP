<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('DS', DIRECTORY_SEPARATOR);
define('APPROOT', 'travel-smart');

function __autoload($class) {
	$ext = ".php";

	// Finding apprpriate class in the framework
	if(file_exists(ROOT.DS.APPROOT.DS."framework".DS."controllers".DS.$class.$ext)) {
		include_once ROOT.DS.APPROOT.DS."framework".DS."controllers".DS.$class.$ext;
	}
	else if(file_exists(ROOT.DS.APPROOT.DS."framework".DS."models".DS.$class.$ext)) {
		include_once ROOT.DS.APPROOT.DS."framework".DS."models".DS.$class.$ext;
	}
	else if(file_exists(ROOT.DS.APPROOT.DS."framework".DS."views".DS.$class.$ext)) {
		include_once ROOT.DS.APPROOT.DS."framework".DS."views".DS.$class.$ext;
	}
	else if(file_exists(ROOT.DS.APPROOT.DS."framework".DS."lib".DS.$class.$ext)) {
		include_once ROOT.DS.APPROOT.DS."framework".DS."lib".DS.$class.$ext;
	}
	else {
		echo "Wrong path";
	}
}

$app = new app($_SERVER['REQUEST_URI']);
$app->parseURL();
$app->loadController();
?>