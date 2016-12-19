<?php
class Trendmarke_ValidateMail_Adminhtml_ValidateController extends Mage_Adminhtml_Controller_Action
{
	public function validateAction()
    {
        $_order_id = $this->getRequest()->getParam("order_id");
        $_order = Mage::getModel('sales/order')->load($_order_id);
        Mage::helper('validatemail')->validateOrder($_order);
        if ($_order) {
            Mage::helper('validatemail')->validateOrder($_order);
        }
        $this->_redirect('adminhtml/sales_order/view', array('order_id' => $_order_id));
    }
}