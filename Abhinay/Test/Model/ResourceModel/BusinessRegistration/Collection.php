<?php

namespace Abhinay\Test\Model\ResourceModel\BusinessRegistration;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    
    public function _construct()
    {
        $this->_init(
            'Abhinay\Test\Model\BusinessRegistration',
            'Abhinay\Test\Model\ResourceModel\BusinessRegistration'
        );
    }
}
