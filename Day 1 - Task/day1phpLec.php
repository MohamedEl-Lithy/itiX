<?php



    $test = 666;
    echo 'your number is $test'; //here print only sting
    echo "<br>";
    echo "your number is $test"; //here print string and can compile the variables and get their data .. more slow 
    echo "<br>";

$global_var = 100;
function addglobal(){
    global $global_var; //I must call the global variable from outside the function so I can use it in the function I only get a copy from it doesn't the source value changed 
    return $global_var+100;
}
    echo "$global_var" . " first";
    echo addglobal() . " function";
    echo "$global_var" . " second";
    echo "<br>";
    echo "<hr>";
    echo gettype($global_var)." gettype";
    echo isset($global_var)."  isset";
    echo settype($global_var, "string")."  settype";
    echo empty($global_var)." empty";
    echo "<hr>";
    echo "<br>";
    define('CONST_', 77);
    echo CONST_;
    echo "<br>";

    echo "hi from php";
    echo "<br>"; //when I need to write html code in php I must use the echo keyword with html tags between double quotation.
    echo "it's me ";
    echo "<br>";
    echo "<hr>";
    $number = 88; //datatype integer
    $number_double = 1.78; //datatype double
    $text = "me"; //datatype string
    
    echo $number . " "; //echo meaning printf
    echo gettype($number);
    echo "<br>";
    echo $number_double . " : " . " "; // Using concatenation
    echo gettype($number_double);
    echo "<br>";
    echo $text . " "; // the concatenation operator (.) 
    echo gettype($text);
    echo "<br>";
    echo "<hr>";
    echo "<br>";
    function Add($num1, $num2){
        $z = $num1 + $num2;
        echo $z;
    }

    Add(25,75);
    echo "<br>";
    echo "<hr>";
    echo "<br>";

    function Count_fun(){
        static $x = 0; //the static var it's only declare it once and then the last value of it remain stored into it
        $x++; 
        
        echo $x;
        echo "<br>";
    }
    Count_fun();
    Count_fun();
    Count_fun();
    echo "<br>";
    echo "<hr>";
    echo "<br>";
    /* echo "<pre>";
    var_dump($_SERVER); //var_dump function I used it to print an array 
    echo "</pre>"; */


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border = 1>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
    </tr>
    <tr>
        <td>1000</td>
        <td>Mohamed</td>
        <td>Mohamed@gmail.com</td>
    </tr>
    <tr>
        <td>2000</td>
        <td>El-Lity</td>
        <td>ellithy@gmail.com</td>
    </tr>
    <!-- this is how to write php in the html tags -->
    <tr> 
        <td><?php echo "3000"?></td>
        <td><?php echo "Batot"?></td>
        <td><?php echo "batot@micky.com"?></td>
    </tr>
    </table>
</body>
</html>
