<?php


include('../src/dump/dump.php');


dump(null, false, true, -1, 1.2, 'hello', [1,2,3], function(){}, new stdClass(), curl_init());
