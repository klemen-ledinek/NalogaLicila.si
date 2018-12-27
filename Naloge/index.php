<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //Naloga 1
        echo '<b><u> Naloga 1 </b></u><br>' ;
        
        $randomMatrix =  createRandomMatrix();
        if(checkMatrix($randomMatrix)){
            echo 'Prikaz prvotne matrice <br><br>';
            displayMatrix($randomMatrix);
            echo '<br><br>Prikaz urejene matrice <br><br>';
            $randomMatrix = editMatrix($randomMatrix);
            displayMatrix($randomMatrix);
        }else{
            echo '<br> Niste vnesli pravilne matrice<br>';
        }
        
       
        //Funkcija ki spremeni vrstio v X-e, če je v tisti vrstici kakšna 1
        function editMatrix($matrix){
            $lineCounter = 0;
            $newLines = array();
            foreach($matrix as $lineX) {
               foreach($lineX as $dataY){
                   if(!(is_int($dataY))){
                        echo 'Niste vnesli matrice!';
                        return;
                   }
                    if($dataY == '1'){
                        array_push($newLines, $lineCounter);
                        continue;
                    }
               }
                 $lineCounter ++;
            }
            foreach($newLines as $line){
                   for($x = 0;$x<count($matrix[$line]);$x++){
                       $matrix[$line][$x] = 'X';
                   }
               }
            return $matrix;
        }    
        //Funkcija ki ustvai random matrico za testiranje
        function createRandomMatrix(){
            $matrixArray =  array();
            $sizeX = rand(1,20);
            $sizeY = rand (1,20);
            for($x = 0;$x<$sizeX;$x++){
                for($y = 0;$y<$sizeY;$y++){
                    $matrixArray[$x][$y] =  rand(1, 10);
                }
            }
            
            return $matrixArray;
        }
        //funkcija ki izpiše matrico
        function displayMatrix($matrix){
           foreach($matrix as $lineX) {
               foreach($lineX as $dataY){
                    echo $dataY, ' ';
               }
                 echo '<br>';
            }
        }
        //funkcija ki preveri, ali je bila vnešena pravilna matrica
        function checkMatrix($matrix){
            $result = true;
            if(!(is_array($matrix))){
                return false;
            }
            if(!(is_array($matrix[0]))){
                return false;
            }
           
            foreach($matrix as $lineX) {
               foreach($lineX as $dataY){
                   if(!(is_int($dataY))){
                       return false;
                   }
               }
                 
            }
            return $result;
        }
        
        
        //Naloga 2
        echo '<br><br><b><u> Naloga 2 </b></u><br><br>' ;
        
        
        $word = "čokooolada";
        echo '<br>Prvotni string: <br>';
        echo $word;
        $editedWord = checkString($word);
        echo '<br><br>Urejen string:  <br>';
        echo $editedWord;
        
        
        
        
        //funkcija ki preleti string in išče ponavljanje črk, ter lete pobriše in zapiše število ponavljanj
        function checkString($string){
            $startIndex = 0;
            $countIndex = 0;
            $newString = '';
            $stringSplited = str_split($string);
            for($x = 0;$x<count($stringSplited);$x++){
                if($x != 0 && $stringSplited[$x] == $stringSplited[$x-1]){
                    $startIndex = $x-1;
                    $countIndex++;
                    if( $stringSplited[$x] != $stringSplited[$x+1]){
                       $newString .=$countIndex+1;
                       $countIndex = 0;
                    }
                    continue;
                }
                $newString .=$stringSplited[$x];
            }
          
            return $newString;
        }
        
        
        ?>
    </body>
</html>
