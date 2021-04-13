<?php
return [
    'url' =>[
        'prefixAdmin'=>'admin',
        'prefixNews'=>'news123',

    ],
    'format' =>[
        'longtime' =>"H:m:s d/m/Y",
        'short_time' =>"d/m/Y",

    ],
    'template'   => [
        'form_label'=>[
            'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
        ],
        'form_input'=>[
            'class' => 'form-control col-md-6 col-xs-12',
        ],
        'form_ckeditor'=>[
            'class' => 'form-control col-md-6 col-xs-12 ckeditor',
        ],
        'status' =>[
              'active' => ['name'=>'Kích hoạt','class'=>'btn-success'],
              'inactive' => ['name'=>'Chưa kích hoạt','class'=>'btn-info'],
             'all' => ['name'=>'Tất cả','class'=>'btn-info'],
             'default' => ['name'=>'Chưa xác dinh ','class'=>'btn-info']
        ],
        'is_home' =>[
            '1' => ['name'=>'Hiển thị','class'=>'btn-success'],
            '0' => ['name'=>'Ẩn','class'=>'btn-info'],
           
       ],
       'level' =>[
        'admin' => ['name'=>'Quản trị hệ thống','class'=>'btn-success'],
        'member' => ['name'=>'User','class'=>'btn-info'],
       
   ],
       'display' =>[
        'list' => ['name'=>'Danh sách'],
        'grid' => ['name'=>'Lưới'],
        'default' => ['name'=>'Chưa thiết lập'],
       
        ],
        'type' =>[
            'feature' => ['name'=>'Nổi bật'],
            'normal' => ['name'=>'Bình thường'],
            
           
        ],
        'search' =>[
            'all' => ['name'=>'search by all'],
           'id' => ['name'=>'search by id'],
           'user' => ['name'=>'search by user'],
           'name' => ['name'=>'search by name'],
           'link' => ['name'=>'search by link'],
           'username' => ['name'=>'search by username'],
           'email' => ['name'=>'search by email'],
           'fullname' => ['name'=>'search by fullname'],
           'description' => ['name'=>'search by description'],
        ],
        'tmplButton' =>[
            'edit'    => ['class' => 'btn-success','title'=>'Edit','icon'=>'fa-pencil','route'=>'/edit'], //,'route-name'=>$controller.'/form'
            'delete'  => ['class' => 'btn-danger','title'=>'delete','icon'=>'fa-trash','route'=>'/delete'],
            'info'    => ['class' => 'btn-info','title'=>'info','icon'=>'fa-pencil','route'=>'Edit'],
        ],
    ],
    'config' =>[
        'search' =>[
            'category' =>['all','id','name'],
            'slider' =>['all','id','name','link','description'],
            'articles' =>['all','id','name'],
            'users'  =>['all','username','email','fullname'],
           'default' =>['all','id','user'],
        ],
        'buttonInArea' =>[
            'default' => ['edit', 'delete'],
            'category' => ['edit','delete'],
            'slider' => ['edit','delete'],
            'articles' => ['edit','delete'],
            'users' => ['edit','delete'],
        ],
        
    ],
]; 