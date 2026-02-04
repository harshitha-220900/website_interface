<?php
$hard="Welcome, to the PHP programming";
$cmphard="Welcome, to the php programming";
echo "<h3> ORIGINAL STRING </h3>";
echo $hard ."<br>";
#basic functions
echo "length of the string :".strlen($hard)."<br>";
echo "Word count of the string :".str_word_count($hard)."<br>";
echo "Reverse of the string :".strrev($hard)."<br>";
#case conversions
echo "Uppercase of the string:".strtoupper($hard)."<br>";
echo "Lowercase of the string:".strtolower($hard)."<br>";
echo "only first letter of the string:".ucfirst($hard)."<br>";
echo "first letter of every word of the string:".ucwords($hard)."<br>";
#search and replace
echo "Replace of the string:".str_replace("PHP","python",$hard)."<br>";
echo "Search of the string:".strpos($hard,"PHP")."<br>";
#substring and trimming
$wish="     Hello, welcome to PHP world.    ";
echo $wish."<br>";
echo "After trimming:".trim($wish)."<br>";
#comparison
if(strcmp($hard,$cmphard)==0){
    echo "The strings are equal. <br>";
}
else{
    echo "The strings are not equal. <br>";
}
if(strcasecmp($hard,$cmphard)==0){
    echo "The strings are equal (case-insensitive). <br>";
}
else{
    echo "The strings are not equal (case-insensitive). <br>";
}
#special functions
$email="harshitha2@gmail.com";
if(htmlspecialchars($email)){
    echo "The email is valid.<br>";
}
else{
    echo "The email is not valid.<br>";
}
$ii="hello world";
echo addslashes($ii)."<br>";
?>