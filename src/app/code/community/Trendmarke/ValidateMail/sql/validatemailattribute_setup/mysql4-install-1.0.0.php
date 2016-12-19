<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute("order", "email_valid", array('type'=>'int','default'=>'-1'));

$installer->endSetup();
	 