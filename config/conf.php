<?php
class Conf{

    static $debug = 0;

    static $databases = array(
        'default' => array(
            'host'      => 'localhost',
            'port'      => ':3308',
            'database'  => 'site',
            'login'     => 'site',
            'password'  => 'site'
        )
    ); 
    static $menubase = array(
        //'Administration' => '/cockpit'
        //'Test' => '/test/index',
       // 'Page 2' =>'/test/page2'
    );

    static $menu = array(
        //'Mysql' => array('_blank', 'http://localhost/phpmyadmin'),
        //'Page 2' =>'/test/page2'
    );
    static $menuDeroul = array(
        'name' => 'Administration',
        //'Administration' => array('_blank', 'http://localhost/phpmyadmin'),
        //'Page 2' =>'/test/page2'
    );
}

Router::prefix('cockpit', 'admin');

//Router::connect('posts/:slug-:id', 'posts/view/id:(?P<id>[0-9])/slug:(?P<slug>[a-z0-9\-]+)');
//Router::connect('/', 'posts/index');
Router::connect('blog/:slug-:id', 'posts/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('tutoriel/:slug-:id', 'pages/view/id:([0-9]+)/slug:([a-z0-9\-]+)');

//Router::connect('blog/:action', 'posts/:action');


?> 