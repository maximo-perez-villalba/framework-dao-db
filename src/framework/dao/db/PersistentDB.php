<?php
namespace framework\dao\db;

use framework\dao\Persistent;

abstract class PersistentDB extends Persistent
{
    
    /**
     *
     * @var int
     */
    private $uid = 0;
    
    /**
     * Default constructor
     *
     * @param int $uid
     */
    public function __construct( int $uid )
    {
        $this->uid = $uid;
    }
    
    /**
     *
     * @param int|NULL $uid
     * @return int
     */
    public function uid( int $uid = NULL ): int
    {
        if( isset( $uid ) )
        {
            $this->uid = $uid;
        }
        return $this->uid;
    }
    
}