<?php 

namespace j4p\Kayakel;
use j4p\Kayakel
use Exception;

/**
* 
*/
class KyKnowledgebaseArticle
{
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}
	/**
	* Retrieve a list of articles identified by categoryid.
	* @param string $category
	* @param array $opc opcional array of filter
	* @return json || string || SimpleXmlElement || array
	*/
	public function listArticles($category,$opc[])
	{
		$url = "e=/Knowledgebase/Article/ListAll/".$category;

		for ($i=0; $i < count($opc) ; $i++) { 
			$url .= "/".$opc[$i];
		}

		return $this->kayakel->getRequest($url);
	}

	/**
	* Retrieve an article identified by id
	* @param string $id
	* @return json || string || SimpleXmlElement || array
	*/
	public function searchArticle($id)
	{
		return $this->kayakel->getRequest("e=/Knowledgebase/Article/".$id);
	}

	/**
	* A new knowledgebase article.
	* @param array $value
	*/
	public function newKnowledgebase($value)
	{
		return $this->kayakel->postRequest($value,"e=/Knowledgebase/Article");
	}

	/**
	* Update knowledgebase article.
	* @param array $value
	*/
	public function updateKnowledgebase($value)
	{
		#code
	}

	/**
	* Delete knowledgebase article.
	* @param array $value
	*/
	public function deleteKnowledgebase($id)
	{
		return $this->kayakel->deleteRequest("e=/Knowledgebase/Article/".$id);
	}
}