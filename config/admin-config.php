<?php

return [
    /*
     * --------------------------------------------------------------------------
     * Define configuration groups
     * --------------------------------------------------------------------------
     * Each configuration group will be rendered as a TAB page
     */
    'admin_config_groups' => [
        'general' => 'General',
        'village' => 'Village'
    ],
    /**
     * --------------------------------------------------------------------------
     * Define configuration items
     * --------------------------------------------------------------------------
     * access：config('sample') config('sample.value')
     */
    'general' => [
        'title' => [
            'label' => 'Title',
            'type' => 'text',
            'rules' => 'required|string|max:255',
            'default' => 'gs_smard_v1'
        ],
        'favicon' => [
            'label' => 'Favicon',
            'type' => 'image',
            'rules' => 'string|max:255',
        ],
        'greeting' => [
            'label' => 'Greeting',
            'type' => 'text',
            'rules' => 'required|string|max:255',
            'default' => 'Welcome to Our Website'
        ],
        'highlight' => [
            'label' => 'Highlight',
            'type' => 'text',
            'rules' => 'required|string|max:255',
            'default' => 'Bring Village to Digital'
        ],
        'tagline' => [
            'label' => 'Tagline',
            'type' => 'text',
            'rules' => 'required|string|max:255',
            'default' => 'Be Smart from zero',
        ],
        'action' => [
            'label' => 'Action Label',
            'type' => 'text',
            'rules' => 'required|string|max:255',
            'default' => 'We will provide the best service'
        ],
        'action_btn' => [
            'label' => 'Action Button',
            'type' => 'text',
            'rules' => 'required|string',
            'default' => 'Get Started'
        ],
        'action_url' => [
            'label' => 'Action Url',
            'type' => 'url',
            'rules' => 'string',
            'default' => env('APP_URL')
        ]
    ],

    'village' => [
        'name' => [
            'label' => 'Village Name',
            'type' => 'text',
            'rules' => 'required',
            'default' => 'gs_Smard_v1'
        ],
        'address' => [
            'label' => 'Village Address',
            'type' => 'text',
            'rules' => 'required',
            'default' => 'Klaten, Central Java, Indonesia'
        ],
        'postal_code' => [
            'label' => 'Postal Code',
            'type' => 'text',
        ],
        'day' => [
            'label' => 'Working Days',
            'type' => 'select',
            'options' => ['Everyday', 'Monday - Saturday', 'Monday - Friday']
        ],
        'time' => [
            'label' => 'Working Hours',
            'type' => 'timeRange'
        ],
        'note' => [
            'label' => 'Note',
            'type' => 'text',
            'default' => 'Holiday CLOSED',
            'help' => 'ex. Saturday closed, holiday closed'
        ],
        'desc' => [
            'label' => 'About us',
            'type' => 'textarea',
            'rules' => 'required|string|max:1000',
        ],
        'img' => [
            'label' => 'Image',
            'type' => 'image',
            'help' => 'Upload a 1: 1 (square) image to get the optimized size'
        ],
        'facebook' => [
            'label' => 'Facebook',
            'type' => 'url',
            'rules' => 'required',
            'default' => 'https://facebook.com'
        ],
        'twitter' => [
            'label' => 'Twitter',
            'type' => 'url',
            'rules' => 'required',
            'default' => 'https://twitter.com'
        ],
        'instagram' => [
            'label' => 'Instagram',
            'type' => 'url',
            'rules' => 'required',
            'default' => 'https://instagram.com'
        ]
    ]
];
