var page = [

    {
        title: 'Page',
        description: 'Get Page',
        action: '/other/page',
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
                type: 'options',
                options: ['about'],
                name: 'page',
                description: 'Choose page',
                param_type: 'query',
                required: true
            }
        ]
    },

    {
        title: 'Information',
        description: 'Get web related information',
        action: '/other/info',
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
    }

];