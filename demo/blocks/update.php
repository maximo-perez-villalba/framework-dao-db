<?php
use demo\dao\AlumnoDAO;

try
{
    $alumno = AlumnoDAO::getObjectByEmail( 'marcos.baldivia@prueba.com' );
    $alumno->nombres( 'Marko' );
    $alumno->dao()->update();
    print toHtml( $alumno );
}
catch ( Exception $e )
{
    print toHtml( $e );
}
catch ( Error $e )
{
    print "<h6>You should probably run DAO::create.</h6>";
    print '<hr>';
    print toHtml( $e );
}