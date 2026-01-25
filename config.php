<?php

function getDBConnection() {
$host = 'localhost';        
$db_name = 'healthcare_center';  
$username = 'root';        
$password = '';             


try {
    //   (DSN)Data Source Name واللغه المستخدمة تحتوي على الاسم والموقع لقاعدة البيانات  
    // mb4 most byte 4 4bytes لكل حرف كحد اقصى
    $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";
    
    $pdo = new PDO($dsn, $username, $password);
    
    // ضبط وضع الأخطاء (ضروري لإظهار الأخطاء عند وجودها)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //echo "<h1>✅ تم الاتصال بقاعدة البيانات بنجاح!</h1>";
return $pdo;
} catch (PDOException $e) {
    echo "<h1>❌ فشل الاتصال بقاعدة البيانات!</h1>";
    echo "<p>الرجاء التأكد من إعداداتك واسم قاعدة البيانات.</p>";
    echo "<p>سبب الخطأ: " . $e->getMessage() . "</p>";
        die();
}

}
$pdo = getDBConnection();
?> 