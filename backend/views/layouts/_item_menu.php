<?php

$temp_task = [];
$task = Yii::$app->authManager->getPermissionsByUser(Yii::$app->user->getId());
foreach ($task as $key => $value) {
    $temp_task[] = $key;
}

$troles = [];
$user_roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
foreach ($user_roles as $key => $value) {
    $troles[] = $key;
}
$temp_roles = array_merge($troles, $temp_task);

return[
    '<li class="header">MAIN NAVIGATION</li>',
    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/']],
    ['label' => 'Category', 'icon' => 'bookmark-o',
        'items' => [
            ['label' => 'View Category', 'icon' => 'eye', 'url' => ['category/index']],
            ['label' => 'Create Category', 'icon' => 'book', 'url' => ['category/create']],
        ],
        'visible' => !Yii::$app->user->isGuest 
    ],
    ['label' => 'File', 'icon' => 'file',
        'items' => [
            ['label' => 'View Uploaded File', 'icon' => 'get-pocket', 'url' => ['uploaded-file/index']],
            ['label' => 'Upload a File', 'icon' => 'upload', 'url' => ['uploaded-file/create']],
        ],
        'visible' => !Yii::$app->user->isGuest 
    ], 
    ['label' => 'Post', 'icon' => 'database text-green',
        'items' => [
            ['label' => 'View Post', 'icon' => 'eye', 'url' => ['post/index']],
            ['label' => 'Create Post', 'icon' => 'edit', 'url' => ['post/create']],
            ],
        'visible' => !Yii::$app->user->isGuest
    ],
    '<li class="header">RBAC</li>',
    ['label' => 'RBAC', 'icon' => 'unlock-alt',
                'items' => [
                    ['label' => 'Routes', 'icon' => 'check', 'url' => ['/admin/route']],
                    ['label' => 'Rules', 'icon' => 'check', 'url' => ['/admin/rule']],
                    ['label' => 'Permissions', 'icon' => 'check', 'url' => ['/admin/permission']],
                    ['label' => 'Roles', 'icon' => 'check', 'url' => ['/admin/role']],
                    ['label' => 'Assignment', 'icon' => 'check', 'url' => ['/admin']],
                ],'visible' => !Yii::$app->user->isGuest
            ],
    '<li class="header">ADMIN MENU</li>',
    ['label' => 'Login', 'icon' => 'sign-in', 'iconOptions' => ['class' => 'text-green'], 'url' => ['/site/login'],
        'visible' => Yii::$app->user->isGuest],
    ['label' => 'Auth', 'icon' => 'user-secret', 'iconOptions' => ['class' => 'text-blue'],
        'items' => [
            ['label' => 'Change Password', 'icon' => 'key', 'iconOptions' => ['class' => 'text-yellow'], 'url' => ['/admin/user/change-password']],
            ['label' => 'Logout', 'icon' => 'sign-out', 'linkOptions' => ['data-method' => 'post'], 'iconOptions' => ['class' => 'text-red'], 'url' => ['/site/logout']],
        ],
        'visible' => !Yii::$app->user->isGuest
    ],
];
