<?php
use demo\dao\AlumnoDAO;

try 
{
    //$alumno = AlumnoDAO::read( 'email = :email', [ ':email' => 'marcos.baldivia@prueba.com' ] );
    $alumno = AlumnoDAO::readByEmail( 'marcos.baldivia@prueba.com');
    print toHtml( $alumno );
} 
catch ( Exception $e ) 
{
    print toHtml( $e );
}
