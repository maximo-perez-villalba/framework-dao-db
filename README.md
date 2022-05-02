# framework-dao-db
Extensión de framework-dao para base de datos a través de PDO.



### Extensión DAO para bases de datos (DAODB)

![image:uml-class-dao-db.png](/docs/uml-class-dao-db.png)





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
