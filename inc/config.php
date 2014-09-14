<?php
	define('D_sql', false);
	define('ENV'  , 'prod');

	if( ENV == 'debug' )
	{
		define('host'  , 'localhost'); // test local
		define('dbname', 'rhodia');
		define('userdb', 'root');
		define('passwd', '');
	}
	if( ENV == 'prod')
	{
		define('host'  , 'sql-02.redheberg.com'); // test local
		define('dbname', 'rhodiaba_web');
		define('userdb', 'rhodiaba_user');
		define('passwd', 'sqlpassword');	
	}
?>