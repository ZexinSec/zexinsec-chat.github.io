<?php

/*
 单点登录token验证登录状态
*/

class Sso
{
    private static $host = "https://sso.lcoce.com";

    public static function verify($ssoToken)
    {
        $data=[
            'ssoToken'=>$ssoToken
        ];
        $result=curl_post(self::$host.'/verify',$data);
        $info=json_decode($result,true);
        
        return $info;
    }


    // 封装post请求
    public static function curl_post($url,$params){
        $headers=array(
            "Content-Type:application/x-www-form-urlencoded",
        );
        $ch = curl_init ();
    
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $params );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_TIMEOUT, 60 );
    
        $result = curl_exec ( $ch );
        curl_close ( $ch );
    
        return $result;
    }
  
}

?>