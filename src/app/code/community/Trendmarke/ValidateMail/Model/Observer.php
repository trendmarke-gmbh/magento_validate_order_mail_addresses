<?php
class Trendmarke_ValidateMail_Model_Observer
{

    /**
     * Add button to order view
     */
    public function addValidateButton(Varien_Event_Observer $observer)
    {
        $container = $observer->getBlock();
        if ($container instanceof Mage_Adminhtml_Block_Sales_Order_View)
        {
            $container->addButton('validateemail_validate', array(
                'label'     => Mage::helper('validatemail')->__('Validate email'),
                'onclick'   => 'setLocation(\'' . $container->getUrl('admin_validatemail/adminhtml_validate/validate').'\')',
                'class'     => 'go'
            ));
        }
    }


}
