define([
    'uiComponent',
    'Magento_Customer/js/customer-data',
    'ko'
], function (Component, customerData, ko) {


    return Component.extend({

        defaults: {
            template: "Priyank_FreeShippingProgress/progress"
        },

        initialize: function () {
            this._super();
            this.cart = customerData.get('cart');
            this.isVisible = ko.observable(true);
            this.showHidden = function(){
                    this.isVisible(false)
                };

            return this;
        },

        getSubtotal: function () {
            return this.cart().subtotalAmount;
        },

        percent: function () {
            const subtotal = this.getSubtotal();
            const limit = this.freeShippingLimit || 100;

            if (typeof subtotal == 'undefined' && subtotal == null) {
                return 0; 
            }

            const percent = (subtotal / limit) * 100;
            return percent > 100 ? 100 : percent;
        },


        remainingAmount: function () {
            const subtotal = this.getSubtotal();
            const remaining = this.freeShippingLimit - subtotal;
            
            if (typeof subtotal == 'undefined' && subtotal == null) {
                return this.freeShippingLimit;
            }

            return remaining > 0 ? remaining : 0;
        }
    });
});
