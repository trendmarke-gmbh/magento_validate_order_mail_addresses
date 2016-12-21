<?php
class Trendmarke_ValidateMail_Model_Cron{

    /**
     * Cron job to automatically validate emails. Done in cron to prevent delays in order process
     * Note: only last 24 hours are considered to prevent flooding with historic orders
     */
    public function validateOrders(){
        if (Mage::getStoreConfig('sales/general/auto_email_validation', Mage_Core_Model_Store::ADMIN_CODE)) {
            $_orders = $orders = Mage::getModel('sales/order')->getCollection()
                ->addFieldToFilter('created_at', array(
                    'from'     => strtotime('-1 day', time()),
                    'to'       => time(),
                    'datetime' => true
                ))
                ->addAttributeToFilter('email_valid', array(array('null'=>true), array('lt' => 0)));
            $_helper = Mage::helper('validatemail');
            foreach ($_orders as $_order) {
                $_helper->validateOrder($_order);
            }
        }
	} 
}
