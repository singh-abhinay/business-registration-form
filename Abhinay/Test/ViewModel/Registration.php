<?php

namespace Abhinay\Test\ViewModel;

class Registration implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    /**
     * @var \Magento\Framework\Data\Form\FormKey
     */
    protected $formKey;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @param \Magento\Framework\Data\Form\FormKey $formKey
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Framework\Data\Form\FormKey $formKey,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->formKey = $formKey;
        $this->storeManager = $storeManager;
    }

    /**
     * Getting FormKey
     * @return array
     */
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getBaseUrl()
    {
        $baseUrl = $this->storeManager->getStore()->getBaseUrl();
        return $baseUrl;
    }
}
