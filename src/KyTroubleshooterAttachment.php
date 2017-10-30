<?php 	

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 	
*/
class KyTroubleshooterAttachment
{
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* Retrieve a list of all the attachments that belong to a given troubleshooter step ID.
	* @param string $id
	* @return 
	*/
	public function listAll($id)
	{
		return $this->kayakel->getRequest("e=/Troubleshooter/Attachment/ListAll/".$id);
	}

	/**
	* Retrieve an attachment identified by ID.
	* @param string $stepid The unique numeric identifier of the troubleshooter step.
	* @param string $id The unique numeric identifier of the attachment.
	* @return 
	*/
	public function search($stepid,$id)
	{
		return $this->kayakel->getRequest("e=/Troubleshooter/Attachment/".$stepid."/".$id);
	}

	/**
	* Create a new troubleshooter step attachment.
	* @param array $value
	* @return 
	*/
	public function create($values)
	{
		if (!is_array($values)) throw new Exception("Array is required", 1);

		if (empty($vales['troubleshooterstepid'] || !isset($values['troubleshooterstepid'])))
			throw new Exception("troubleshooterstepid is required", 1);
			
		if (empty($vales['filename'] || !isset($values['filename'])))
			throw new Exception("filename is required", 1);
		
		if (empty($vales['contents'] || !isset($values['contents'])))
			throw new Exception("contents is required", 1);
		
		return $this->kayakel->postRequest($values,"e=/Troubleshooter/Attachment");
	}

	/**
	* Delete a troubleshooter attachment identified by id
	* @param string stepid The unique numeric identifier of the troubleshooter step.
	* @param string id The unique numeric identifier of the attachment.
	* @return
	*/
	public function delete($stepid,$id)
	{
		return $this->kayakel->deleteRequest("e=/Troubleshooter/Attachment/".$stepid.'/'.$id);
	}
}