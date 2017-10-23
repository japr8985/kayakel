<?php

namespace j4p\Kayakel;

class KyCustomField extends Kayakel
{
    public function getBaseCustomField()
    {
        return $this->getRequest("e=/Base/CustomField".$id);
    }

    public function getListOptions($customFieldId = null)
    {
        if (is_null($customFieldId)) {
            throw new Exception("Campo requerido");            
        }
        return $this->getRequest("e=/Base/CustomField/ListOptions/".$customfieldid);
    }
}
