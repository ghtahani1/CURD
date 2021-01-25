<?php 

$i = 0 ;
$d = 0 ; 

for($i=0 ; $i<5 ; $i++){
    for($j=0 ; $j<=$i; $j++){
        echo'*';
        // if($j === $i  ){
        //     echo 'rr';
        // }
    }
   
    echo('<br>');
}

for($d=0 ; $d<5 ; $d++){
    for($q=0 ; $q<5;$q++){
        echo '@'; 
    }
    echo '<br>';
}

?>