<?php

//https://lookup-id.com/
//https://developers.facebook.com/tools/explorer/?pnref=story

header('content-type:text/html;charset=utf-8');

$page_id = '258220121572';
$access_token = 'CAACEdEose0cBAMolStSp7cotcje5VTnWXmrRwPcTXsTSGTvZBdfNz945aBm7WTgiX3fVsuc0ue3kSLyZBMbTiv22iuuqD094WOApPwH6HpCyp4sTU3YO3HagcIVuokTEfKUttIGu3FzMTmJ8uH5ydIXsvHELZAvduUZCQZC6PDQYUdRPRzj1gAIWFBEmXOH0jglb8jW7MS7Ne8Ojaqqxz';
$since='2011-05-01';
$until='2011-10-01';
$limit=500;

$json_object = file_get_contents('https://graph.facebook.com/'.$page_id.
						'/feed?limit='.$limit.
							 '&since='.$since.
							 '&until='.$until.
					  '&access_token='.$access_token );

$fbdata = json_decode($json_object);
foreach ($fbdata->data as $post )
{
echo'<pre>';
echo '[message] => '.$post->message."\n";
echo '[link] => '.'<a href="https://www.facebook.com/groups/abdullaheid/'.substr ($post->id ,strpos($post->id, '_')+1).'">go to '.$post->id.'</a>'."\n";
echo '[created_time] => '.$post->created_time."\n";
//print_r($post);
echo '<br/><br/><br/>';
echo'</pre><hr/>';
}