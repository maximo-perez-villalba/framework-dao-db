<?php
namespace framework\dao;

abstract class Persistent
{
    
    /**
     * 
     * @var DAO
     */
    private $dao = NULL;

    /**
     * 
     * @return DAO
     */
    public function dao(): DAO
    {
        if( is_null( $this->dao ) )
        {
            $this->dao = $this->daoFactory();
        }
        return $this->dao;
    }
    
    /**
     * 
     * @return DAO
     */
    protected abstract function daoFactory(): DAO;
    
}