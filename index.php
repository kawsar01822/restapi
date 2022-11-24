<style>
    body{
        margin:50px;
    }
</style>

<?php

    echo "<br/> =================== BUBBLE SORT ================= <br/>";    

    $numbers = array(9,4,7,1,3,5,6,2);
    echo "<pre>";
    var_dump($numbers);
    echo "</pre>";

    for($i=0; $i<count($numbers)-1; $i++)
    {
        for($j=0;$j<count($numbers)-1;$j++)
        {
            if($numbers[$j]>$numbers[$j+1])
            {
                $temp = $numbers[$j+1];
                $numbers[$j+1] = $numbers[$j];
                $numbers[$j] = $temp;
            }
        }
    }

    echo "<pre>";
    var_dump($numbers);
    echo "</pre>";

    echo "<br/> =================== REVERSE STRING ================= <br/>";  

    $name = "Kawsar Ahmed";

    for($i=strlen($name)-1;$i>=0;$i--)
    {
        echo $name[$i];
    }

    echo "<br/> =================== LINEAR SORT ================= <br/>";

    $numbers = array(9,4,7,1,3,5,6,2);

    echo "<pre>";
    var_dump($numbers);
    echo "</pre>";

    for($i=0;$i<count($numbers);$i++)
    {
        for($j=$i+1;$j<count($numbers);$j++)
        {
            if($numbers[$i]>$numbers[$j])
            {
                $temp = $numbers[$i];
                $numbers[$i] = $numbers[$j];
                $numbers[$j] = $temp;
            }
        }
    }

    echo "<pre>";
    var_dump($numbers);
    echo "</pre>";

?>