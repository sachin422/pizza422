var page = [

    {
        title: 'Login',
        description: 'Login sample request',
        action: '/auth/login',
        method: 'post',
        data: [
            {
                type: 'text',
                name: 'phone',
                description: 'Enter your registered phone number',
                param_type: 'form',
                data_type: 'int',
                required: true
            },
            {
                type: 'password',
                name: 'password',
                description: 'Enter your password',
                param_type: 'form',
                required: true
            },
            {
                type: 'text',
                name: 'device_id',
                description: 'Enter device id',
                param_type: 'form',
                required: true
            },
            {
                type: 'text',
                name: 'otp',
                description: 'In case user reinstall the app, use otp to  create new credentials',
                param_type: 'form',
                required: false
            }
        ]
    },

    {
        title: 'Register',
        description: 'Create a new account',
        action: '/auth/register',
        method: 'post',
        data: [
            {
                type: 'text',
                name: 'phone',
                description: 'Enter your registered phone number',
                param_type: 'form',
                data_type: 'int',
                required: true
            },
            {
                type: 'password',
                name: 'password',
                description: 'Enter your password',
                param_type: 'form',
                required: true
            },
            {
                type: 'text',
                name: 'device_id',
                description: 'Enter device id',
                param_type: 'form',
                required: true
            }
        ]
    },

    {
        title: 'Find Location',
        description: 'Find address by lat. and lng.',
        action: '/auth/find-location',
        method: 'get',
        data: [
            {
                type: 'text',
                name: 'lat',
                description: 'Enter latitude',
                param_type: 'form',
                date_type: 'float',
                required: true
            },
            {
                type: 'text',
                name: 'lng',
                description: 'Enter longitude',
                param_type: 'form',
                date_type: 'float',
                required: true
            }
        ]
    },
    {
        title: 'List Locations',
        description: 'List all the available locations',
        action: '/auth/locations',
        method: 'get',
        data: [

        ]
    },
    {
        title: 'Match City',
        description: 'Check if service available ion city or not.',
        action: '/auth/match-city',
        method: 'get',
        data: [
            {
                type: 'text',
                name: 'city',
                description: 'Enter your city name',
                param_type: 'query',
                required: true
            }
        ]
    },
    {
        title: 'Send OTP',
        description: 'Send otp to user to verify phone number',
        action: '/auth/send-otp',
        method: 'get',
        data: [
            {
                type: 'text',
                name: 'phone',
                description: 'Enter your phone number',
                param_type: 'query',
                date_type: 'int',
                required: true
            }
        ]
    },

    {
        title: 'Verify OTP',
        description: 'Verify user otp',
        action: '/auth/verify-otp',
        method: 'get',
        data: [
            {
                type: 'text',
                name: 'phone',
                description: 'Enter your phone number',
                param_type: 'query',
                date_type: 'int',
                required: true
            },
            {
                type: 'text',
                name: 'otp',
                description: 'Enter your otp',
                param_type: 'query',
                date_type: 'int',
                required: true
            }
        ]
    }

];
