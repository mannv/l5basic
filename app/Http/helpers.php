<?php
/**
 * Created by PhpStorm.
 * User: man.nv
 * Date: 3/12/18
 * Time: 10:47 AM
 */

if (!function_exists('mannvGetENV')) {
    function mannvGetENV()
    {
        return config('app.env');
    }
}