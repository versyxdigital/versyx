<?php

use Versyx\Kernel;

/*----------------------------------------
 | Bootstrap the application              |
 ----------------------------------------*/
require_once __DIR__.'/../bootstrap.php';

/*----------------------------------------
 | Dispatch the request-response cycle    |
 ----------------------------------------*/
Kernel::dispatch($app);