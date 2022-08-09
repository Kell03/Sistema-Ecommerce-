<?php 


//key value from json

function kvfj($json, $key){

    if($json == null){


        return null;

    }

    else{

        $json = $json;
        $json = json_decode($json, true);
        if(array_key_exists($key, $json)):


            return $json[$key];

        else:

            return null;

        endif;



    }

}


function permission(){


    $p = ['dashboard'=>[

        'title'=> 'Dashboard',
        'icon'=> '<i class="fa-solid fa-house"></i>',

        'keys' => [

          'dashboard'=>'Acceso al Dashboard.',
          'estadisticas_rapidas' => 'Acceso a las Estadisticas Rapidas.',
          'estadisticas_admin'=>'Acceso a las Estadisticas de compras.'


        ]





    ],
         'User Module'=>[


        'title'=>'User Module',
        'icon'=>'<i class="fa-solid fa-users"></i> ',


        'keys' => [

         'index_user' => 'Acceso a los Usuarios.',
         'edit_user'=>'Permiso para editar Usuarios.',
         'suspender_user'=>'Permiso para suspender Usuarios.',
         'permission_user'=> 'Permiso para otorgar permisos.',
         'role_user'=> 'Permiso para otorgar role.'
        ]

       


       ],


       'Products'=>[


        'title'=>'Products Module',
        'icon'=>'<i class="fa-solid fa-boxes-stacked"></i>',


        'keys' =>[

         'index_product'=> 'Acceso a los Productos.',
         'create_product'=> 'Permiso para agregar Productos.',
         'edit_product'=> 'Permiso para editar Productos.',
         'edit_product'=> 'Permiso para eliminar Productos.',
         'product_restore'=> 'Permiso para restaurar Productos.'


        ]




       ],

       'Categories'=>[

        'title'=>'Categories Module',
        'icon'=>'<i class="fa-solid fa-clipboard-list"></i>',

        'keys' =>[

         'index_category'=> 'Acceso a las categorias.',
         'create_category'=> 'Permiso para agregar Categorias.',
         'edit_category'=> 'Permiso para editar Categorias.',
         'category.delete'=> 'Permiso para eliminar Categorias.',
        




        ]


       ]



    ];

    return $p;
}

    




 ?>