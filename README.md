# Magento (v1) extension to validate order email addresses
This extension validates customer email addresses of orders by connecting to the email server and checking if the mail address actually exists. 

## Installation

### Modman
You can easily clone this repo with modman. Learn more in the modman wiki at https://github.com/colinmollenhour/modman/wiki/Tutorial

```
$ modman clone git@github.com:trendmarke-gmbh/magento_validate_order_mail_addresses.git
```

### Manual installation
Alternatively you can download the repo and transfer the content of the src directory into your Magento root directory. After the installation clear the cache and that's it.

## Configuration
You can turn on the automatic validation of orders in the *system > configuration > sales > general* tab. This will enable a cronjob that every hour validates all new orders. You can change the period in the config.xml

## Notes and Credits
- This extension was tested with Magento 1.9.x but it should also work with older versions (probably till 1.4.x).
- This extension uses a library to verify email addresses created by Sam Battat (https://github.com/hbattat/verifyEmail)
