<?php
  function db_connect(){

    $db_user = "skadudgh1341";    // 사용자명
    $db_pass = "qusrud651";    // 패스워드
    $db_host = "skadudgh1341.cafe24.com";    // 호스트명
    $db_name = "skadudgh1341";    // 데이터베이스명
    $db_type = "mysql";    // 데이터베이스 종류
    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
    try{
      $pdo = new PDO($dsn,$db_user,$db_pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    }catch(PDOException $Exception){
      die('오류:'.$Exception->getMessage());
    }

    return $pdo;
  }


  // try{
  //     $pdo->beginTransaction();
  //     $id = $_GET['id'];
  //     $sql = "DELETE FROM test WHERE _id = :id";
  //     $stmh = $pdo->prepare($sql);
  //     $stmh->bindValue(':id',$id,PDO::PARAM_INT);
  //     $stmh->execute();
  //     $pdo->commit();
  //     print "데이터를".$stmh->rowCount()."건 삭제하였습니다.<br>";
  //   }catch(PDOException $Exception){
  //     $pdo->rollBack();
  //     print "오류:".$Exception->getMessage();
  //   }


 // $row = $stmh->fetch(PDO::FETCH_ASSOC);
?>