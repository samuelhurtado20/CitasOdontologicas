<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();

// home
$routes->add('homepage', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'PageController', 'method'=>'indexAction'), array()));

// product
$routes->add('product', new Route(constant('URL_SUBFOLDER') . '/product', array('controller' => 'ProductController', 'method'=>'list'), array()));
$routes->add('productId', new Route(constant('URL_SUBFOLDER') . '/product/{id}', array('controller' => 'ProductController', 'method'=>'byId'), array('id' => '[0-9]+')));

// dentist
$routes->add('dentistIndex', 
    new Route(constant('URL_SUBFOLDER') . '/dentist', array('controller' => 'DentistController', 'method'=>'index'), array()));
$routes->add('dentistList', 
    new Route(constant('URL_SUBFOLDER') . '/dentistList/{msg}', array('controller' => 'DentistController', 'method'=>'list'), array('msg')));
$routes->add('dentistAll', 
    new Route(constant('URL_SUBFOLDER') . '/dentistAll', array('controller' => 'DentistController', 'method'=>'selectAll'), array()));
$routes->add('dentistView', 
    new Route(constant('URL_SUBFOLDER') . '/dentistView/{id}', array('controller' => 'DentistController', 'method'=>'view'), array('id' => '[0-9]+')));
$routes->add('dentistSingle', 
    new Route(constant('URL_SUBFOLDER') . '/dentistSingle/{id}', array('controller' => 'DentistController', 'method'=>'single'), array('id' => '[0-9]+')));
$routes->add('dentistUpdate', 
    new Route(constant('URL_SUBFOLDER') . '/dentistUpdate', array('controller' => 'DentistController', 'method'=>'update'), array()));
$routes->add('dentistAdd', 
    new Route(constant('URL_SUBFOLDER') . '/dentistAdd', array('controller' => 'DentistController', 'method'=>'add'), array()));
$routes->add('dentistSave', 
        new Route(constant('URL_SUBFOLDER') . '/dentistSave', array('controller' => 'DentistController', 'method'=>'save'), array()));
$routes->add('dentistDelete', 
    new Route(constant('URL_SUBFOLDER') . '/dentistDelete/{id}', array('controller' => 'DentistController', 'method'=>'delete'), array()));

// pacient
$routes->add('pacientIndex', 
new Route(constant('URL_SUBFOLDER') . '/pacient', array('controller' => 'PacientController', 'method'=>'index'), array()));
