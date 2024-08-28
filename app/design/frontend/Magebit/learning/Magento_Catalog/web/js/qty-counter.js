define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    'use strict';

    return Component.extend({
        initialize: function () {
            this._super();
            this.qty = ko.observable(1);
        },

        decrease: function() {
            let updateQty = parseInt(this.qty(), 10);

            // Ensure quantity does not go below 1
            if (updateQty > 1) {
                this.qty(updateQty - 1);
            }
        },

        increase: function() {
            let updateQty = parseInt(this.qty(), 10);

            // Ensure quantity does not go above 99
            if (updateQty < 99) {
                this.qty(updateQty + 1);
            }
        },

        // Optional: Validate input to ensure it's within the allowed range
        validateQty: function() {
            let updateQty = parseInt(this.qty(), 10);

            if (isNaN(updateQty) || updateQty < 1) {
                this.qty(1); // Reset to 1 if invalid or too low
            } else if (updateQty > 99) {
                this.qty(99); // Reset to 99 if too high
            }
        }
    });
});
