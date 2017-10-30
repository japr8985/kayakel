<?php 	

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyStaffGroup
{
	
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		return $this->kayakel = $kayakel;
	}
	/**
	* Retrieve a list of all staff user groups in the help desk.
	*/
	public function listAll()
	{
		return $this->kayakel->getRequest('e=/Base/StaffGroup');
	}
	/**
	* Retrieve a list of all staff user groups in the help desk.
	* @param $id
	* @return
	*/
	public function search($id)
	{
		return $this->kayakel->getRequest('e=/Base/StaffGroup'.$id);
	}
	/**
	* Create a staff group
	* @param array $values
	* @return
	*/
	public function new($values)
	{
		if (!is_array($values)) throw new Exception("A array is required", 1);

		if (empty($vales['title'] || !isset($values['title'])))
			throw new Exception("title is required", 1);
			
		if (empty($vales['isadmin'] || !isset($values['isadmin'])))
			throw new Exception("isadmin is required", 1);

		return $this->kayakel->postRequest($vales,'e=/Base/StaffGroup');
	}

	/**
	* Delete the staff group identified by $id$.
	* @param string id
	*/
	public function delete($id)
	{
		return $this->kayakel->deleteRequest("e=/Base/StaffGroup/".$id);
	}
	public function update($value)
	{
		#return $this->kayakel->getRequest('e=/Base/StaffGroup/');
	}
}