# framework-dao-db
Este proyecto implementa la extensión del framework `maximo-perez-villalba/framework-dao` para base de datos a través de PDO.



## Extensión DAO para bases de datos (DAODB)
Esta extensión implementa a través de la clase [DAODB](/src/framework/dao/db/DAODB.php) el CRUD definido en la [clase DAO](https://github.com/maximo-perez-villalba/framework-dao/blob/main/src/framework/dao/DAO.php), para comunicarse con bases de datos a través de [PDO](https://www.php.net/manual/es/class.pdo) (PHP Data Object). A su vez la clase DAODB incorpora métodos específicos para la recuperación de datos desde la bases de datos.

![image:uml-class-daodb.png](/docs/uml-class-daodb.png)





#### DAODB::create

##### UML diagram sequence
![image:uml-sequence-daodb-create.png](/docs/uml-sequence-daodb-create.png)

##### PHP script sequence
```
<?php
$alumno = new Alumno( 0, 'Azalea', 'Rojas', 'azalea.rojas@prueba.com' );
{
  $dao = $this->dao();
  $dao->create()
  {
    $this->insert()
    {
      $conn = $this->connection();    
      $statement = $conn->prepare($sqlQuery);
      $statement->execute( $parameters );
      $statement->closeCursor();
      $lastUid = $conn->lastInsertId();
      $this->object()->uid($lastUid);
    }
  }
}
```
