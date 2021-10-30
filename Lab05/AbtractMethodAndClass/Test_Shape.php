<?php

    // spl_autoload_register(
    //     function($className)
    //     {
    //         $className = str_replace("_", "\\", $className);
    //         $className = ltrim($className, '\\');
    //         $fileName = '';
    //         $namespace = '';
    //         if ($lastNsPos = strripos($className, '\\'))
    //         {
    //             $namespace = substr($className, 0, $lastNsPos);
    //             $className = substr($className, $lastNsPos + 1);
    //             $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    //         }
    //         $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    //         require $fileName;
    //     }
    // ); 
    //namespace AbtractMethodAndClass;
    function my_autoloader($class) {
        include  $class . '.php';
    }
    
    spl_autoload_register('my_autoloader');
    $myCollection = array(); 

    $r = new Rectangle;
    $r->width = 5;
    $r->height = 7;
    $myCollection[] = $r;
    
    unset($r);

    //make a triangle

    $t = new Triangle;
    $t->base = 4;
    $t->height = 5;
    $myCollection[] = $t;
    unset($t);

    //make a circle

    $c = new Circle;
    $c->radius = 3;
    $myCollection[] = $c;
    unset($c);

    //make a color

    $c = new Color;
    $c->name = "blue";
    $myCollection[] = $c;
    unset($c);

    foreach($myCollection as $s){
        if($s instanceof Shape){
            print("Area: " . $s->getArea() . "<br>\n");
        } if($s instanceof Polygon){
            print("Sides: " . $s->getNumberOfSides() . "<br>\n");
        } if($s instanceof Color){
            print("Color:  $s->name <br>\n");
        }
        print("<br>\n");
    }