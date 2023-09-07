<?php

namespace Abhinay\Test\Model;

use Abhinay\Test\Api\GetCompaniesInterface;
use Psr\Log\LoggerInterface;

class GetCompany implements GetCompaniesInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @var \Abhinay\Test\Model\ResourceModel\BusinessRegistration\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param LoggerInterface $logger
     * @param \Abhinay\Test\Model\ResourceModel\BusinessRegistration\CollectionFactory $collectionFactory
     */
    public function __construct(
        LoggerInterface $logger,
        \Abhinay\Test\Model\ResourceModel\BusinessRegistration\CollectionFactory $collectionFactory
    ) {
        $this->logger = $logger;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Getting Companies
     * @return Array
     */
    public function getList()
    {
        try {
            $collection = $this->collectionFactory->create()->toArray();
            $response = ['status' => true, 'companies' => $collection];
        } catch (\Exception $e) {
            $response = ['status' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
        return $response;
    }
}
