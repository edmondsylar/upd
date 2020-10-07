<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    function Os(){
        // "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0"
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $os_platform = "Unknown Os Platform";
        $browser = 'Chrome Browser';
        $device = 'Unknown';

        $response = array();

        $browser_array = array(
            '/firefox/i' => 'Firefox',
            '/OPR/'=> 'Opera Mini',
            '/Edg/'=> 'Microsoft Edge',
        );

        foreach ($browser_array as $regex => $value)
            if (preg_match($regex, $user_agent))
                $browser = $value;
                array_push($response, $browser);

        $os_array = array(
            '/windows nt 10/i'      =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value)
            if (preg_match($regex, $user_agent))
                $os_platform = $value;
                array_push($response, $os_platform);

        $device_array = array(
            '/Win64/' => '64bit Windows Machine',
            '/Android/i' => 'Mobile Phone',
        );
        foreach ($device_array as $regex => $value)
        if (preg_match($regex, $user_agent))
                $device = $value;
                array_push($response, $device);

        

        return $response;
    }

    function WIN(){

        return 'WIN';
    }


    function LIN(){
        /**
         * This could mostly cover Linux machines and Phones.
         */

         return 'LIN';
    }
}
