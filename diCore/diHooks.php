<?php 

class diHooks
{
	public function register_activation_hook(){		
		diHooks::call('IPlugin', 'OnActivation');
	}
	
	public function register_deactivation_hook(){		
		diHooks::call('IPlugin', 'OnDeactivation');
	}		
	
	public static function register_hooks($file){
		$file = plugin_basename($file);
		add_action('activate_' . $file, array( 'diHooks', 'register_activation_hook' ));
		add_action('deactivate_' . $file, array( 'diHooks', 'register_deactivation_hook' ));		
	}
	
	/**
	 * Find all classes that implements the specified interface and run the $call_func
	 * @param string $interface
	 * @param string $call_func
	 */
	public static function call($interface, $call_func){
		$classList = diHooks::find_classesc_who_implements($interface);
		if(sizeof($classList) > 0)
		{
			foreach ($classList as $class)
			{
				if(class_exists($class))
				{
					eval("\$obj = new \$class(); if(method_exists(\$obj,'$call_func')){ \$obj->$call_func(); }");
				}
			}
		}
	}
	
	/**
	 * Get classes which implement a given interface
	 * @param string $interface_name Name of the interface
	 * @return array Array of names of classes. Empty array means input is a valid interface which no class is implementing. NULL means input is not even a valid interface name.
	 */
	public static function find_classesc_who_implements($interface_name) {
		if (interface_exists($interface_name)) {
			return array_filter(get_declared_classes(), create_function('$className', "return in_array(\"$interface_name\", class_implements(\"\$className\"));"));
		}
		else {
			return null;
		}
	}
	
	/**
	 * Write output to a log file for debuging purposes
	 * @param string $message
	 */
	public static function write($message){
		$date = date("Y-m-d H:i:s");
		$file = fopen(ABSPATH . "logs.txt","a+");
		$output = "\n" . $date . ' - ' . $message;
		fwrite($file, $output);
		fclose($file);
	}
}

