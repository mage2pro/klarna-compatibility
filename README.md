The module makes the [official Klarna payment module for Magento 2](https://docs.magento.com/m2/ce/user_guide/payment/klarna.html) compatible with third-party modules.  
Currently the module solves compatibility problems with 3 modules of **aheadWorks**:
- [Gift Card](https://ecommerce.aheadworks.com/magento-2-extensions/gift-card)
- [Reward Points](https://ecommerce.aheadworks.com/magento-2-extensions/points-and-rewards)
- [Store Credit and Refund](https://ecommerce.aheadworks.com/magento-2-extensions/store-credit)

## How to install
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

If you have problems with these commands, please check the [detailed instruction](https://mage2.pro/t/263).

## Support
- [The extension's **forum** branch](https://mage2.pro/c/extensions/klarna-compatibility).
- [Where and how to report a Mage2.PRO extension's issue?](https://mage2.pro/t/2034)
- I also provide a **[generic Magento 2 support](https://mage2.pro/t/755)** and [Magento 2 installation service](https://mage2.pro/t/748).

## Want to be notified about the extension's updates?
- [Subscribe](https://mage2.pro/t/2540) to the extension's [forum branch](https://mage2.pro/c/extensions/klarna-compatibility).
- Subscribe to my [Twitter](https://twitter.com/mage2_pro) and [YouTube](https://www.youtube.com/channel/UCvlDAZuj01_b92pzRi69LeQ) channels.