<?php

namespace j4p\Kayakel;

use j4p\Kayakel\Kayakel;

class KyCustomField 
{
    var $kayakel;

    function __construct(Kayakel $kayakel)
    {
        $this->kayakel = $kayakel;  
    }

    public function getBaseCustomField()
    {
        return $this->kayakel->getRequest("e=/Base/CustomField");
    }

    /**
    * Retrieve the list of custom field options
    * @param string $customFieldId
    * @return SimpleXml || Json || Array
    */
    public function getListOptions($customFieldId = null)
    {
        if (is_null($customFieldId)) {
            throw new Exception("Campo requerido");            
        }
        return $this->kayakel->getRequest("e=/Base/CustomField/ListOptions/".$customfieldid);
    }
}
