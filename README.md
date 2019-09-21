The module makes the [official Klarna payment module for Magento 2](https://docs.magento.com/m2/ce/user_guide/payment/klarna.html) compatible with third-party modules.  
Currently the module solves compatibility problems with: 
- aheadWorks [Gift Card](https://ecommerce.aheadworks.com/magento-2-extensions/gift-card)
- aheadWorks [Reward Points](https://ecommerce.aheadworks.com/magento-2-extensions/points-and-rewards)
- aheadWorks [Store Credit and Refund](https://ecommerce.aheadworks.com/magento-2-extensions/store-credit)
- Amasty [Extra Fee](https://amasty.com/extra-fee-for-magento-2.html)

## How to install
[Hire me in Upwork](https://www.upwork.com/fl/mage2pro), and I will: 
- install and configure the module properly on your website
- answer your questions
- solve compatiblity problems with third-party checkout, shipping, marketing modules
- implement new features you need 

```
bin/magento maintenance:enable
rm -rf composer.lock
composer clear-cache
composer require mage2pro/klarna-compatibility:*
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy -f en_US <additional locales, e.g.: de_DE>
bin/magento maintenance:disable
bin/magento cache:enable
```

## How to upgrade
```
bin/magento maintenance:enable
composer remove mage2pro/klarna-compatibility
rm -rf composer.lock
composer clear-cache
composer require mage2pro/klarna-compatibility:*
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy -f en_US <additional locales, e.g.: de_DE>
bin/magento maintenance:disable
bin/magento cache:enable
```

## Support
- [The extension's **forum** branch](https://mage2.pro/c/extensions/klarna-compatibility).
- [Where and how to report a Mage2.PRO extension's issue?](https://mage2.pro/t/2034)