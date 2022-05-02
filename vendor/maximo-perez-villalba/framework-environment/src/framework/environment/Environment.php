<?php
namespace framework\environment;

use ErrorException;
use PDO;
use PDOException;

abstract class Environment
{
    
    /**
     *
     * @var string
     */
    static private $path = '';
    
    /**
     *
     * @var array
     */
    static private $appConfig = [];
    
    /**
     *
     * @param string $pathConfig
     * @throws ErrorException
     */
    static public function init( string $pathConfig )
    {
        /*
         * Recupera la ruta del archivo que invoca a Env::init().
         */
        $backtrace = debug_backtrace( DEBUG_BACKTRACE_PROVIDE_OBJECT, 1 );
        
        self::$path = dirname( $backtrace[ 0 ][ 'file' ] );
        
        /*
         * Configuración la zona horaria del servidor.
         */
        date_default_timezone_set( 'America/Argentina/Buenos_Aires' );
        
        /*
         * Levanta el archivo de configuración de la aplicación
         */
        $appConfig = [];
        include_once self::path( $pathConfig );
        self::$appConfig = $appConfig;
        
        self::errorConfig();
    }
    
    /**
     * Configuracion de captura y salida de errores
     * @param array $appConfig
     */
    static private function errorConfig()
    {
        ini_set( 'log_errors', TRUE );
        ini_set( 'error_log', self::pathErrorsLog() );
        error_reporting( E_ALL );
    }
    
    /**
     *
     * @return string
     */
    static private function pathErrorsLog(): string
    {
        $path = '/errors-default.log';
        if( isset( self::$appConfig[ 'path-log' ] ) )
        {
            $path = self::$appConfig[ 'path-log' ];
        }
        return self::path( $path );
    }

    /**
     * 
     * @return string
     */
    static public function urlHost(): string
    {
        $url = '';
        if( isset( self::$appConfig[ 'url-host' ] ) )
        {
            $url = self::$appConfig[ 'url-host' ];
        }
        return $url;
    }
    
    /**
     * Retorna una conexión a la base de datos.
     * En caso de no poder obtener una conexión lanza una exception.
     * 
     * @throws PDOException
     * @return PDO
     */
    static public function dbConnection(): PDO
    {
        $conexion = NULL;
        if ( self::$appConfig[ 'db' ] )
        {
            $conexion = new PDO( 
                self::$appConfig[ 'db' ][ 'dns' ], 
                self::$appConfig[ 'db' ][ 'username' ], 
                self::$appConfig[ 'db' ][ 'password' ]
            );
            $conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        return $conexion;
    }
    
    /**
     *
     * @param string $extension
     * @return string
     */
    static public function path( ?string $extension ): string
    {
        if ( isset( $extension ) )
        {
            return self::$path.$extension;
        }
        return self::$path;
    }
    
    /**
     *
     * @param string $extension
     * @return string
     */
    static public function url( string $extension = NULL ): string
    {
        if ( isset( $extension ) )
        {
            return self::urlbase().$extension;
        }
        return self::urlbase();
    }

    /**
     * 
     * @return string
     */
    static public function urlbase() : string
    {
        return self::urlHost().'/';
    }
    
    /**
     *
     * @param mixed $anObject
     * @param boolean $stopExecution
     */
    static public function console( $anObject, $stopExecution = FALSE )
    {
        if( is_null( $anObject ) )
        {
            $data = 'NULL';
        }
        else
        {
            $data = print_r( $anObject, TRUE );
        }
        $data .= chr( 13 );
        
        file_put_contents( self::pathErrorsLog(), $data, FILE_APPEND );
        
        if( $stopExecution )
        {
            die();
        }
    }
}