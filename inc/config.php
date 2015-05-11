<?php
	define('ENV'  ,  $_SERVER['HTTP_HOST'] == "localhost" ? 'debug' : 'prod' );
	define('D_sql', false);

	if( ENV == 'debug' )
	{
		define('host'  , 'localhost'); // test local
		define('dbname', 'rhodia');
		define('userdb', 'root');
		define('passwd', '');
	}
	if( ENV == 'prod')
	{
		//define('host'  , 'sql-02.redheberg.com'); // test local
		define('host'  , 'mysql-4');
		define('dbname', 'rhodiaba_web');
		define('userdb', 'rhodiaba_user');
		define('passwd', 'sqlpassword');	
	}
?>
