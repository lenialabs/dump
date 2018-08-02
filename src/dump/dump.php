<?php


/**
 *
 * dump 0.1
 * A PHP replacement of var_dump()
 *
 * by LeniaLabs
 *
 *
 * 0.1      2018-07-31 init
 * 0.1.1    2018-07-31 added file and line
 */


function dump ()
{
    foreach (func_get_args() as $arg) {
        $var = $arg;
        echo '<br />';
        echo '<div style="font-family:monospace;font-size:1.5em;color:black;background-color:white;border-left:solid 5px #e0e0e0;padding:5px;">';
        $debug_backtrace = debug_backtrace();
        echo $debug_backtrace[0]['file'] . '(' . $debug_backtrace[0]['line'] . ')<br />';
        echo '&nbsp;';
        $html_type_prefix = '<i>';
        $html_type_suffix = '</i>';
        $html_value_prefix = '<span style="font-weight:bold;color:green;">';
        $html_value_suffix = '</span>';
        if (null === $var) {
            echo $html_value_prefix . 'null' . $html_value_suffix;
        } elseif (is_scalar($var)) {
            if (is_string($var)) {
                echo $html_type_prefix . gettype($var) . '(' . strlen($var) . ',' . mb_strlen($var) . ')' . $html_type_suffix . ' ';
                echo $html_value_prefix . '"' . addslashes($var) . '"' . $html_value_suffix;
            } else {
                echo $html_type_prefix . gettype($var) . $html_type_suffix . ' ';
                if (is_bool($var)) {
                    if ($var === false) {
                        $var = 'false';
                    } else {
                        ($var = 'true');
                    }
                }
                echo $html_value_prefix . $var . $html_value_suffix;
            }
        } elseif (is_array($var)) {
            echo $html_type_prefix . 'array(' . count($var) . ')' . $html_type_suffix;
        } elseif (is_callable($var)) {
            echo $html_type_prefix . 'callable';
            if (is_object($var)) {
                echo ' object ' . get_class($var) . '(' . count(get_class_methods($var)) . ')' . $html_type_suffix;
                $methods = get_class_methods($var);
                sort($methods);
                array_walk($methods, function(&$value, $key) {
                    $value = $value . '()';
                });
                echo ' ' . $html_value_prefix . implode(' ', $methods) . $html_value_suffix;
            } else {
                echo $html_type_suffix;
            }
        } elseif (is_object($var)) {
            echo $html_type_prefix . 'object ' . get_class($var) . '(' . count(get_class_methods($var)) . ' methods)' . $html_type_suffix;
            $methods = get_class_methods($var);
            sort($methods);
            array_walk($methods, function(&$value, $key) {
                $value = $value . '()';
            });
            echo ' ' . $html_value_prefix . implode(' ', $methods) . $html_value_suffix;
            // exceptions
            if (substr(get_class($var), -9) == 'Exception' && method_exists($var, 'getPrevious')) {
                echo '<br />';
                $exception = $var;
                do {
                    echo 'Exception: ' . $exception->getMessage() . '<br />';
                    echo 'File(Line): ' . $exception->getFile() . '(' . $exception->getLine() . ')<br />';
                    $previous = $exception->getPrevious();
                } while ($previous);
            }
        } elseif (is_resource($var)) {
            echo $html_type_prefix . 'resorce' . $html_type_suffix . ' ' . $html_value_prefix . get_resource_type($var) . $html_value_suffix;
        }
        echo '</div>';
    }
    die();
}
