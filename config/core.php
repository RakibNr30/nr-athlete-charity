<?php

return [
    // admin menu
    'admin_menu' => [
        [
            "name" => "Dashboard",
            "id" => "dashboard",
            "icon" => "icon-graph",
            "url" => "/backend/dashboard",
            "permission" => "Dashboard",
            "children" => []
        ],
        [
            "name" => "My Profile",
            "id" => "my_profile",
            "icon" => "fa fa-user-circle",
            "url" => "/backend/profile/personal-info",
            "permission" => "My Profile",
            "children" => []
        ],
        [
            "name" => "Cms",
            "id" => "cms",
            "icon" => "fa fa-cogs",
            "url" => "",
            "permission" => "Cms",
            "children" => [
                [
                    "name" => "Banner",
                    "id" => "banner",
                    "icon" => "",
                    "url" => "/backend/banner",
                    "permission" => "Banner",
                ],
                [
                    "name" => "About Us",
                    "id" => "about_us",
                    "icon" => "",
                    "url" => "/backend/about-us",
                    "permission" => "About Us",
                ],
                [
                    "name" => "Cases",
                    "id" => "cases",
                    "icon" => "",
                    "url" => "/backend/cases",
                    "permission" => "Cases",
                ],
                [
                    "name" => "News",
                    "id" => "news",
                    "icon" => "",
                    "url" => "/backend/news",
                    "permission" => "News",
                ],
                [
                    "name" => "Team",
                    "id" => "team",
                    "icon" => "",
                    "url" => "/backend/team",
                    "permission" => "Team",
                ],
                [
                    "name" => "FAQ",
                    "id" => "faq",
                    "icon" => "",
                    "url" => "/backend/faq",
                    "permission" => "Faq",
                ],
                [
                    "name" => "Testimonials",
                    "id" => "testimonials",
                    "icon" => "",
                    "url" => "/backend/testimonial",
                    "permission" => "Testimonials",
                ],
                [
                    "name" => "Partners",
                    "id" => "partners",
                    "icon" => "",
                    "url" => "/backend/partner",
                    "permission" => "Partners",
                ],
                [
                    "name" => "Privacy Policy",
                    "id" => "privacy_policy",
                    "icon" => "",
                    "url" => "/backend/privacy-policy",
                    "permission" => "Privacy Policy",
                ],
                [
                    "name" => "Public Message",
                    "id" => "public_message",
                    "icon" => "",
                    "url" => "/backend/public-message",
                    "permission" => "Privacy Policy",
                ],
            ]
        ],
        [
            "name" => "Rice",
            "id" => "rice",
            "icon" => "fas flaticon-rice",
            "url" => "/backend/rice",
            "permission" => "Rice",
            "children" => []
        ],
        [
            "name" => "Donation",
            "id" => "donation",
            "icon" => "fas icon-coin-euro",
            "url" => "/backend/donation",
            "permission" => "donation",
            "children" => []
        ],
        [
            "name" => "User Controls",
            "id" => "user_controls",
            "icon" => "fa fa-user-cog",
            "url" => "/backend/admin",
            "permission" => "User Controls",
            "children" => [
                [
                    "name" => "Admin",
                    "id" => "admin",
                    "icon" => "",
                    "url" => "/backend/admin",
                    "permission" => "Admin",
                ],
                [
                    "name" => "Athlete",
                    "id" => "athlete",
                    "icon" => "",
                    "url" => "/backend/athlete",
                    "permission" => "Athlete",
                ]
            ]
        ],
        [
            "name" => "App Settings",
            "id" => "app_settings",
            "icon" => "fa fa-globe",
            "url" => "",
            "permission" => "App Settings",
            "children" => [
                [
                    "name" => "Site",
                    "id" => "site",
                    "icon" => "",
                    "url" => "/backend/site",
                    "permission" => "Site",
                ],
                [
                    "name" => "Contact",
                    "id" => "contact",
                    "icon" => "",
                    "url" => "/backend/contact",
                    "permission" => "Contact",
                ],
                [
                    "name" => "Seo",
                    "id" => "seo",
                    "icon" => "",
                    "url" => "/backend/seo",
                    "permission" => "Seo",
                ],
                [
                    "name" => "Api",
                    "id" => "api",
                    "icon" => "",
                    "url" => "/backend/api",
                    "permission" => "Api",
                ]
            ]
        ]
    ],
    // front menu
    'front_menu' => [
        [
            "name" => "Home",
            "name_de" => "Home",
            "id" => "home",
            "icon" => "",
            "url" => "/",
            "permission" => "",
            "children" => []
        ],
        [
            "name" => "About us",
            "name_de" => "Über uns",
            "id" => "about_us",
            "icon" => "",
            "url" => "/about-us",
            "permission" => "",
            "children" => []
        ],
        [
            "name" => "FAQ",
            "name_de" => "FAQ",
            "id" => "faq",
            "icon" => "",
            "url" => "/faq",
            "permission" => "",
            "children" => []
        ],
        [
            "name" => "Team",
            "name_de" => "Team",
            "id" => "team",
            "icon" => "",
            "url" => "/team",
            "permission" => "",
            "children" => []
        ],
        [
            "name" => "News",
            "name_de" => "News",
            "id" => "news",
            "icon" => "",
            "url" => "/news",
            "permission" => "",
            "children" => [],
        ],
        [
            "name" => "Contact",
            "name_de" => "Kontakt",
            "id" => "contact",
            "icon" => "",
            "url" => "/contact",
            "permission" => "",
            "children" => []
        ],
    ],
    // profile menu
    'profile_menu' => [
        [
            "name" => "Personal Info",
            "id" => "personal_info",
            "icon" => "icon-profile",
            "url" => "/backend/profile/personal-info",
            "permission" => "personal_info",
            "children" => []
        ],
        [
            "name" => "Residential Info",
            "id" => "residential_info",
            "icon" => "icon-address-book",
            "url" => "/backend/profile/residential-info",
            "permission" => "residential_info",
            "children" => []
        ],
        [
            "name" => "Account Info",
            "id" => "account_info",
            "icon" => "icon-user",
            "url" => "/backend/profile/account-info",
            "permission" => "account_info",
            "children" => []
        ],
        [
            "name" => "Password Change",
            "id" => "password_change",
            "icon" => "icon-key",
            "url" => "/backend/profile/password-change",
            "permission" => "password_change",
            "children" => []
        ],
    ],
    // genders
    'genders' => [
        'Male' => 'Male',
        'Female' => 'Female',
        'Others' => 'Others'
    ],
    // blood groups
    "blood_groups" => [
        "A (+ve)" => "A (+ve)",
        "A (-ve)" => "A (-ve",
        "B (+ve)" => "B (+ve)",
        "B (-ve" => "B (-ve",
        "O (+ve)" => "O (+ve)",
        "O (-ve" => "O (-ve",
        "AB (+ve)" => "AB (+ve)",
        "AB (-ve" => "AB (-ve",
    ],
    // media collection
    'media_collection' => [
        'banner' => [
            'avatar_one' => 'banner_avatar_one',
            'avatar_two' => 'banner_avatar_two',
        ],
        'page' => [
            'image' => 'page_feature_image',
        ],
        'testimonial' => [
            'avatar' => 'testimonial_avatar',
        ],
        'partner' => [
            'logo' => 'partner_logo',
        ],
        'news' => [
            'image' => 'news_image',
            'attachment' => 'news_attachment'
        ],
        'team' => [
            'avatar' => 'team_member_avatar',
        ],
        'cases' => [
            'image' => 'cases_image',
            'attachment' => 'cases_attachment'
        ],
        'user' => [
            'avatar' => 'user_avatar',
        ],
        'user_personal_info' => [
            'image' => 'user_personal_info_image'
        ],
        'setting_site' => [
            'logo' => 'setting_site_logo',
            'logo_sticky' => 'setting_site_logo_sticky',
            'favicon' => 'setting_site_favicon',
            'breadcrumb_image' => 'setting_site_breadcrumb_image',
        ],
    ],
    // default image
    'image' => [
        'default' => [
            'logo' => '/front/images/default/logo.png',
            'logo_sticky' => '/front/images/default/logo_sticky.png',
            'favicon' => '/front/images/default/favicon.png',
            'avatar_male' => '/front/images/default/avatar-male.jpeg',
            'avatar_female' => '/front/images/default/avatar-female.png',
            'preview_image' => '/front/images/default/preview.png',
            'breadcrumb_image' => '/front/images/default/breadcrumb.jpg',
            'avatar_one' => '/front/images/default/avatar-one.png',
            'avatar_two' => '/front/images/default/avatar-two.png',
            'footer_image' => '/front/images/default/footer.jpg',
        ]
    ]
];
