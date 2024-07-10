<?php

use Versyx\Kernel;

/*----------------------------------------
 | Bootstrap the application              |
 ----------------------------------------*/
require_once __DIR__.'/../config/bootstrap.php';

/*----------------------------------------
 | Dispatch the request-response cycle    |
 ----------------------------------------*/
Kernel::dispatch($app);