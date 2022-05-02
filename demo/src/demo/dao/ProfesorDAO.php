<?php
namespace demo\dao;

use demo\model\Profesor;
use framework\dao\db\DAODB;

class ProfesorDAO extends DAODB
{

    /**
     * 
     * @param Profesor $profesor
     */
    public function __construct( Profesor $profesor )
    {
        parent::__construct( $profesor );
    }
    
    /**
     *
     * @return string
     */
    public static function tableName():string
    {
        return 'profesores';
    }

    /**
     * 
     * @param array $data
     * @return Profesor
     */
    public static function dataToObject( array $data ): Profesor
    {
        return [];
    }
    
    /**
     *
     * @return bool
     */
    public function insert(): bool
    {
        return FALSE;
    }
    public function update(): bool
    {
        return FALSE;
    }

}
