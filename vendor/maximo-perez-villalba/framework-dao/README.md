# framework-dao
El proyecto implementa un framework liviano de persistencia orientado a objectos escrito en PHP. 
El framework esta basado en el patrón de diseño DAO (Data Access Object) y  su fin principal es de apoyo pedagógico.


## Instalación
Se puede instalar `framework-dao` a través de Composer.

1 Desde una consola de comandos ir al directorio del proyecto y ejecutar:
```
composer require maximo-perez-villalba/framework-dao
```

2 También agregando en el archivo `composer.json`, dentro de la sección  `"require"`.
```
"require": {
  "maximo-perez-villalba/framework-dao": ">=1.0.0"
},
```
2.1 Luego desde una consola de comandos ejecutar:
```
composer update
```

## Documentación


### Patrón DAO
El patrón DAO propone una solución al problema de persistir **objetos** en distintos medios de almacenamiento como son: xml, json, bases de datos relacionales o no, almacenamiento en la nube, etc. Buscando independizar **los objetos del modelo** de **los medios concretos donde se persisten** y permitiendo la cohexistencia de multiples medios de almacenamiento simultaneos.

Al hablar de persistencia de objetos, son 4 las operaciones elementales que son necesarias: 
* **Guardar** un nuevo objeto
* **Leer** uno o una lista objectos
* **Actualizar** un objeto
* **Eliminar** un objeto

Operaciones conocidas por sus siglas en ingles CRUD (Create, Read, Update, Delete).

La implementación del patrón DAO esta basado en el patrón estructural [Decorator](https://es.wikipedia.org/wiki/Decorator_(patr%C3%B3n_de_dise%C3%B1o)). De tal manera que los objetos DAO envuelven a los objetos del modelo. Permitiendo de esta manera un bajo nivel de acoplamiento de **los objetos del modelo** con **los objetos DAO** que implementan la lógica de persistencia.

![image:uml-clas-dao-pattern.png](/docs/uml-class-dao-pattern.png)

El diagrama de clases muestra el diseño de implementación del patrón DAO, poniendo todo el comportamiento CRUD dentro de la [clase DAO](/src/framework/dao/DAO.php) y requiriendo de **los objetos del modelo** extender de la [clase Persistent](/src/framework/dao/Persistent.php).

#### Como usar
```
<?php
// Para obtener una instancia de la clase DAO.
$dao = new DAO( $objectPersistent );

// También puedo obtener una instancia de la clase DAO desde el objeto persistible. 
$dao = $objectPersistent->dao();

// Para guardar un nuevo objeto de modelo en el medio de almacenamiento.
$dao->create();

// Para sincronizar los cambios de un objeto de modelo.
$dao->update();

// Para borrar un objeto de modelo.
$dao->delete();

// Para recuperar un o más objetos de modelo almacenados.
$list = DAO::read( 'filtro/s de selección', ['argumento1'=>'value1', 'argumentoN'=>'valueN'] );
```

De esta manera la clase DAO expone una interfaz de alto nivel, que permite desacoplar **los objetos del modelo** del **medio de almacenamiento**, como así también de la implementación específica para cada medio de almacenamiento.


### DAO Extensiones
Este proyecto contiene la implementación del patrón DAO en su forma generica. Para poder usarlo es necesario hacerlo a través de algunas de sus extensiones específicas según cada medio de almacenamiento.

Listado de DAO extensiones:
* [DAODB](https://github.com/maximo-perez-villalba/framework-dao-db): Extensión de framework-dao para base de datos a través de PDO. 

