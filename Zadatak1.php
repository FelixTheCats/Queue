<?php

class Student
{
    var $ime;
    var $prezime;
    var $god_rod;
}
    
$putanja = "C:/xampp/htdocs/Vjezba15/studenti.txt";
$fp = fopen($putanja, "a+");

$fp_r = fopen($putanja, "r");

$student = new Student();

$student->ime = readline("Unesite ime: ");
$student->prezime = readline("Unesite prezime: ");
$student->god_rod = readline("Unesite Godinu rodjenja: ");

fwrite($fp, sprintf("%-15s", $student->ime));
fwrite($fp, sprintf("%-15s", $student->prezime));
fwrite($fp, sprintf("%4s", $student->god_rod));
fwrite($fp, "\n");

$tekst = fread($fp_r, filesize($putanja));
$tekst_lines = array();
$tekst_lines = explode("\n", $tekst);

$rodeni_2003 = array();
//print_r($tekst_lines);

foreach($tekst_lines as $key => $line)
{
    $name = substr($line, 0, 15);
    $surname = substr($line, 15, 15);
    $date = substr($line, 30, 4);

    $name = trim($name);
    $surname = trim($surname);
    $date = trim($date);

    //echo $name . " " . $surname . " " . $date . "\n";
    if ($date == 2003)
    {
        $rodeni_2003[] = $tekst_lines[$key];
    }
}
//print_r($rodeni_2003);

foreach($rodeni_2003 as $k => $v)
{
    echo $v . "\n";
}
?>