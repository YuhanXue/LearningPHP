<?php
//file1
$file1 = "001.txt";
$content1 = file_get_contents($file1); //read file
$file1Open=fopen("001.txt","r");

$array1=explode("\n",$content1);  //use "\n" as a delimiter, transfer lines into array

	foreach($array1 as $key1=>$value1){
		$array1_str=explode(",",$value1);  //use "," as a delimiter, transfer a line in to an array
		if(!empty($array1_str)){
			foreach ($array1_str as $key_str=>$value1_str){
				$number=trim($array1_str[0]);
				$address=trim($array1_str[1]);
				$state=trim($array1_str[2]);
				//echo " ";
				//echo $value1_str;  //test
			}
			var_dump($array1_str);
		}
	}
	var_dump($array1);


	echo'<br/><br/>';


//file2
$file2 = "002.txt";
$content2 = file_get_contents($file2);
$file2Open=fopen("002.txt","r");

$array2=explode("\n",$content2);

	foreach($array2 as $key2=>$value2){
		$array2_str=explode(",",$value2);
		if(!empty($array2_str)){
			foreach ($array2_str as $key_str=>$value2_str){
				$number=trim($array2_str[0]);
				$address=trim($array2_str[1]);
				$state=trim($array2_str[2]);
				//echo " ";
				//echo $value2_str;
			}
			var_dump($array2_str);
		}
	}
var_dump($array2);

$array3=array_merge($array1,$array2); //merge $array1[][] and $array2[][]
var_dump($array3);

//sort $array3[][] by $number
$arr_Num=array();
$arr_Add=array();

		foreach($array3 as $key3=>$value3){
			$array3_str=explode(",",$value3);
			foreach($array3_str as $key_str=>$value3_str){
				$number=trim($array3_str[0]);
				$address=trim($array3_str[1]);
				$state=trim($array3_str[2]);

				//$arrSort[$key_str][$key3]=$value3_str;
			}
			var_dump($array3_str);
			array_push($arr_Num,$number);
			array_push($arr_Add,$address." ".$state);
		}
		//var_dump($arr_Num);  //test
		//var_dump($arr_Add);
		array_multisort($arr_Num,$arr_Add);

		//var_dump($arr_Num);  //test
		//var_dump($arr_Add);

		$arr_Final=array_combine($arr_Num,$arr_Add);
		var_dump($arr_Final);

//write to 003.txt
$file3Open=fopen('003.txt','a+b');
$array3String=var_export($arr_Final, true).';';
file_put_contents('003.txt',$array3String);
//fwrite($file3Open,var_export($arr_Final,true));
fclose($file3Open);

/*
var_dump($array3);

//write $array3[][] into 003.txt
$file3Open=fopen("003.txt","r");
fwrite($file3Open,var_export($array3,true));

fclose($file3Open);
/*
//sort and write $doc1, $doc2 into doc3
$doc3=array_merge($key1,$key2);
sort($doc3);

//write doc3 to file3
$file3 = fopen("003.txt","w");
$str3=implode("\n",$doc3);
file_put_contents("003.txt",$str3);

//can't directly write twice, the first array will be covered
echo '<br/><br/> This is file3 output: ';
echo 'doc: ';
print_r($str3); echo'<br/>';
print_r($doc3);
fclose($file3);
*/
?>