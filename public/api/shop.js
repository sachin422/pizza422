var page = [

    {
        title: 'Categories',
        description: 'Get top-level categories',
        action: '/shop/categories',
        method: 'get',
        data: [
            {
                type: 'text',
                name: 'api_key',
                description: 'Enter your api key',
                param_type: 'query',
                required: true
            },
            {
                type: 'text ',
                name: 'device_id',
                description: 'Enter your device id',
                param_type: 'query',
                required: true
            }
        ]
    },
    {
        title: 'Vendors',
        description: 'Get vendors',
        action: '/shop/vendors',
        method: 'get',
        data: [
            {
                type: 'text',
                name: 'api_key',
                description: 'Enter your api key',
                param_type: 'query',
                required: true
            },
            {
                type: 'text ',
                name: 'device_id',
                description: 'Enter your device id',
                param_type: 'query',
                required: true
            },
            {
                type: 'text',
                param_type: 'query',
                name: 'location_id',
                description: 'Enter location id (Use list location or find location to get location id).',
                required: true,
                data_type: 'int'
            },
            {
                type: 'text',
                name: 'category_id',
                description: 'Top level category id.',
                param_type: 'query',
                required: true,
                data_type:'int'
            }
        ]
    },
    {
        title: 'Product Categories',
        description: 'Get product categories',
        action: '/shop/product-categories',
        method: 'get',
        data: [
            {
                type: 'text',
                name: 'api_key',
                description: 'Enter your api key',
                param_type: 'query',
                required: true
            },
            {
                type: 'text ',
                name: 'device_id',
                description: 'Enter your device id',
                param_type: 'query',
                required: true
            },
            {
                type: 'text ',
                name: 'vendor_id',
                description: 'Vendor id.',
                param_type: 'query',
                required: true,
                data_type: 'int'
            },
            {
                type: 'text ',
                name: 'parent_category_id',
                description: 'Vendor id.',
                param_type: 'query',
                required: false,
                data_type: 'int'
            }
        ]
    },

    {
        title: 'Products',
        description: 'Get products',
        action: '/shop/products',
        method: 'get',
        data: [
            {
                type: 'text',
                name: 'api_key',
                description: 'Enter your api key',
                param_type: 'query',
                required: true
            },
            {
                type: 'text ',
                name: 'device_id',
                description: 'Enter your device id',
                param_type: 'query',
                required: true
            },
            {
                type: 'text ',
                name: 'vendor_id',
                description: 'Vendor id.',
                param_type: 'query',
                required: true,
                data_type: 'int'
            },
            {
                type: 'text ',
                name: 'product_category_id',
                description: 'Product category ID',
                param_type: 'query',
                required: false,
                data_type: 'int'
            },
            {
                type: 'text ',
                name: 'page',
                description: 'Page number',
                param_type: 'query',
                required: false,
                value: 1,
                data_type: 'int'
            },
            {
                type: 'text ',
                name: 'limit',
                description: 'Products limit per page',
                param_type: 'query',
                required: false,
                value: 30,
                data_type: 'int'
            }
        ]
    }

];