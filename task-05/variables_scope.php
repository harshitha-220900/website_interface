<?php
$nam="Uzumaki Naruto-kun";
echo "Konnichiwa $nam !! <br>";
$age=29;
echo " You are $age years old. <br>";
$height=5.5;
echo "Your height is $height inches. <br>";
$subjects=array("defence","ninjutsu","taijutsu");
echo "Your subjects are:$subjects[0],$subjects[1],$subjects[2]. <br>";
function display(){
    $na="Uchiha Sasuke-kun";
    echo "Konnichiwa $na !! <br><br>";
}
display();
echo "Konnichiwa $na !! <br>";
global $a;

function global_scope(){
    global $a;
    global $b;
    $a=29;
    $b=5.5;
    echo "You are $a years old. <br>";
    
}
global_scope();
echo "Your height is $b inches. <br>";
function static_scope(){
    static $count=0;
    $count++;
    echo "You have called this function $count times. <br>";
}
static_scope();
static_scope();
?>