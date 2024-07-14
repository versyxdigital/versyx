<?php

/*----------------------------------------
 | Configure application web routes       |
 ----------------------------------------*/
 
return [
    '/' => [
        ['GET', '/', [App\Http\Controllers\HomeController::class, 'index']]
    ],

    // '/prefix' => [
    //    // ...
    // ],
];