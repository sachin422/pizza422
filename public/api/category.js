var page = [

    {
        title: 'Main Category',
        description: 'Main Category List',
        action: '/category',
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