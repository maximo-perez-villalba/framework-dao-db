<?php
include_once __DIR__.'/header-script.php';
use framework\environment\Env;

$exec = $_GET[ 'exec' ] ?? 'home';
$blocksPath = '/blocks/';
$execUrlBase = Env::urlbase().'?exec=';
$currentPagePath = Env::path( "{$blocksPath}{$exec}.php" ); 

$tests = 
[
    'home' => 
    [ 
        'path' => "{$blocksPath}/home.php",
        'url' => "{$execUrlBase}home",
        'label' => "Inicio"
    ],
    'create' => 
    [
        'path' => "{$blocksPath}/create.php",
        'url' => "{$execUrlBase}create",
        'label' => "DAO::create"
    ],
    'read' => 
    [
        'path' => "{$blocksPath}/read.php",
        'url' => "{$execUrlBase}read",
        'label' => "DAO::read"
    ],
    'update' => 
    [
        'path' => "{$blocksPath}/update.php",
        'url' => "{$execUrlBase}update",
        'label' => "DAO::update"
    ],
    'delete' => 
    [
        'path' => "{$blocksPath}/delete.php",
        'url' => "{$execUrlBase}delete",
        'label' => "DAO::delete"
    ],
    'get-object' => 
    [
        'path' => "{$blocksPath}get-object/.php",
        'url' => "{$execUrlBase}get-object",
        'label' => "DAODB::get-object"
    ],
    'get-object-by-uid' =>
    [
        'path' => "{$blocksPath}get-object-by-uid/.php",
        'url' => "{$execUrlBase}get-object-by-uid",
        'label' => "DAODB::get-object-by-uid"
            ],
            'list' => 
    [
        'path' => "{$blocksPath}/list.php",
        'url' => "{$execUrlBase}list",
        'label' => "DAODB::list"
    ]
];

?>
<!DOCTYPE html>
<html lang="es">
    <head>
    	<meta charset="utf-8">
    	<base href="<?= Env::urlbase(); ?>">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Framework-dao/Demo</title>
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">    
    </head>
  <body>
  	<div class="container-fluid">
  		<div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            	<div class="container-fluid">
            		<a class="navbar-brand" href="/">Framework DAO</a>
                    <span class="navbar-text">Demo funcional</span>            	
            	</div>
            </nav>
		</div>
    </div>
	<br>
	<br>
	<br>
    <div class="container-fluid">
    	<div class="row" style="display: flex; min-height: 90vh;">
    		<div class="col-md-12">
    			<div class="row">
    				<div class="col-md-3">
                        <div class="list-group">
                       	<?php foreach ( $tests as $id => $test ) : $activeItem = ( $id == $exec ) ? 'active' : '' ?>
                            <a href="<?= $test[ 'url' ] ?>" class="list-group-item list-group-item-action <?= $activeItem ?>" aria-current="true">
                            	<?= $test[ 'label' ] ?>
                            </a>
                       	<?php endforeach; ?>
                        </div>    				
    				</div>
    				<div class="col-md-9 d-flex flex-column">
    					<?php if ( $exec == 'home' ):
    					       include( $currentPagePath );
    					    else : ?>
        					<h4><?= $tests[ $exec ][ 'label' ] ?></h4>
        					<hr>
                            <ul class="nav nav-tabs" id="fichero-de-contenidos" role="tablist">
                              <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="#" data-bs-target="#source-code" id="source-code-tab" data-bs-toggle="tab" role="tab" aria-controls="source-code" aria-selected="true">
                                	Source code
                                </a>
                              </li>
                              <li class="nav-item" role="presentation">
                                <a class="nav-link" href="#" data-bs-target="#output" id="output-tab" data-bs-toggle="tab" role="tab" aria-controls="output" aria-selected="true">
                                	Output
                                </a>
                              </li>
                            </ul>    					
                            <div class="tab-content p-4">
                                <div class="tab-pane active" id="source-code" role="tabpanel" aria-labelledby="source-code-tab">
                                	<?php show_source( $currentPagePath ); ?>
                                </div>
                                <div class="tab-pane" id="output" role="tabpanel" aria-labelledby="output-tab">
                                	<?php include( $currentPagePath ); ?>
                                </div>
                            </div>
    					<?php endif; ?>
    				</div>
    			</div>
    			<br>
    			<br>
    		</div>
    	</div>
    </div>  
 	<div class="container-fluid">
		<div class="row">

                <footer class="bg-dark text-white">
                    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                        <li class="nav-item">
                        	<a href="https://github.com/maximo-perez-villalba/framework-dao" class="nav-link px-2">
                        		<i class="bi bi-github"></i>&nbsp;Github
                        	</a>
                        </li>
                    </ul>
                    <p class="text-center text-muted">© 2022 Máximo Perez Villalba</p>
                </footer>
		</div>
	</div>
    
    <script src="app/ui/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="app/ui/js/scripts.js"></script>
    
  </body>
</html>