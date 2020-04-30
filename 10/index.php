<?php


spl_autoload_register(function ($className) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '\\' . $className . '.php';
});


//$a = new MethodClass();
//$a->inverse(1);
//
//$b = new MethodClass();
//$b->fun2();
//
//
//$c = new MethodClass();
//$c->fun3();
//
//
//$d = new MethodClass();
//$d->fun4();

function random_caller(){
    $x = rand(1, 4);
    switch ($x) {
        case 1:
            $a = new MethodClass();
            $a->inverse(0);
            break;
        case 2:
            $b = new MethodClass();
            $b->function2();
            break;
        case 3:
            $c = new MethodClass();
            $c->function3();
            break;
        case 4:
            $d = new MethodClass();
            $d->function4();
            break;
    }
}

try {
    random_caller();

} catch (\Exception\Exception_4 $re){
    echo 'exception called with 4: ',  $re->getMessage(), "\n";
} catch (\Exception\Exception_3 $er){
    echo 'exception called with 3: ',  $er->getMessage(), "\n";
} catch (\Exception\Exception_2 $re){
    echo 'exception called with 2: ',  $re->getMessage(), "\n";
} catch (\Exception\Exception_1 $e) {
    echo 'Thrown an exc: ',  $e->getMessage(), "\n";
} catch (Exception $exception){
    echo 'exc 0: ',  $exception->getMessage(), "\n";
}