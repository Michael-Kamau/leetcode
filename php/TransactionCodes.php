<?php
function generateString($prevString){
    $strings = 'ABC';
    $chars=str_split($strings);
    $prev_string_chars=str_split($prevString);
    $length = count($prev_string_chars);
    //Traverse the array in revers order
    for($i = $length-1 ; $i>=0; $i--){
        //If we are at the first character and it is the last in our string characters, we increase the length of the array
        if($prev_string_chars[$i]== end($chars) && $i == 0){
            array_push($prev_string_chars,$chars[0]);
            $prev_string_chars[0]=$chars[0];
            return implode('',$prev_string_chars);
        }
        //If the current character is not the last character from our dict, increment it and return the resultant value
        else if($prev_string_chars[$i] != end($chars) ){
            $index = array_search($prev_string_chars[$i],$chars);
            $prev_string_chars[$i]= $chars[++$index];
            return implode('',$prev_string_chars);
        }
        //Defaults to this if we are not on the character at index 0. We therefore set it to A
        else{
            $prev_string_chars[$i] = $chars[0];
        }
    }
}
$start = 'ACC';
for($i = 0; $i<19; $i++){
    $result = generateString($start);
    print($result."\n");
    $start=$result;
    print($start.'-->');
}