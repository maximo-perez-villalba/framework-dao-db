<?php
namespace framework\dao;

abstract class DAO
{

    /**
     * 
     * @var Persistent
     */
    private $object = NULL;

    /**
     * 
     * @param Persistent $anObject
     */
    public function __construct( Persistent $anObject )
    {
        $this->object = $anObject;
    }

    /**
     * 
     * @return Persistent|NULL
     */
    public function object(): ?Persistent
    {
        return $this->object;
    }
    
    /**
     * 
     * @return bool
     */
    public abstract function create(): bool;

    /**
     * 
     * @param string|NULL $filters
     * @param array $arguments
     * @return array
     */
    public static abstract function read( string $filters = NULL, array $arguments = [] ): array;

    /**
     * 
     * @return bool
     */
    public abstract function update(): bool;

    /**
     * 
     * @return bool
     */
    public abstract function delete():bool;

}
