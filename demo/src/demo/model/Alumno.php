<?php
namespace demo\model;

use demo\dao\AlumnoDAO;
use framework\dao\db\PersistentDB;

class Alumno extends PersistentDB
{

    /**
     * @var string
     */
    private $nombres;

    /**
     * @var string
     */
    private $apellidos;

    /**
     * @var string
     */
    private $email;

    /**
     * 
     * @param int $uid
     */
    public function __construct( int $uid, string $nombres, string $apellidos, string $email )
    {
        parent::__construct( $uid );
        $this->nombres( $nombres );
        $this->apellidos( $apellidos );
        $this->email( $email );
    }

    /**
     * 
     * {@inheritDoc}
     * @see \framework\dao\Persistent::daoFactory()
     */
    protected function daoFactory(): AlumnoDAO
    {
        return new AlumnoDAO( $this );
    }

    /**
     * 
     * {@inheritDoc}
     * @see \framework\dao\Persistent::dao()
     */
    public function dao(): AlumnoDAO
    {
        return parent::dao();
    }

    /**
     * 
     * @param string $nombres
     * @return string
     */
    public function nombres( string $nombres = NULL ): string
    {
        if( isset( $nombres ) )
        {
            $this->nombres = $nombres;
        }
        return $this->nombres;
    }
    
    /**
     * 
     * @param string $apellidos
     * @return string
     */
    public function apellidos( string $apellidos = NULL ): string
    {
        if( isset( $apellidos ) )
        {
            $this->apellidos = $apellidos;
        }
        return $this->apellidos;
    }
    
    /**
     * 
     * @param string $email
     * @return string
     */
    public function email( string $email = NULL ): string
    {
        if( isset( $email ) )
        {
            $this->email = $email;
        }
        return $this->email;
    }
    
}
