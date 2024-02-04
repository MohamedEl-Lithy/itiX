<style>
        table {
            border-collapse: collapse;
            width: 70%;
        }

        th, td {
            border: 1.5px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>

<?php $array = [
    [
        "id" => "01",
        "fname" => "Mohamed",
        "lname" => "Ahmed",
        "email" => "test@yahoo.com",
        "pass" => "423423"
    ],
    [
        "id" => "02",
        "fname" => "kamal",
        "lname" => "ali",
        "email" => "ggee@yahoo.com",
        "pass" => "42sasf3"
    ],
    [
        "id" => "03",
        "fname" => "Sara",
        "lname" => "Tamer",
        "email" => "Teer@yahoo.com",
        "pass" => "sf234f"
    ]
            
    ];
    var_dump($array);
    echo "<br>";
    echo "<hr>";


    echo '<table>';
        echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>First Name</th>';
            echo '<th>Last Name</th>';
            echo '<th>Email</th>';
            echo '<th>Password</th>';
        echo '</tr>';
    foreach($array as $key => $student){
        echo '<tr>';
        foreach($student as $subkey => $value){        
            echo "<td>$value</td>";
            // if ($subkey == "fname"){
            //     echo $value;
            // };   
        };
        echo '</tr>';
    };
    echo '</table>';


echo "<br>";
    echo "<hr>";
var_dump($student);
    echo "<br>";
    echo "<hr>";
    echo $key;
    echo "<br>";
    echo "<hr>";
    var_dump($key);
    
?>