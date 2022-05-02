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
Esta extensión implementa a través de la clase [DAODB](/src/framework/dao/db/DAODB.php) el CRUD definido en la [clase DAO](https://github.com/maximo-perez-villalba/framework-dao/blob/main/src/framework/dao/DAO.php), para comunicarse con bases de datos a través de [PDO](https://www.php.net/manual/es/class.pdo) (PHP Data Object). A su vez la clase DAODB incorpora métodos específicos para la recuperación de datos desde la bases de datos.


![image:uml-class-daodb.png](/docs/uml-class-daodb.png)

El diagrama de clases muestra el diseño de implementación de la extensión DAODB, donde **los objetos de modelo** deben extender de la clase PersistentDB. Esto implica que las tablas que representan los objetos de modelos deben contener la columna `PRIMARY KEY` bajo el nombre `uid` y de tipo entero.


#### Como se usa
```
<?php
// Para obtener una instancia de la clase DAODB.
$daodb = new DAODB( $objectPersistentDB );

// También puedo obtener una instancia de la clase DAODB desde el objeto persistible. 
$daodb = $objectPersistentDB->dao();

// Para guardar un nuevo objeto de modelo en la base de datos.
$daodb->create();

// También para guardar un nuevo objeto de modelo en la base de datos podemos usar (alias de create).
$daodb->insert();

// Para sincronizar los cambios de un objeto de modelo.
$daodb->update();

// Para borrar un objeto de modelo.
$daodb->delete();

// Para recuperar un o más objetos de modelo almacenados.
$list = DAODB::read( 'nombreColumna = :keyValue1', [':keyValue1'=>'anValue'] );
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
