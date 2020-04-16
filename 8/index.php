<?php
require 'index.html';
$months = ["январь", "февраль", "март", "апрель", "май", "июнь",
    "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь"]; //"january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december"
if (isset($_GET['month'])) {
    $month = $_GET['month'];
} else $month = " ";
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

echo "<table border=1 style='text-align: center; border-collapse: collapse; width:200px; height: 200px'>";
echo "<caption style='font-size: 30px'>" . $months[$key - 1] . "</caption>";
echo "<tr><td>Пн</td><td>Вт</td><td>Ср</td><td>Чт</td><td>Пт</td><td>Сб</td><td>Вс</td><tr>";
for ($i = 0; $i < count($week); $i++) {
    for ($j = 0; $j < 7; $j++) {
        if (!empty($week[$i][$j])) {
            if ($j == 5 || $j == 6) //values = сб/вс
                echo "<td><font color=red>" . $week[$i][$j] . "</font></td>"; //с выделением выходных красным
            else if ($week[$i][$j] == $now)
                echo "<td><font color=blue>" . $week[$i][$j] . "</font></td>";
            else echo "<td>" . $week[$i][$j] . "</td>";
        } else echo "<td>&nbsp;</td>"; // <!ENTITY nbsp " " >
    }
    echo "</tr>";
}
echo "выбранный месяц (по умолчанию текущий): ";
echo "</table>";