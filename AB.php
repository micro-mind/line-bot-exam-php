<?php
    $accessToken = "4/lNyzqLi6Jv4aYGLvo58WTSlDUeK5Ro+wyYC8WEQSV+L4OrJcU4rfjkIJDEcKxATQxcSg/gW7r0Wp2k/6Eb+J84SF7a9tNUkXsevKUuJj3XW4nZQJL5lkPmi96W/KtLAYZBdUYzrt5E/ewVbuI1RgdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
#ตัวอย่าง Message Type "Text"
    if($message == "สวัสดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีค่ะ คุณสามารถใช้คำสั่งด้านล่างเพื่อเริ่มต้นใช้งานได้เลยค่ะ\n
        เกี่ยวกับ\n
        ติดต่อ\n
        ที่อยู่\n
        สินค้า\n
      
        
        ";
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if($message == "เกี่ยวกับ"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Pack All Plastic Co., Ltd.\n Founded in 1986 as an importer, distributor and exclusive agency for global leading machineries, Pack All Plastic Co., Ltd (PAP) is specialized in providing high performance machines, equipments, tools and related products including with reliable after sales service for full range of plastic, rubber, recycle and aluminum profile processing industry.";
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if($message == "ติดต่อ"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "126/57-58 ซอย พหลโยธิน 32 ถนนพหลโยธิน แขวงเสนานิคม เขต จตุจักร กรุงเทพฯ 10900 
\nPhone number : 02-941-6584-7 , 02-941-6984-5 \nFax : 02-561-1716 \n
Email : nattarin@packallplastic.co.th";
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
     
        $arrayPostData['messages'][1]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }

   else if($message == "สินค้า"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Pack All Plastic ONE STOP SERVICE เป็นผู้นำเข้า จัดจำหน่าย พร้อมให้คำปรึกษาเกี่ยวกับเครื่องจักร รวมถึงซ่อมบำรุงเครื่องจักร\n
        Feed Mixing and Dosing\n
        Injection\n
        Extrusion\n
        Thermoforming\n
        Agglomerator\n
        Coating System\n
        Winding Technology\n
        Rotational Moulding\n
        Pulverizer\n
        Granulator\n
        Robotic Arm\n
        Pipe Testing\n
        Aluminium-uPVC Profile Procession\n เราพร้อมให้คำปรึกษา เพื่อ Solutions ที่ดีที่สุด";
        replyMsg($arrayHeader,$arrayPostData);
    }

    #ตัวอย่าง Message Type "Location"
    else if($message == "ที่อยู่"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "location";
        $arrayPostData['messages'][0]['title'] = "Pack All Plastic Co.,Ltd.";
        $arrayPostData['messages'][0]['address'] =   "13.835126,100.581723";
        $arrayPostData['messages'][0]['latitude'] = "13.835126";
        $arrayPostData['messages'][0]['longitude'] = "100.581723";
        replyMsg($arrayHeader,$arrayPostData);
    }

 

   /* else if($message == "สวัสดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "";
        replyMsg($arrayHeader,$arrayPostData);
    }   */ 
    #ตัวอย่าง Message Type "Sticker"
    else if($message == "ฝันดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "46";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Image"
    else if($message == "รูปน้องแมว"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    
    #ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
    else if($message == "ลาก่อน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "อย่าทิ้งกันไป";
        $arrayPostData['messages'][1]['type'] = "sticker";
        $arrayPostData['messages'][1]['packageId'] = "1";
        $arrayPostData['messages'][1]['stickerId'] = "131";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else {
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีค่ะ คุณสามารถใช้คำสั่งด้านล่างเพื่อเริ่มต้นใช้งานได้เลยค่ะ\n
        About\n
        Contact\n
        
        ";
        replyMsg($arrayHeader,$arrayPostData);
    }
function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
   exit;
?>
