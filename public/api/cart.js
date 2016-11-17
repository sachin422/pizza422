var page = [

    {
        title: 'Add to cart',
        description: 'Add an item to cart.',
        action: '/cart/add',
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
                type: 'text',
                name: 'device_id',
                description: 'Enter your device id',
                param_type: 'query',
                required: true
            },
            {
                type: 'text',
                name: 'product_id',
                description: 'Enter product id',
                param_type: 'form',
                data_type: 'int',
                required: true
            },
            {
                type: 'text',
                name: 'qty',
                description: 'Enter item quantity',
                param_type: 'form',
                data_type: 'int',
                required: true
            },
        ]
    },

    {
        title: 'Update cart item quantity',
        description: 'Update an item quantity in cart.',
        action: '/cart/update-item-quantity',
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
                type: 'text',
                name: 'device_id',
                description: 'Enter your device id',
                param_type: 'query',
                required: true
            },
            {
                type: 'text',
                name: 'product_id',
                description: 'Enter product id',
                param_type: 'form',
                data_type: 'int',
                required: true
            },
            {
                type: 'text',
                name: 'qty',
                description: 'Enter item quantity',
                param_type: 'form',
                data_type: 'int',
                required: true
            },
        ]
    },

    {
        title: 'Remove from cart',
        description: 'Remove an item from cart.',
        action: '/cart/remove',
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
                name: 'product_id',
                description: 'Enter product id',
                param_type: 'form',
                data_type: 'int',
                required: true
            }
        ]
    },

    {
        title: 'Get cart',
        description: 'List all the cart items.',
        action: '/cart/get',
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
                type: 'text',
                name: 'device_id',
                description: 'Enter your device id',
                param_type: 'query',
                required: true
            }
        ]
    },

];