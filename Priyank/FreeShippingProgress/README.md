# Priyank_FreeShippingProgress Module

## Overview

The **Free Shipping Progress** module provides a dynamic progress bar for Magento 2 checkout and cart pages, showing customers how much more they need to spend to unlock free shipping.  

It works reactively with Magento 2’s **customer-data cart section** and handles:

- Live updates when items are added, removed, or the cart is emptied  
- Automatic calculation of remaining amount and progress percentage  

## Features

- Displays **remaining amount to unlock free shipping**.  
- Shows a **progress bar** that fills as the subtotal increases.  
- Fully **reactive with Knockout JS** (`ko.observable` & `ko.computed`).  
- Updates automatically when the cart changes.  

## Installation

1. Place the module under `app/code/Priyank/FreeShippingProgress`.  
2. Run Magento commands:

```bash
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush