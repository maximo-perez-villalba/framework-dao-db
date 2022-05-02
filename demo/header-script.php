<?php
include_once( dirname( __DIR__ ).'/vendor/autoload.php' );
use framework\environment\Env;
Env::init( '/app-config.php' );

function toHtml( $something ): string
{
    $html = '<pre style="display: block; height: 100%; width:100%; overflow: auto;">';
    if( is_null( $something ) )
    {
        $html .= 'NULL';
    }
    else
    {
        $html .= print_r( $something, TRUE );
    }
    $html .= '</pre>';
    return $html;    
}
