<?php

$attri = ['class'=>'email','id'=>'myform'];
$hid = ['a' => 'Joe', 'memb' => '234'];
echo form_open('email/send',$attri,['csrf_id'=>'my-id']);
