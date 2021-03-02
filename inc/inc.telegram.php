<?php
function telegram($msg) {
		global $telegrambot,$telegramchatid;
		$telegrambot='1251655617:AAHhubMp-9DjUOvCfRx77RHFU28uwCmFK14';
// tanpa parse HTML		$url='https://api.telegram.org/bot'.$telegrambot.'/sendMessage';$data=array('chat_id'=>$telegramchatid,'text'=>$msg);
		$url='https://api.telegram.org/bot'.$telegrambot.'/sendMessage?parse_mode=HTML&';$data=array('chat_id'=>$telegramchatid,'text'=>$msg);
		$options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
		$context=stream_context_create($options);
		$result=file_get_contents($url,false,$context);
		return $result;
}
// untuk cek yang pakai bot https://api.telegram.org/bot1251655617:AAHhubMp-9DjUOvCfRx77RHFU28uwCmFK14/getupdates
?>