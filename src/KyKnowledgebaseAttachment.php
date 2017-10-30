<?php 

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyKnowledgebaseAttachment
{
	
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* Retrieve a list of all the attachments that belong to a given knowledgebase article ID.
	* @param string $id
	* @return 
	*/
	public function listAttachments($id)
	{
		return $this->kayakel->getRequest("e=/Knowledgebase/Attachment/ListAll/".$id);
	}

	/**
	* Retrieve an attachment identified by id
	* @param string $id The unique numeric identifier of the attachment.
	* @param string $kaid The unique numeric identifier of the knowledgebase article
	* @return 
	*/
	public function searchAttachment($id,$kaid)
	{
		return $this->kayakel->getRequest("e=/Knowledgebase/Attachment/".$kbarticleid."/".$id);
	}

	/**
	* Create a new knowledgebase attachment.
	* @param array $value
	*/
	public function FunctionName($value)
	{
		if (!array_key_exists("kbarticleid", $value)) 
			throw new Exception("kbarticleid is required", 1);

		if (!array_key_exists("filename", $value))
			throw new Exception("filename is required", 1);

		if (!array_key_exists("contents", $value))
			throw new Exception("contents is required and BASE64 encoded", 1);
		
		return $this->kayakel->postRequest($value,"/Knowledgebase/Attachment")
			
			
	}
}