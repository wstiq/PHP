<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BF</title>
</head>

<body>
<form action="1.php">
    <textarea name="textinput" placeholder="Enter bf code here"></textarea><br>
    <input type="text" name='text' placeholder="Enter prmtrs here"><br>
    <button>g</button>
</form>
</body>

</html>

<?php
//echo $_REQUEST['text'];

$data = $_REQUEST['textinput'] ?? ''; //данные, которые вводим
$params = $_REQUEST['text'] ?? '';
$array = array(0); //хранение результата
$cell = 0; //текущий элемент

$splited = str_split($data); //преобразование в массив данных
$params_array = str_split($params);
$index_for_params = 0;
$brackets = 0;

//echo count($data_array);

for($i=0; $i<count($splited); ++$i) {
    switch($splited[$i]) {
        case "+" :
            // увеличиваем значение текущей ячейки
            $array[$cell]++;
            break;
        case "-" :
            // уменьшаем значение текущей ячейки
            $array[$cell]--;
            //42 is the answer
            break;
        case "." :
            // выводим символ
            print chr($array[$cell]);
            break;
        case "," :
            //
            $array[$cell] = ord($params_array[$index_for_params++]);
            break;
        case ">" :
            // переход к следующей ячейке
            $cell++;
            if(!isset($array[$cell])) {
                $array[$cell] = 0;
            }
            break;
        case "<" :
            // переход к предыдущей ячейке
            $cell--;
            if(!isset($array[$cell])) {
                $array[$cell] = 0;
            }
            break;
        case "[" :
            // начало цикла
            if(!$array[$cell]) {
                $brackets = 1;
                while($brackets) {
                    $i++;
                    if($splited[$i] == "[") {
                        // был открыт вложенный цикл
                        $brackets++;
                    } else if($splited[$i] == "]") {
                        // цикл закрыт
                        $brackets--;
                    }
                }
            }
            break;
        case "]" :
            // конец цикла
            if($array[$cell]) {
                $brackets = 1;
                while($brackets) {
                    $i--;
                    if($splited[$i] == "]") {
                        // был закрыт вложенный цикл
                        $brackets++;
                    } else if($splited[$i] == "[") {
                        // цикл открыт
                        $brackets--;
                    }
                }
            }
            break;
    }
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.+++++++++++++++++++++++++++++.+++++++..+++.-------------------------------------------------------------------------------.+++++++++++++++++++++++++++++++++++++++++++++++++++++++.++++++++++++++++++++++++.+++.------.--------.-------------------------------------------------------------------.-----------------------.
//++++++++++[>+++++++>++++++++++>+++>+<<<<-]>++.>+.+++++++..+++.>++.<<+++++++++++++++.>.+++.------.--------.>+.>.
//,>,[<+>-]<. and 02 = b
/*
 * ++++++++++++++++++++++++++++++++++++++++++++>++++++++++++++++++++++++
++++++++>++++++++++++++++>>+<<[>>>>++++++++++<<[->+>-[>+>>]>[+[-<+>]>
+>>]<<<<<<]>[<+>-]>[-]>>>++++++++++<[->-[>+>>]>[+[-<+>]>+>>]<<<<<]>[-
]>>[++++++++++++++++++++++++++++++++++++++++++++++++.[-]]<[++++++++++
++++++++++++++++++++++++++++++++++++++.[-]]<<<+++++++++++++++++++++++
+++++++++++++++++++++++++.[-]<<<<<<<.>.>>[>>+<<-]>[>+<<+>-]>[<+>-]<<<
-]<<++...

*/


?>