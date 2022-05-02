<?php
namespace demo\dao;

use demo\model\Materia;
use framework\dao\db\DAODB;

class MateriaDAO extends DAODB   
{

    /**
     * 
     * @param Materia $materia
     */
    public function __construct( Materia $materia )
    {
        parent::__construct( $materia );
    }
    
    /**
     *
     * @return string
     */
    public static function tableName():string
    {
        return 'materias';
    }

    /**
     * 
     * @param array $data
     * @return Materia
     */
    public static function dataToObject( array $data ): Materia
    {
        return [];
    }

    /**
     * 
     * {@inheritDoc}
     * @see \framework\dao\db\DAODB::insert()
     */
    public function insert(): bool
    {
        return FALSE;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \framework\dao\DAO::update()
     */
    public function update(): bool
    {
        return FALSE;
    }

}
