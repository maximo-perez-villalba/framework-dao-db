<?php
namespace demo\model;

use demo\dao\MateriaDAO;
use framework\dao\db\PersistentDB;

class Materia extends PersistentDB
{

    /**
     * @var string
     */
    private $codigo;

    /**
     * @var string
     */
    private $nombre;

    /**
     * 
     * @param int $uid
     */
    public function __construct( int $uid, string $codigo, string $nombre )
    {
        parent::__construct( $uid );
        $this->codigo( $codigo );
        $this->nombre( $nombre );
    }

    /**
     * 
     * {@inheritDoc}
     * @see \framework\dao\Persistent::daoFactory()
     */
    protected function daoFactory(): MateriaDAO
    {
        return new MateriaDAO( $this );
    }

    /**
     * 
     * @param string $nombre
     * @return string
     */
    public function nombre( string $nombre = NULL ): string
    {
        if( isset( $nombre ) )
        {
            $this->nombre = $nombre;
        }
        return $this->nombre;
    }
    
    /**
     * 
     * @param string $codigo
     * @return string
     */
    public function codigo( string $codigo = NULL ): string
    {
        if( isset( $codigo ) )
        {
            $this->codigo = $codigo;
        }
        return $this->codigo;
    }
    
}
