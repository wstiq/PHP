<?php
require 'index.html';
$months = ["январь", "февраль", "март", "апрель", "май", "июнь",
    "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь"]; //"january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december"
if (isset($_GET['month'])) {
    $month = $_GET['month'];
} else $month = date('m', time());
//echo ("1)month is " . $month);
switch ($month){
    case 1:
        $month = "январь";
        break;
    case 2:
        $month = "февраль";
        break;
    case 3:
        $month = "март";
        break;
    case 4:
        $month = "апрель";
        break;
    case 5:
        $month = "май";
        break;
    case 6:
        $month = "июнь";
        break;
    case 7:
        $month = "июль";
        break;
    case 8:
        $month = "август";
        break;
    case 9:
        $month = "сентябрь";
        break;
    case 10:
        $month = "октябрь";
        break;
    case 11:
        $month = "ноябрь";
        break;
    case 12:
        $month = "декабрь";
        break;
}
//echo ("2)month is " . $month);
$key = array_search($month, $months);
if (gettype($key) != 'boolean') {
    $key += 1;
} else {
    try {
        $key = new DateTime('now');
        $key = $key -> format('n');
    } catch (Exception $e) {
    }
}
$dayofmonth = cal_days_in_month(CAL_GREGORIAN, $key, 2019);
$num = 0;
$day_count = 1;

for ($i = 0; $i < 7; $i++) {
    $dayofweek = date('w', mktime(0, 0, 0, date($key),
        $day_count, date('Y')));
    $dayofweek = $dayofweek - 1;
    if ($dayofweek == -1) $dayofweek = 6;
    if ($dayofweek == $i) {
        $week[$num][$i] = $day_count;
        $day_count++;
    } else {
        $week[$num][$i] = "";
    }
}
while (true) {
    $num++;
    for ($i = 0; $i < 7; $i++) {
        $week[$num][$i] = $day_count;
        $day_count++;
        if ($day_count > $dayofmonth) break;
    }
    if ($day_count > $dayofmonth) break;
}

$now = date('d', time());
//echo ("now is" . $now); //30
//echo ("\n ");
$monthnow = date('m', time());
//echo ("monthnow is " . $monthnow); //04
//echo ("\n ");
//echo ("month is " . $month); //04
//echo ("\n ");
//echo ("gettype of monthnow   " . (gettype($monthnow)) . " ;");
//echo ("stracse of month monthnow" . strcasecmp($month, $monthnow) . " ");
switch ($monthnow){
    case 1:
        $monthnow = "январь";
        break;
    case 2:
        $monthnow = "февраль";
        break;
    case 3:
        $monthnow = "март";
        break;
    case 4:
        $monthnow = "апрель";
        break;
    case 5:
        $monthnow = "май";
        break;
    case 6:
        $monthnow = "июнь";
        break;
    case 7:
        $monthnow = "июль";
        break;
    case 8:
        $monthnow = "август";
        break;
    case 9:
        $monthnow = "сентябрь";
        break;
    case 10:
        $monthnow = "октябрь";
        break;
    case 11:
        $monthnow = "ноябрь";
        break;
    case 12:
        $monthnow = "декабрь";
        break;
}

echo "<table border=1 style='text-align: center; border-collapse: collapse; width:200px; height: 200px'>";
echo "<caption style='font-size: 30px'>" . $months[$key - 1] . "</caption>";
echo "<tr><td>Пн</td><td>Вт</td><td>Ср</td><td>Чт</td><td>Пт</td><td>Сб</td><td>Вс</td><tr>";
for ($i = 0; $i < count($week); $i++) {
    for ($j = 0; $j < 7; $j++) {
        if (!empty($week[$i][$j])) {
            if ($j == 5 || $j == 6) //values = сб/вс
                echo "<td><font color=red>" . $week[$i][$j] . "</font></td>"; //с выделением выходных красным
            else if (($week[$i][$j] == $now) && (strcasecmp($month, $monthnow) == 0))
                echo "<td><font color=blue>" . $now . "</font></td>";
            else echo "<td>" . $week[$i][$j] . "</td>";
        } else echo "<td>&nbsp;</td>"; // <!ENTITY nbsp " " >
    }
    echo "</tr>";
}
echo "выбранный месяц (по умолчанию текущий): ";
echo "</table>";
