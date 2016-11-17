var page = [

    {
        title: 'Get User Address',
        description: 'Get address list stored by user',
        action: '/user/address-list',
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
        title: 'Add new Address',
        description: 'Add new address',
        action: '/user/add',
        method: 'post',
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
                type: 'options',
                options: ['default', 'home', 'office'],
                name: 'type',
                description: 'Choose address type',
                param_type: 'form',
                data_type: 'string',
                required: true
            },
            {
                type: 'text',
                name: 'name',
                description: 'Enter owner/your name',
                param_type: 'form',
                required: true
            },
            {
                type: 'text',
                param_type: 'form',
                name: 'location_id',
                description: 'Enter location id (Use list location or find location to get location id).',
                required: true,
                data_type: 'int'
            },
            {
                type: 'text',
                name: 'address_1',
                description: 'Enter your address 1',
                param_type: 'form',
                required: true
            },
            {
                type: 'text',
                name: 'address_2',
                description: 'Enter your address 2',
                param_type: 'form',
                required: false
            },
            {
                type: 'text',
                name: 'company',
                description: 'company name',
                param_type: 'form',
                required: false
            },
            {
                type: 'text',
                name: 'phone_1',
                data_type: 'integer',
                description: 'Provide phone number 1',
                param_type: 'form',
                required: false
            },
            {
                type: 'text',
                name: 'phone_2',
                data_type: 'integer',
                description: 'Provide phone number 2',
                param_type: 'form',
                required: false
            },
            {
                type: 'text',
                name: 'pincode',
                description: 'Enter your pincode',
                param_type: 'form',
                data_type: 'int',
                required: false
            }
        ]
    },
    {
        title: 'Save User Address',
        description: 'Save user address',
        action: '/user/change',
        method: 'post',
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
                name: 'name',
                description: 'Enter owner/your name',
                param_type: 'form',
                required: true
            },
            {
                type: 'text',
                param_type: 'form',
                name: 'location_id',
                description: 'Enter location id (Use list location or find location to get location id).',
                required: true,
                data_type: 'int'
            },
            {
                type: 'text',
                name: 'address_id',
                description: 'Enter your address',
                param_type: 'form',
                data_type: 'int',
                required: true
            },
            {
                type: 'text',
                name: 'address_1',
                description: 'Enter your address 1',
                param_type: 'form',
                required: true
            },
            {
                type: 'text',
                name: 'address_2',
                description: 'Enter your address 2',
                param_type: 'form',
                required: false
            },
            {
                type: 'text',
                name: 'company',
                description: 'company name',
                param_type: 'form',
                required: false
            },
            {
                type: 'text',
                name: 'phone_1',
                data_type: 'integer',
                description: 'Provide phone number 1',
                param_type: 'form',
                required: false
            },
            {
                type: 'text',
                name: 'phone_2',
                data_type: 'integer',
                description: 'Provide phone number 2',
                param_type: 'form',
                required: false
            },
            {
                type: 'text',
                name: 'pincode',
                description: 'Enter your pincode',
                param_type: 'form',
                data_type: 'int',
                required: false
            },

        ]
    },
    {
        title: 'Delete Address',
        description: 'Delete user address',
        action: '/user/delete',
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
                name: 'address_id',
                description: 'Enter your address',
                param_type: 'form',
                data_type: 'int',
                required: true
            }
        ]
    }

];