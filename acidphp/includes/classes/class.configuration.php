<?php

 #################################################
# AcidPHP - Free PHP Website written from scratch #
#          Contributors / Credits list            #
 #################################################
#             Josh - Creating AcidPHP             #
#           PHP.net - Examples of codes           #
#             Adam - Creating layout              #
 #################################################

 #####  ###### # #######
#     # #        #      #
#     # #      # #      #
####### #      # #      #
#     # #      # #      #
#     # ###### # ########

class Configuration
{
	private static $types = array
	(
		'mysql' => array
			(
				'hostname' => 'localhost',
				'username' => 'root',
				'password' => '',
				'database' => 'aciddb'
			),
		'mus' => array
			(
				'ip_addr' => '127.0.0.1',
				'port' => '30001'
			)
	);
	
	public static function getValue($type, $key)
	{
		return Configuration::$types[$type][$key];
	}
}

?>