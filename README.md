# framework-dao-db
Este proyecto implementa la extensión del framework `maximo-perez-villalba/framework-dao` para base de datos a través de PDO.


## Instalación
Se puede instalar `framework-dao-db` a través de Composer.

1 Desde una consola de comandos ir al directorio del proyecto y ejecutar:
```
composer require maximo-perez-villalba/framework-dao-db
```

2 También agregando en el archivo `composer.json`, dentro de la sección  `"require"`.
```
"require": {
  "maximo-perez-villalba/framework-dao-db": ">=1.0.0"
},
```
2.1 Luego desde una consola de comandos ejecutar:
```
composer update
```


### Extensión DAO para bases de datos (DAODB)
Esta extensión implementa a través de la [clase DAODB](/src/framework/dao/db/DAODB.php) el CRUD definido en la [clase DAO](https://github.com/maximo-perez-villalba/framework-dao/blob/main/src/framework/dao/DAO.php), para comunicarse con bases de datos a través de [PDO](https://www.php.net/manual/es/class.pdo) (PHP Data Object). A su vez la clase DAODB incorpora métodos específicos para la recuperación de datos desde la bases de datos.


![image:uml-class-daodb.png](/docs/uml-class-daodb.png)

El diagrama de clases muestra el diseño de implementación de la extensión DAODB, donde **los objetos de modelo** deben extender de la [clase PersistentDB](/src/framework/dao/db/PersistentDB.php). Esto implica que en la base de datos, las tablas que representan **los objetos de modelo** deben contener la columna `PRIMARY KEY` bajo el nombre `uid` y ser de tipo entero.


#### Como se usa
Como DAODB es una clase abstracta es requerido crear una clases descendientes para su implementación específica.
Con estos fines creamos una clase que se llame Something que extienda de PersistentDB y su respectivo SomethingDAODB que extiende de DAODB.
```
<?php
// Para obtener una instancia de la clase SomethingDAODB.
$daodb = new SomethingDAODB( $somethingPersistentDB );

// También puedo obtener una instancia de la clase SomethingDAODB desde el objeto persistible. 
$daodb = $objectPersistentDB->dao();

// Para guardar una nueva instancia de la clase Something en la base de datos.
$daodb->create();

// También para guardar una nueva instancia de la clase Something en la base de datos, podemos usar (alias de create).
$daodb->insert();

// Para sincronizar los cambios de un objeto de modelo.
$daodb->update();

// Para borrar un objeto de modelo.
$daodb->delete();

// Para recuperar un objeto de modelo almacenado en formato objeto de la clase PersistentDB.
$something = SomethingDAODB::getObject( 'email = :email', [ ':email' => 'cvb.zxzxzx@prueba.com' ] );
$something = SomethingDAODB::getObjectByUid( 1234 );

// Para recuperar datos almacenados en formato mapa de arreglos.
$list = SomethingDAODB::read( 'codigo = :codigo', [':codigo'=>'anValue'] );

// Para recuperar objetos almacenados en formato mapa de objetos.
$list = SomethingDAODB::list( 'email LIKE :pattern', [ ':pattern' => '%@prueba.com' ] );
```


## Documentación


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
