<?php

namespace App\My;

//use Illuminate\Support\Facades\DB;

class AjaxForm
{
    public static function error($err) {
        if (is_array($err)) {
            if (count($err)) {
                exit(json_encode([
                    'error' => count($err) > 1 ? '<ol><li>'.implode('</li><li>', $err).'</li></ol>' : array_pop($err)
                ]));
            } else {
                return false;
            }
        } else {
            if ($err) {
                exit(json_encode([ 'error' => $err ]));
            } else {
                return false;
            }
        }
    } 

    public static function mess($err) {
        exit(json_encode([ 'message' => $err ]));
    } 

    public static function redirect($r) {
        //dd($r);
        exit(json_encode([ 'redirect' => $r ]));
    } 
}
