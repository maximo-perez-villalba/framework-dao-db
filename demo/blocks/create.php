<?php 
use demo\model\Alumno;

try
{
    $alumno = new Alumno( 0, 'Marcos', 'Baldivia', 'marcos.baldivia@prueba.com' );
    
    $alumno->dao()->create();
    
    print "<h6>Insert the record with uid {$alumno->uid()} in the table {$alumno->dao()->getTableName()}.</h6>";
    print '<hr>';
    print toHtml( $alumno );
}
catch ( Exception $e )
{
    print "<h6>You should probably run DAO::delete.</h6>";
    print '<hr>';
    print toHtml( $e );
}