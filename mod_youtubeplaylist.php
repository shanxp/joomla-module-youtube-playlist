<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
// Include the syndicate functions only once
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
require_once( dirname(__FILE__).'/helper.php' );
 
$playlist = modYoutubePlaylist::getPlaylist($params);

require JModuleHelper::getLayoutPath('mod_youtubeplaylist') ;

?>