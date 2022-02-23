<?php
if(!isset($_GET['f']) || !(strcmp($_GET['f'],'243432dfsdfdSDDF')==0))
	header("HTTP/1.0 404 Not Found");

$config = [
	"sftp_server" 		=> "aisolutions.stackstorage.com",
	"sftp_user" 		=> "sftpaix@aisolutions.stackstorage.com",
	"sftp_pass"			=> "COU9gsUhRRxNF8G1mv-CSPamH_M",
	"db_host"			=> "localhost",
	"db_name"			=> "laravel",
	"db_user"			=> "laravel_user",
	"db_pass"			=> "opKTwafMTBcbu4P1",
];



require __DIR__ . './../../vendor/autoload.php';
require 'Tar.php';

use phpseclib\Net\SFTP;
use Ifsnop\Mysqldump as IMysqldump;

define('NET_SFTP_LOGGING', SFTP::LOG_COMPLEX);

function sendToSftp($filename){
	global $config;
	
	$sftp = new SFTP('aisolutions.stackstorage.com');
	if (!$sftp->login('sftpaix@aisolutions.stackstorage.com', 'COU9gsUhRRxNF8G1mv-CSPamH_M')) {
		exit('Login Failed');
	}

	echo "\nUploading file: " . $filename;
	var_dump($sftp->put('BACKUP/' . basename($filename), $filename, SFTP::SOURCE_LOCAL_FILE));
}
function getDirContents($dir, &$results = array()){
    $files = scandir($dir);

    foreach($files as $key => $value){
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
        if(!is_dir($path)) {
            $results[] = $path;
        } else if($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}

if(isset($_GET['daily'])){
	require('phpmybackup.php');
	$db = new MYSQL_DUMP;
	$db->dbhost = 'localhost';
	$db->dbuser = 'laravel_user';
	$db->dbpwd = 'opKTwafMTBcbu4P1';
	$db->backupsToKeep = 35;
	$db->showDebug = true;
	$db->backupDir = '/var/www/aisolutions/backups/';
	$db->includeDatabases = ['laravel'];
	$db->emptyTables = ['largedb.large_table1','largedb.cachetable'];
	$db->dumpDatabases();
	
	$backfile = './../backups/' . 'inc-' . date('Y-m-d') . '.tar.xz';
	sendToSftp($backfile);
	
	$obj = new Archive_Tar('/var/www/backups/files/files-' . date('Y-m-d') . '.tar.gz', 'gz');
	$path = '/var/www/aisolutions/';
	$files = getDirContents($path);
	if ($obj->create($path))
	 {
		echo 'success files';
		sendToSftp('/var/www/backups/files/files-' . date('Y-m-d') . '.tar.gz');
	 }
	else
	 {
		echo 'fail files';
	 }
}

if(isset($_GET['weekly'])){
	
	try {
		$dumpSettings = array(
			'compress' => IMysqldump\Mysqldump::GZIP
		);
		$dump = new IMysqldump\Mysqldump('mysql:host=localhost;dbname=' . $config['db_name'], $config['db_user'], $config['db_pass'], $dumpSettings);
		$filename = './../backups/full-' . date('Y-m-d') . '.gz';
		$dump->start($filename);
		sendToSftp($filename);
		echo 'dump complete';
	} catch (\Exception $e) {
		echo 'mysqldump-php error: ' . $e->getMessage();
	}
	
	$obj = new Archive_Tar('/var/www/backups/files/weekly-' . date('Y-m-d') . '.tar.gz', 'gz');
	$path = '/var/www/aisolutions/';
	$files = getDirContents($path);
	if ($obj->create($path))
	 {
		echo 'success files';
		sendToSftp('/var/www/backups/files/weekly-' . date('Y-m-d') . '.tar.gz');
	 }
	else
	 {
		echo 'fail files';
	 }
}