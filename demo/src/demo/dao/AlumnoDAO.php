<?php
namespace demo\dao;

use demo\model\Alumno;
use framework\dao\db\DAODB;

class AlumnoDAO extends DAODB
{

    /**
     * 
     * @param Alumno $alumno
     */
    public function __construct( Alumno $alumno )
    {
        parent::__construct( $alumno );
    }

    /**
     * 
     * {@inheritDoc}
     * @see \framework\dao\DAO::object()
     * @return Alumno
     */
    public function object(): Alumno
    {
        return parent::object();
    }
    
    /**
     * 
     * @return string
     */
    public static function tableName():string
    {
        return 'alumnos';
    }

    /**
     * 
     * @param array $data
     * @return Alumno
     */
    public static function dataToObject( array $data ): Alumno
    {
        return new Alumno(
            $data[ 'uid' ], 
            $data[ 'nombres' ], 
            $data[ 'apellidos' ], 
            $data[ 'email' ]
        );
    }

    /**
     * 
     * @return bool
     */
    public function insert(): bool
    {
        $sqlQuery = 'INSERT INTO ';
        $sqlQuery .= self::tableName();
        $sqlQuery .= ' (nombres, apellidos, email)';
        $sqlQuery .= ' VALUES (:nombres, :apellidos, :email)';
        $statement = self::connection()->prepare( $sqlQuery );
        
        $parameters = [
            ':nombres' => $this->object()->nombres(),
            ':apellidos' => $this->object()->apellidos(),
            ':email' => $this->object()->email()
        ];
        
        $results = $statement->execute( $parameters );
        
        $statement->closeCursor();

        /*
         * Asigna el identificador de bd
         */
        $this->object()->uid( self::connection()->lastInsertId() );
        
        return $results;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \framework\dao\DAO::update()
     */
    public function update(): bool
    {
        $sqlQuery = 'UPDATE ';
        $sqlQuery .= self::tableName();
        $sqlQuery .= ' SET nombres = :nombres, apellidos = :apellidos, email = :email WHERE uid = :uid ';
        $statement = self::connection()->prepare( $sqlQuery );
        
        $parameters = [
            ':nombres' => $this->object()->nombres(),
            ':apellidos' => $this->object()->apellidos(),
            ':email' => $this->object()->email(),
            ':uid' => $this->object()->uid()
        ];
        
        return $statement->execute( $parameters );
    }
    
    /**
     *
     * @param string $email
     * @return array
     */
    static public function readByEmail( string $email ): array
    {
        return self::read( 'email = :email', [ ':email' => $email ] );
    }

    /**
     * 
     * @param string $pattern
     * @return Alumno[]
     */
    static public function ListByEmail( string $pattern ): array
    {
        return self::list( 'email LIKE :pattern', [ ':pattern' => $pattern ] );
    }
    
    /**
     * 
     * @param string $email
     * @return Alumno|NULL
     */
    static public function getObjectByEmail( string $email ): ?Alumno
    {
        return self::getObject( 'email = :email', [ ':email' => $email ] );
    }
}