<?php 	

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyStaff
{
	
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		return $this->kayakel = $kayakel;
	}

	/**
	* Retrieve a list of all staff users in the help desk.
	* @param
	* @return
	*/
	public function list()
	{
		return $this->kayakel->getRequest("e=/Base/Staff");
	}

	/**
	* Retrieve a staff identified by $id$.
	* @param string id The numeric identifier of the staff.
	*/
	public function search($id)
	{
		return $this->kayakel->getRequest("e=/Base/Staff/".$id);
	}
	/**
	* Update the staff account identified by $id
	* @param string id
	*/
	public function update($values)
	{
		if (!is_array($values)) throw new Exception("Argument must be a array", 1);
		
		if (isset($values['firstname']) && !empty($values['firstname'])) 
			throw new Exception("Firstname is required", 1);
		
		if (isset($values['lastname']) && !empty($values['lastname'])) 
			throw new Exception("lastname is required", 1);
		
		#return kayakel->updateRequeste		
	}
	/**
	*
	* @param array $values
	* @return
	*/
	public function create($values)
	{
		if (!is_array($values)) throw new Exception("Argument must be a array", 1);
		
		if (isset($values['firstname']) && !empty($values['firstname'])) 
			throw new Exception("Firstname is required", 1);
		
		if (isset($values['lastname']) && !empty($values['lastname'])) 
			throw new Exception("lastname is required", 1);
		
		if (isset($values['username']) && !empty($values['username'])) 
			throw new Exception("username is required", 1);
		
		if (isset($values['password']) && !empty($values['password'])) 
			throw new Exception("password is required", 1);
		
		if (isset($values['staffgroupid']) && !empty($values['staffgroupid'])) 
			throw new Exception("staffgroupid is required", 1);

		if (isset($values['email']) && !empty($values['email'])) 
			throw new Exception("email is required", 1);

		return $this->kayakel->postRequest($values,"e=/Base/Staff");		
	}

	/**
	* Delete the staff identified by $id$.
	* @param string id
	* @return 
	*/
	public function delete($id)
	{
		return $this->kayakel->deleteRequest("e=/Base/Staff/".$id);
	}
}