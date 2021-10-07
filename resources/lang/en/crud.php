<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'image' => 'Image',
        ],
    ],

    'user_caris' => [
        'name' => 'User Caris',
        'index_title' => 'Caris List',
        'new_title' => 'New Cari',
        'create_title' => 'Create Cari',
        'edit_title' => 'Edit Cari',
        'show_title' => 'Show Cari',
        'inputs' => [
            'ticari_unvani' => 'Ticari Unvani',
            'cari_kodu' => 'Cari Kodu',
            'adi' => 'Adi',
            'soyadi' => 'Soyadi',
            'vergi_dairesi' => 'Vergi Dairesi',
            'vergi_no' => 'Vergi No',
        ],
    ],

    'caris' => [
        'name' => 'Caris',
        'index_title' => 'Caris List',
        'new_title' => 'New Cari',
        'create_title' => 'Create Cari',
        'edit_title' => 'Edit Cari',
        'show_title' => 'Show Cari',
        'inputs' => [
            'ticari_unvani' => 'Ticari Unvani',
            'cari_kodu' => 'Cari Kodu',
            'adi' => 'Adi',
            'soyadi' => 'Soyadi',
            'vergi_dairesi' => 'Vergi Dairesi',
            'vergi_no' => 'Vergi No',
            'user_id' => 'User',
        ],
    ],

    'cari_projelers' => [
        'name' => 'Cari Projelers',
        'index_title' => 'Projelers List',
        'new_title' => 'New Projeler',
        'create_title' => 'Create Projeler',
        'edit_title' => 'Edit Projeler',
        'show_title' => 'Show Projeler',
        'inputs' => [
            'proje_adi' => 'Proje Adi',
            'sozlezme_no' => 'Sozlezme No',
            'image' => 'Image',
            'baslama_tarihi' => 'Baslama Tarihi',
            'teslim_tarihi' => 'Teslim Tarihi',
            'birim_fiyati' => 'Birim Fiyati',
        ],
    ],

    'projelers' => [
        'name' => 'Projelers',
        'index_title' => 'Projelers List',
        'new_title' => 'New Projeler',
        'create_title' => 'Create Projeler',
        'edit_title' => 'Edit Projeler',
        'show_title' => 'Show Projeler',
        'inputs' => [
            'cari_id' => 'Cari',
            'proje_adi' => 'Proje Adi',
            'sozlezme_no' => 'Sozlezme No',
            'image' => 'Image',
            'baslama_tarihi' => 'Baslama Tarihi',
            'teslim_tarihi' => 'Teslim Tarihi',
            'birim_fiyati' => 'Birim Fiyati',
        ],
    ],

    'projeler_tesisatlars' => [
        'name' => 'Projeler Tesisatlars',
        'index_title' => 'Tesisatlars List',
        'new_title' => 'New Tesisatlar',
        'create_title' => 'Create Tesisatlar',
        'edit_title' => 'Edit Tesisatlar',
        'show_title' => 'Show Tesisatlar',
        'inputs' => [
            'tesisat_no' => 'Tesisat No',
            'baslama_tarihi' => 'Baslama Tarihi',
            'teslim_tarihi' => 'Teslim Tarihi',
            'birim_fiyati' => 'Birim Fiyati',
        ],
    ],

    'tesisatlars' => [
        'name' => 'Tesisatlars',
        'index_title' => 'Tesisatlars List',
        'new_title' => 'New Tesisatlar',
        'create_title' => 'Create Tesisatlar',
        'edit_title' => 'Edit Tesisatlar',
        'show_title' => 'Show Tesisatlar',
        'inputs' => [
            'tesisat_no' => 'Tesisat No',
            'baslama_tarihi' => 'Baslama Tarihi',
            'teslim_tarihi' => 'Teslim Tarihi',
            'projeler_id' => 'Projeler',
            'birim_fiyati' => 'Birim Fiyati',
        ],
    ],

    'tesisatlar_tesisat_is_adimlaris' => [
        'name' => 'Tesisatlar Tesisat Is Adimlaris',
        'index_title' => 'TesisatIsAdimlaris List',
        'new_title' => 'New Tesisat is adimlari',
        'create_title' => 'Create TesisatIsAdimlari',
        'edit_title' => 'Edit TesisatIsAdimlari',
        'show_title' => 'Show TesisatIsAdimlari',
        'inputs' => [
            'data_key' => 'Data Key',
            'title' => 'Title',
            'tahmin_zaman' => 'Tahmin Zaman',
            'gerceklesen_zaman' => 'Gerceklesen Zaman',
            'kayip_zaman' => 'Kayip Zaman',
            'aciklama' => 'Aciklama',
            'ordering' => 'Ordering',
            'state' => 'State',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
