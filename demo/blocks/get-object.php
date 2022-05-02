<?php
use demo\dao\AlumnoDAO;

try 
{
    $alumno = AlumnoDAO::getObject( 'email = :email', [ ':email' => 'marcos.baldivia@prueba.com' ] );
    
    if( is_null( $alumno ) )
    {
        print "<h6>You should probably run DAO::create.</h6>";
        print '<hr>';
    }    
    
    print toHtml( $alumno );
} 
catch ( Exception $e ) 
{
    print toHtml( $e );
}
