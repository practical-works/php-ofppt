<?php
//==================================================================
// 1 ♦ Current datetime
//==================================================================
$today = date("l, F d, Y");
$now = date("H:i:s");
echo "Today is $today <br>";
echo "Current time is $now <br><br>";

//==================================================================
// 2 ♦ Age with seconds precision
//==================================================================
$birthday_datetime = new DateTime("11/25/1991");
$age_interval = date_diff(new DateTime("now"), $birthday_datetime);
$birthday = $birthday_datetime->format("l, F d, Y");
$age = $age_interval->format("%y years, %m months, %d days, %h hours, %i minutes and %s secondes");
$age_days = $age_interval->format("%a days");
echo "Birthday is $birthday <br>";
echo "Age is $age <br>";
echo "Age is $age_days <br><br>";

//==================================================================
// 3 ♦ Did "February 29, 1962" exist ?
//==================================================================
$date_str = "Thursday, February 29, 1962";
$date = new DateTime($date_str);
$date_format = $date->format("l, F d, Y");
echo "Input date: $date_str <br>";
echo "Real date: $date_format (That year February had 28 days)<br><br>";

//==================================================================
// 4 ♦ What weekday (in French) was "March 3, 1993" ?
//==================================================================
setlocale(LC_TIME, array('fr_FR.UTF-8','fr_FR@euro','fr_FR','french'));
$date_str = "March 3, 1993";
$date = new DateTime($date_str, new DateTimeZone("Africa/Casablanca"));
$date_fr_format = strftime("%e %B %Y", $date->getTimestamp());
$weekday = $date->format("l");
$weekday_fr = strftime("%A", $date->getTimestamp());
echo "Input date: $date_str <br>";
echo "Input date in french: $date_fr_format <br>";
echo "Input date weekday: $weekday <br>";
echo "Input date french weekday: $weekday_fr <br><br>";

//==================================================================
// 5 ♦ Display all leap years between 2005 and 2052
//==================================================================
function is_leap_year($year) {
    $year_timestamp = mktime(0, 0, 0, 1, 1, $year);
    //return date("L", $year_timestamp) == 1 ? true : false;
    return ((($year % 4) == 0) && ((($year % 100) != 0) || (($year % 400) == 0)));
}
function get_leap_years($min_year, $max_year) {
    for ($year = $min_year; $year <= $max_year; $year++)
        if (is_leap_year($year))
            $leap_years[] = $year;
    return $leap_years;
}
$year1 = 2005; $year2 = 2052;
$leap_years = get_leap_years($year1, $year2);
echo "There are " . ($year2 - $year1 + 1) . " years between $year1 and $year2 <br>";
echo count($leap_years) . " of them are LEAP years :<br>";
echo implode(", ", $leap_years) . "<br><br>";

//==================================================================
// 6 ♦ What weekday will be "May 1" between 2005 and 2010 ?
//     • If Saturday or Sunday : Display "Sorry!"
//     • If Friday or Monday : Display "Long weekend!"
//==================================================================
$min_year = 2010;
$max_year = 2020;
echo "Labor Day Holidays :<br>";
for ($year = $min_year; $year <= $max_year; $year++) {
    $date = new DateTime("05/01/$year");
    $date_infos = getdate($date->getTimestamp());
    $date_format = $date->format("l, F d, Y");
    $key = "wday";
    $msg = "";
    if ($date_infos[$key] == 6 || $date_infos[$key] == 0) {
        $msg = "- Sorry, no effect.";
    }
    if ($date_infos[$key] == 5 || $date_infos[$key] == 1) {
        $msg = "- Yay! Longer weekend!";
    }
    echo "$date_format $msg<br>";
}
echo "<br>";

//==================================================================
// 7 ♦ What are "Ascension Day" dates between 2005 and 2010 ?
//==================================================================
$min_year = 2010;
$max_year = 2020;
for($year=$min_year; $year<$max_year; $year++)
{
    $easter_day = date("l, F d, Y",easter_date($year));
    $_39_days = 39*86400; // 24*60*60 = 86400
    $ascension_day = date("l, F d, Y", easter_date($year) + $_39_days);
    echo "$year <br>";
    echo "&emsp;&emsp;Easter Day : $easter_day <br>";
    echo "&emsp;&emsp;Ascension Day : $ascension_day <br>";
}