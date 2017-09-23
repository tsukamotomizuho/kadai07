<?php
//1. 




//2. 
try {
  $pdo = new PDO('mysql:dbname=********;charset=utf8;host=localhost','******','******');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．
$stmt = $pdo->prepare("INSERT INTO ********(id, name, email, naiyou,
indate )VALUES(NULL, ******, *******, ********, sysdate())");
$stmt->bindValue('******', *****, PDO::PARAM_STR); 
$stmt->bindValue('******', *****, PDO::PARAM_STR);
$stmt->bindValue('******', *****, PDO::PARAM_STR);
$status = $stmt->execute();

//４．
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
  
}else{
  header("Location: *********");f
  exit;

}
?>
