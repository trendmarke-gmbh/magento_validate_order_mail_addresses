<?php
require_once (Mage::getModuleDir('', 'Trendmarke_ValidateMail') . DS . 'lib' . DS .'VerifyEmail.php');

class Trendmarke_ValidateMail_Helper_Data extends Mage_Core_Helper_Abstract
{

    private $_validatorLibrary = false;

    /**
     * Initialize Library
     */
    private function getValidator() {
        if ($this->_validatorLibrary==false) {
            $this->_validatorLibrary = new hbattat\VerifyEmail(Mage::getStoreConfig('trans_email/ident_general/email'), Mage::getStoreConfig('trans_email/ident_general/email'));
        }
        return $this->_validatorLibrary;
    }


    /**
     * Validate given email address
     *
     * @param $emailAddress
     */
    public function validateMail($emailAddress) {
        $this->getValidator()->set_email($emailAddress);
        return $this->getValidator()->verify();
    }

    /**
     * Validate order
     *
     * @param $order = numeric order id or order object
     */
    public function validateOrder($order) {
        $valid = 0;
        if (is_numeric($order)) {
            $order = Mage::getModel('sales/order')->load($order);
        }
        if ($order && filter_var($order->getCustomerEmail(), FILTER_VALIDATE_EMAIL)) {
            $valid = $this->validateMail($order->getCustomerEmail());
        }
        $order->setEmailValid($valid);
        try {
            $order->save();
        } catch( Exception $e) {
            Mage::log('Could not validate order '.$order->getId().' with email '.$order->getCustomerEmail());
        }
        return $valid;
    }

}
	 