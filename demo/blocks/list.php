<?php
use demo\dao\AlumnoDAO;

try 
{
    //$alumnos = AlumnoDAO::list( 'email LIKE :pattern', [ ':pattern' => '%@prueba.com' ] );
    $alumnos = AlumnoDAO::ListByEmail( '%@prueba.com' );
    print toHtml( $alumnos );
} 
catch ( Exception $e ) 
{
    print toHtml( $e );
}
