<?php
namespace framework\dao\db;

use framework\dao\DAO;
use framework\dao\Persistent;
use framework\environment\Env;
use PDO;

abstract class DAODB extends DAO
{
    
    /**
     * 
     * @var PDO
     */
    static private $connection = NULL;
    
    /**
     * {@inheritDoc}
     * @see \framework\dao\DAO::__construct()
     */
    public function __construct( Persistent $anObject )
    {
        parent::__construct( $anObject );
    }

    /**
     * 
     * @return PDO
     */
    static protected function connection(): PDO
    {
        if ( !isset( self::$connection ) ) 
        {
            self::$connection = Env::dbConnection();
        }
        return self::$connection;
    }
    
    /**
     * 
     * @return string
     */
    abstract static public function tableName(): string;
    
    /**
     * 
     * @return string
     */
    public function getTableName(): string
    {
        return static::tableName();
    }
    
    /**
     * {@inheritDoc}
     * @see \framework\dao\DAO::create()
     */
    public function create(): bool
    {
       return $this->insert();
    }

    /**
     * {@inheritDoc}
     * @see \framework\dao\DAO::delete()
     */
    public function delete(): bool
    {
        $sql = 'DELETE FROM '.static::tableName().' WHERE uid = :uid ';
        $statement = self::connection()->prepare( $sql );
        
        $parameters = [ ':uid' => $this->object()->uid() ];
        return $statement->execute( $parameters );
    }

    /**
     * 
     * @param string $filters
     * @param array $arguments
     * @return array
     * 
     * {@inheritDoc}
     * @see \framework\dao\DAO::read()
     */
    public static function read( string $filters = NULL, array $arguments = [] ): array
    {
        
        //Armado de sentencia
        $querySQL = 'SELECT * FROM '. static::tableName();
        if( isset( $filters ) )
        {
            $querySQL .= " WHERE {$filters}";
        }
        
        //compilado de consulta
        $statement =self::connection()->prepare( $querySQL );
        $statement->setFetchMode( PDO::FETCH_ASSOC );
        
        //consulta a motor de bd
        $control = $statement->execute( $arguments );
        
        if( !$control )
        {
            $message = $querySQL.chr(13);
            $message .= print_r( $arguments, TRUE ).chr(13);
            $message .= $statement->errorInfo().chr(13);
            $statement->closeCursor();
            throw Exception( $message );
        }
        
        $results = $statement->fetchAll();
        
        $statement->closeCursor();
        
        return $results;
        
    }

    /**
     * 
     * @param array $data
     * @return Persistible|NULL
     */
    abstract static protected function dataToObject( array $data ): ?Persistent;
    
    /**
     * 
     * @param string $filters
     * @param array $arguments
     * @return Persistent|NULL
     */
    static public function getObject( string $filters = NULL, array $arguments = [] ): ?Persistent 
    {
        $results = self::read( $filters, $arguments );
        $object = NULL;
        if( !empty( $results ) )
        {
            $object = static::dataToObject( reset( $results ) );
        }
        return $object;
    }
    
    /**
     *
     * @param int $uid
     * @return Persistent|NULL
     */
    static public function getObjectByUid( int $uid ): ?Persistent
    {
        return self::getObject( 'uid = :uid', [ ':uid' => $uid ] );
    }
    
    /**
     * 
     * @param string $filters
     * @param array $arguments
     * @return Persistent[]
     */
    static public function list( string $filters = NULL, array $arguments = [] ): array
    {
        $results = self::read( $filters, $arguments );
        $objects = [];
        foreach ( $results as $data )
        {
            $object = static::dataToObject( $data );
            $objects[ $object->uid() ] = $object;
        }
        return $objects;
    }    
    
    /**
     * 
     * @return bool
     */
    abstract public function insert(): bool; 
    
}
