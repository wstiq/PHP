<?php

use Exception\Exception_1;
use Exception\Exception_2;
use Exception\Exception_3;
use Exception\Exception_4;
use Exception\Exception_5;

class MethodClass{
    /**
     * @param $x
     * @return float|int
     * @throws Exception_1
     * @throws Exception_5
     */
    function inverse($x) {

        try{
            if(!$x){
                throw new Exception_1('Деление на ноль.');
            }
            return 1/$x;
        } catch (DivisionByZeroError $e){
            throw new Exception_1('Деление на ноль.');
        }
    }


    /**
     * @throws Exception_2
     */
    function function2(){
        throw new Exception_2('Ошибка 2');
    }

    /**
     * @throws Exception_3
     */
    function function3(){
        throw new Exception_3('Ошибка 3');
    }

    /**
     * @throws Exception_4
     */
    function function4(){
        throw new Exception_4('Ошибка 4');
    }

}