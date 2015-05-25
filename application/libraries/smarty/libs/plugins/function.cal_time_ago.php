<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.cal_time_ago.php
 * Type:     function
 * Name:     cal_time_ago
 * Purpose:  Calculate time ago
 * -------------------------------------------------------------
 */
function smarty_function_cal_time_ago($params, &$smarty) {
 
    if(!isset($params['datetimestr'])) {
        $smarty->trigger_error("DateTime Error");
        return;
    }
    if(!isset($params['full'])) {
        $params['full']  = false;
    }
    $datetime = $params['datetimestr'];
    
    $full = $params['full'];

    $now = new DateTime();
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    if ($diff->days > 28) {
        return date('j F Y', strtotime($datetime));
    } else {
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}

?>
