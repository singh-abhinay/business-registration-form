<?php

namespace Abhinay\Test\Controller\BusinessRegistration;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \Abhinay\Test\Model\BusinessRegistrationFactory
     */
    protected $businessRegistrationFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Abhinay\Test\Model\BusinessRegistrationFactory $businessRegistrationFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Abhinay\Test\Model\BusinessRegistrationFactory $businessRegistrationFactory
    ) {
        $this->businessRegistrationFactory = $businessRegistrationFactory;
        $this->_pageFactory = $pageFactory;
        $this->_messageManager = $context->getMessageManager();
        return parent::__construct($context);
    }

    /**
     * Save Bussiness Informations
     * @return void
     */
    public function execute()
    {
        $postData = $this->getRequest()->getParams();
        $model = $this->businessRegistrationFactory->create();
        $model->setCompanyName($postData['company_name']);
        $model->setIncorporateDate($postData['incorporate_date']);
        $model->setArea($postData['area']);
        try {
            $model->save();
            $this->_messageManager->addSuccessMessage('Bussiness Information added succesfully.');
        } catch (\Exception $e) {
            $this->_messageManager->addErrorMessage('Something went wrong while adding bussiness information.');
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('abhinay/businessregistration/index');
        return $resultRedirect;
    }
}
