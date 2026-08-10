<?php
header("Content-Type: application/json; charset=UTF-8");
if ($_SERVER["REQUEST_METHOD"] !== "POST") { http_response_code(405); echo json_encode(["success"=>false,"reply"=>"طريقة الطلب غير صحيحة."],JSON_UNESCAPED_UNICODE); exit; }
$message=trim($_POST["message"] ?? "");
if($message===""){echo json_encode(["success"=>false,"reply"=>"من فضلك اكتب رسالة أولاً."],JSON_UNESCAPED_UNICODE);exit;}
$m=mb_strtolower($message,"UTF-8");
if(str_contains($m,"مرحبا")||str_contains($m,"السلام")) $reply="وعليكم السلام! كيف يمكنني مساعدتك؟";
elseif(str_contains($m,"اسمك")) $reply="أنا مساعد صوتي مبني باستخدام HTML وCSS وJavaScript وPHP.";
elseif(str_contains($m,"الوقت")) $reply="الوقت الحالي على الخادم هو ".date("H:i");
elseif(str_contains($m,"شكرا")||str_contains($m,"شكر")) $reply="العفو! سعيد بمساعدتك.";
else $reply="استلمت رسالتك: ".$message;
echo json_encode(["success"=>true,"reply"=>$reply],JSON_UNESCAPED_UNICODE);
?>