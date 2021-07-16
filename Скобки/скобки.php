
<?php


function Brackets(string $str){

    $withoutProbels = str_replace(' ', '', $str);	//убираем пробелы
    
    $Breck_op = 0;	//запись отк. скобок
    $Breck_cl = 0;	//запись зак. скобок
    
    //$Breck_op_p = 0;	//запись позиции отк. скобок
    //$Breck_cl_p = 0;	//запись позиции зак. скобок
    
    $len_str = strlen($withoutProbels);
    
    
	// проверка баланса скобок
    for ($i = 0; $i < $len_str; $i++){   
      if($withoutProbels[$i] == '('){
        $Breck_op++;
      } 
      else if($withoutProbels[$i] == ')'){
        $Breck_cl++;
      }
      
      if($Breck_op < $Breck_cl){
      	echo 'Ошибка последовательноси скобок: не хватает открываещей скобки   <br/>';
        break;
      }
      
    }
    
    // Сообщение об ошибки если отсутствует баланс
    if($Breck_op == $Breck_cl){
      echo "Количество и порядок скобок правильный.";
    }
    else if($Breck_op > $Breck_cl){
      echo "Ошибка баланса: не хватает закрывающих скобок.";
    }
  }
    
$a = '5 * ()((2 + 2))(';
    
Brackets($a);

?>

