<?php

namespace Abhinay\Test\Model\ResourceModel;

class BusinessRegistration extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName = 'id';

    public function _construct()
    {
        $this->_init("business_registration", "id");
    }
}
