<?php 

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyKnowledgebaseComment
{
	
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* Retrieve a list of all the comments that belong to a given knowledgebase article ID.
	* @param string $kbarticleid The unique numeric identifier of the knowledgebase article.
	* @return 
	*/
	public function listCommnets($kbarticleid)
	{
		return $this->kayakel->getRequest("e=/Knowledgebase/Comment/ListAll/".$kbarticleid);
	}

	/**
	* Retrieve a comment identified by id.
	* @param string $id
	* @return 
	*/
	public function searchComment($id)
	{
		return $this->kayakel->getRequest("e=/Knowledgebase/Comment/".$id);
	}

	public function createComment($values)
	{
		if (!is_array($values)) throw new Exception("Array is required", 1);

		if (empty($vales['knowledgebasearticleid'] || !isset($values['knowledgebasearticleid'])))
			throw new Exception("knowledgebasearticleid is required", 1);
			
		if (empty($vales['contents'] || !isset($values['contents'])))
			throw new Exception("contents is required", 1);

		if (empty($vales['creatortype'] || !isset($values['creatortype'])))
			throw new Exception("creatortype is required", 1);
			
		
		return $this->kayakel->postRequest($values,"e=/Knowledgebase/Comment");
	}

	public function deleteComment($id)
	{
		return $this->kayakel->deleteRequest("e=/Knowledgebase/Comment/".$id);
	}
}