var config = {
    map: {
        '*': {
            'Magento_Catalog/css/styles': 'Magebit_Learning/css/styles',
            qtyCounter: 'Magento_Catalog/js/qty-counter'  // Path relative to your theme's web directory
        }
    },
    paths: {
        'Magebit_Learning/css/styles': 'Magebit_Learning/css/styles',
        qtyCounter: 'Magento_Catalog/js/qty-counter'  // Path relative to your theme's web directory
    },
    shim: {
        'Magebit_Learning/js/view/product/view': {
            deps: ['Magebit_Learning/css/styles']
        }
    }
};

require.config(config);
