<?php 
namespace j4p\Kayakel;

use j4p\Kayakel

/**
* 
*/
class KyUserSearch
{
	var $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;	
	}

	/**
	* User Search
	* Run a search on Users. You can search users from email, full name, phone, organization name and user group.
	* @param array $query 
	* @return 
	*/
	public function search($query)
	{
		return $this->kayakel->postRequest("e=/Base/UserSearch",$query);
	}
	
}