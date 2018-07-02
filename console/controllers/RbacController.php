<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        
        /**
         * Permisions
         */
        
        //create and add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'User can create a post';
        $auth->add($createPost);
        
        // create and add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'User can update post';
        $auth->add($updatePost);
        
        /**
         * Roles
         */
        
        // create and add "user" Role
        $user = $auth->createRole('user');
        $auth->add($user);
        
        // create and add "author" Role
        $author = $auth->createRole('author');
        $auth->add($author);
        
        // create and add "admin" Role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        
        /**
         * Mutual Connections
         */
        
        // "author" can create new Post
        $auth->addChild($author, $createPost);
        
        // "admin" can do everithing what "author" can
        $auth->addChild($admin, $author);
        // ... and ...
        // "admin" can update ALL Posts
        $auth->addChild($admin, $updatePost);
    }
//public function actionCreateAuthorRule() 
//{
//    $auth = Yii::$app->authManager;
//
//    // add the rule
//    $rule = new \console\rbac\AuthorRule();
//    $auth->add($rule);
//
//    // add the "UpdateOwnPost" permission abd associate the rule with it.
//    $updateOwnPost = $auth->createPermission('updateOwnPost');
//    
//    
//}

}