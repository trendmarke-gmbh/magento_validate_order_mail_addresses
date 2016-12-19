<?php
class Trendmarke_ValidateMail_Block_Adminhtml_Info extends Mage_Adminhtml_Block_Sales_Order_Abstract {

    /**
     * Retrieve required options from parent
     */
    protected function _beforeToHtml()
    {
        if (!$this->getParentBlock()) {
            Mage::throwException(Mage::helper('adminhtml')->__('Invalid parent block for this block.'));
        }
        $this->setOrder($this->getParentBlock()->getOrder());

        parent::_beforeToHtml();
    }

}