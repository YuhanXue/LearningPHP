<?php
	//file1
	$file1 = "001.txt";
	$content1 = file_get_contents($file1); //read file
	echo "This is file1 output: ";
	echo $content1;

	$file1Open=fopen("001.txt","r");
	$doc1=array(); //write to an array (read line by line)
	$i=0;
	while(!feof($file1Open)){
		$doc1[$i]=fgets($file1Open);
		$i++;
	}
	fclose($file1Open);
	$doc1=array_filter($doc1);
	echo '<br/> Original file : ';
	print_r($doc1);
	sort($doc1);
	echo '<br/> Sorted : ';
	print_r($doc1);
	echo '<br/>';


	//file2
	$file2 = "002.txt";
	$content2 = file_get_contents($file2);
	echo '<br/>This is file2 output: ';
	echo $content2;

	$file2Open=fopen("002.txt","r");
	$doc2=array();
	$i=0;
	while(!feof($file2Open)){
		$doc2[$i]=fgets($file2Open);
		$i++;
	}
	fclose($file2Open);
	$doc2=array_filter($doc2);
	echo '<br/> Original file : ';
	print_r($doc2);
	sort($doc2);
	echo '<br/> Sorted : ';
	print_r($doc2);

	//sort and write $doc1, $doc2 into doc3
	$doc3=array_merge($doc1,$doc2);
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

?>