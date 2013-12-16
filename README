Faq

1.	What is diCore?

	diCore targeting OOP developers, introduces a new approach of writing code in wordpress, to trigger your code by wordpress hooks, through the use of interfaces. For example, in
	diCore there are different interfaces implemented. For eaxmple, you need your code to be called when the register_activation_hook is triggered, instead of using add_action you 
	just need to create a class that will implement IPlugin and that will do the trick. Furthermore, if you are looking for a hook that do not exists in diCore you can easily extend 
	it as shown below (question 3).

2. 	How to use the diCore Hooks?

	1.1. Create a class that will implement the hook interface you desire.
		 Example: see class 'MyActivation' which implements IPlugin, OnActivation and OnDeactivation method
		
	1.2. Create a file that will act as entry point of your plugin
		 Example: index.php
				  - On top of your code include line: require_once dirname(__FILE__) . "/../diCore/diCore_lib.php"; 
				    This line will include the diCore required libraries.
				  - Write your custom code after the above line to include your MyActivation.php file
				  - Include the below line at the end of your file. This line will register the existing diCore hooks in wordpress for you: 
				    diHooks::register_hooks(__FILE__);
					
		Thats it!

3. 	The hook I need do not exists in the specified interface in diCore plugin?

	1.1. Create a class that will implement the hook interface you desire and create a method of the missing hook as well.
		 Example: class MyPost.php which implements IPost have a method called 'SavePost' that is not in the interface.
		
	1.2. Then create a class that will act as a router. 
		 Example: see class myHooks, has 2 methods that each one will call the appropriate method from above step
		 
	1.3. Create a file that will act as entry point of your plugin
		 Example: index.php
				  - On top of your code include the below line, this line will include the diCore required libraries.
					require_once dirname(__FILE__) . "/../diCore/diCore_lib.php"; 				    
					
				  - Write your custom code after the above line to include your MyPost.php file and register your hooks:
					
					include "interfaces/IPost.php";					
					include "MyPost.php";
					include "myHooks.php";
					//Custom Hooks Registration
					add_action( 'before_delete_post',  array( 'myHooks', 'before_delete_post' ) );
					add_action( 'save_post',  array( 'myHooks', 'save_post' ) );
					
				  - Include the below line at the end of your file. This line will register the existing diCore hooks in wordpress for you: 
				    diHooks::register_hooks(__FILE__);
					
		Thats it!
		
4.	Why my code is not called?

	1.1. If your code is not called after implementing a hook, what can I do:
		 1.1.1. Read in wordpress site how the specified hook is working and when is been triggered.
		 1.1.2. diCore included a logger so you can debug, below is the line how to write in log file. Log file is located in 
				your wordpress root directory (log.txt) * write permissions are required on log file.
				
		        diHooks::write("Your text goes here!!!");

		