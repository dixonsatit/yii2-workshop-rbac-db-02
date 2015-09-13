<?php
namespace common\rbac;

use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    public function execute($user_id, $item, $params)
    {
        return isset($params['model']) ? $params['model']->created_by == $user_id : false;
    }
}
 ?>
