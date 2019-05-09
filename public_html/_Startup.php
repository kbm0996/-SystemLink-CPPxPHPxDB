<?php
include_once "_LIB/lib_DB.php";
include_once "_LIB/lib_Key.php";
include_once "_Lib/lib_ErrorHandler.php";
include_once "_LIB/lib_Log.php";

$g_AccountNo = 0;

// ���� �α� & �������Ϸ� 
$GameLog = GAMELog::getInstance($cnf_GAME_LOG_URL);
$PF = Profiling::getInstance($cnf_PROFILING_LOG_URL, $_SERVER['PHP_SELF']);

// * file_get_contents('php://input');
// POST ������� ���� http ��Ŷ�� body�� ������ �� �ִ�. �Ϲ������� PHP������ form��� ������ �̿��ϴ� ��찡 ��κ������� body�� JSON���� ���� raw data�� �־ ������ ��쿡 �����ܿ��� �����Ϸ��� ���� ���� ���ɾ �̿��ؾ� �Ѵ�.
$_RequestData = file_get_contents('php://input');
$_JSONData = json_decode($_RequestData, true);
if(!is_array($_JSONData))
	QuitError("ERROR # JSONData isn't Array");

$PF->startCheck(PF_PAGE);

$PF->startCheck(PF_MYSQL_CONN);
DB_Connect();

$PF->stopCheck(PF_MYSQL_CONN);

?>