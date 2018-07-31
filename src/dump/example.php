<?php


/**
 *
 * dump 0.1
 * a PHP replacement of var_dump()
 *
 * by Lenia Labs
 *
 */


include('dump.php');


dump(null);
dump(false);
dump(true);
dump(-1);
dump(-2.1);
dump('hello');
dump([1,2,3,]);
dump(function(){echo 'hello';});
class foo{function bar(){}}
dump(new foo());
dump(curl_init());
