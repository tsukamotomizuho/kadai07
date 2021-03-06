<?php
//1. POST受信
$book_name    = $_POST["book_name"];
$book_url     = $_POST["book_url"];
$book_comment = $_POST["book_comment"];



//2. DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db28;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}
//xampはid:root,passは空


//３．SQLを作成(stmlの中で)
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(book_id, book_name, book_url, book_comment,
create_date )VALUES(NULL, :book_name, :book_url, :book_comment, sysdate())");
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR); 
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);
$status = $stmt->execute();
//実行後、エラーだったらfalseが返る
//PDO::PARAM_STR 文字列なら追加(セキュリティ向上)
//数値の場合はPDO::PARAM_INT

//４．エラー表示
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);//エラー表示
  
}else{//処理が終われば『index.php』に戻る。
  header("Location: index.php");//スペース必須
  exit;//おまじない

}
?>
