<?php

return [
    /*
     * --------------------------------------------------------------------------
     * Define configuration groups
     * --------------------------------------------------------------------------
     * Each configuration group will be rendered as a TAB page
     */
    'admin_config_groups' => [
        'general' => 'Profil Desa',
    ],
    /**
     * --------------------------------------------------------------------------
     * Define configuration items
     * --------------------------------------------------------------------------
     * access：config('sample') config('sample.value')
     */
    'general' => [
        'name' => [
            'label' => 'Nama Desa',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        'country' => [
            'label' => 'Negara',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        'province' => [
            'label' => 'Provinsi',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        'distric' => [
            'label' => 'Kabupaten',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        'sub_distric' => [
            'label' => 'Kecamatan',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        'address' => [
            'label' => 'Alamat',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        'desc' => [
            'label' => 'Deskripsi',
            'type' => 'textarea',
            'rules' => 'required|string|max:255',
        ],
        'logo' => [
            'label' => 'Logo',
            'type' => 'image',
            'rules' => 'required|string|max:255',
        ],
    ],
];
