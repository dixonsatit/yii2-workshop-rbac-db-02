<?php return [
  'class'=>'\common\rbac\GlobalAccessBehavior',
  'rules'=>[
      [
        'controllers'=>['site'],
        'allow' => true,
        'roles' => ['@',],
        //'actions'=>['logout','error','index']
      ],[
         'controllers'=>['site'],
         'allow' => true,
         'roles' => ['?'],
         'actions'=>['login','error','index']
     ],[
        'controllers'=>['blog'],
        'allow' => true,
        'roles' => ['Author'],
        'actions'=>['index','view','update','create']
     ],[
        'controllers'=>['blog'],
        'allow' => true,
        'roles' => ['Management'],
        'actions'=>['delete']
     ],[
           'controllers'=>['debug/default'],
           'allow' => true,
           'roles' => ['?'],
     ],[
            'allow' => true,
            'roles' => ['Author']
    ]
  ]
];
