<?php
//File read/Write functions
$myfile=fopen("text.txt",'r');
echo fread($myfile,filesize("text.txt"))."<br>";
fclose($myfile);
$myfile=fopen("new_file.txt","w");
fwrite($myfile,"This is a new file created using PHP");
fclose($myfile);
$myfile=fopen("new_file.txt",'r');
echo fread($myfile,filesize("new_file.txt"))."<br>";
fclose($myfile);
echo file_get_contents("text.txt")."<br><br>";
echo file_put_contents("new_file1.txt","This is a new file created using PHP")."<br><br>";
echo file_get_contents("new_file1.txt")."<br>";
$fi=file("text.txt");
print_r($fi)."<br>";
//file_info
echo file_exists("text.txt")?"File exists":"File does not exists"."<br><br>";
echo filesize("text.txt")."bytes"."<br>";
echo filetype("text.txt")."<br>";
echo filetype("cmpersec.jpg")."<br>";
echo "Access Time : ".date('y-m-d',fileatime("text.txt"))."<br>";
echo "Modification Time : ".date('y-m-d',filemtime("text.txt"))."<br>";
echo "Created Time : ".date("y-m-d",filectime("text.txt"))."<br>";
echo fileperms("text.txt")."<br>";
echo fileowner("text.txt")."<br>";
echo filegroup("text.txt")."<br>";
echo "INODE : " .fileinode("text.txt")."<br>";
//file and folder management
copy("text.txt","new_file1.txt");
rename("new_file.txt","file.txt");
unlink("file.txt");
//mkdir("new");
echo "folder created successfully!!"."<br>";
//rmdir("new");
echo "folder deleted successfully!!"."<br>";
if (is_file("text.txt")){
    echo "is file"."<br>";
}
if (is_dir("manager")){
    echo "is directory"."<br>";
}
//directory handling
$file="index.php";
$di=scandir("manager");
print_r($di);
$dir=opendir("manager");
while($file=readdir($dir)){
    echo "$file"."<br>";    
}
closedir($dir);
echo "Current directory: ".getcwd()."<br>";
chdir("manager");
echo "Current directory: ".getcwd()."<br>";
//file locking
$file=fopen("text.txt","w");
if (flock($file,LOCK_EX)){
    fwrite($file,"this file is locked");
    flock($file,LOCK_UN);
}
else{
    echo "Unable to lock the file"."<br>";
}
fclose($file);
echo "File locked and written successfully!!"."<br>";
$file=fopen("text.txt","r");
if(flock($file,LOCK_SH)){
    echo fread($file,filesize("text.txt"));
    flock($file,LOCK_UN);
}
fclose($file);
?>