<?php 

class myHooks
{
	public function before_delete_post(){
		diHooks::call('IPost', 'BeforeDelete');
	}
	
	public function save_post(){
		diHooks::call('IPost', 'SavePost');
	}
}