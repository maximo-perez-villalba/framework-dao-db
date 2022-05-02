<?php
use demo\dao\AlumnoDAO;

try
{
    $alumno = AlumnoDAO::getObject( 'email = :email', [ ':email' => 'marcos.baldivia@prueba.com' ] );
    
   $responseDB = $alumno->dao()->delete();
    
   if( $responseDB )
   {
       print "<h6>Delete the record uid {$alumno->uid()} from the table {$alumno->dao()->getTableName()}.</h6>";
       print '<hr>';
       print toHtml( $alumno );
   }
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