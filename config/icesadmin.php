<?php
/**
 * User: Yirius
 * Date: 2018/6/24
 * Time: 23:47
 */
return [
    'config' => [
        'home_path' => "icesadmin/welcome",
        'view_assets' => "/icesadmin/assets"
    ],
    'menu' => [
        'topmenu' => 0,
        'spread' => 0,//如果是false,就是默认全不展开,如果是0及以上,就是展开着一个
        'userinfo' => []//需要返回的用户信息字段
    ],
    'jwt' => [
        'type' => "HS256",//HS256,HS512,HS384,RS256,RS384,RS512
        'key' => "457E01C781E3CED815D89952",
        'rsakey' => [
            'privatekey' => '',
            'publickey' => '',
        ],
        'notbefore' => 0,
        'expire' => 43200//0标识不过期
    ],
    'auth' => [
        'auth_group' => 'ices_admin_group', // 用户组数据表名
        'auth_group_access' => 'ices_admin_group_access', // 用户-用户组关系表
        'auth_rule' => 'ices_admin_rule', // 权限规则表
        'auth_menu' => 'ices_admin_menu',
        'auth_user' => [
            'ices_admin_member'
        ],
        'access_type' => 0,
        'login_field' => "username|phone"
    ],
    'upload' => [
        'images' => [
            'water' => false,
            'validate' => [
                'size' => 1024*1024,
                'ext' => "jpg,png,gif,jpeg,do,bmp"
            ]
        ],
        'files' => [
            'size' => 1024*1024,
            'ext' => "png,jpg,jpeg,gif,bmp,flv,swf,mkv,avi,rm,rmvb,mpeg,mpg,ogg,ogv,mov,wmv,mp4,webm,mp3,wav,mid,rar,zip,tar,gz,7z,bz2,cab,iso,doc,docx,xls,xlsx,ppt,pptx,pdf,txt,md,xml"
        ]
    ]
];
