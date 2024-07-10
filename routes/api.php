<?php

/*----------------------------------------
 | Configure application api routes       |
 ----------------------------------------*/
 
return [
  ['GET', '/', [App\Controllers\HomeController::class, 'index']]
];