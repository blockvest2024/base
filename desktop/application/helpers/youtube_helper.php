<?php
function you_key()
{
	return "AIzaSyDQJHDQnmiOKrkjsEweJvcCISuuaIF_qLw";//"AIzaSyDKLtAKwhpizwStnlrb_YGrceWM-pIAAo8";
}
function you_channel($channel_id, $limit=20)
{
	$apikey	 = you_key();
	$url = "https://www.googleapis.com/youtube/v3/search?key=".$apikey."&channelId=".$channel_id."&part=snippet,id&order=date&maxResults=".$limit;
	
	$data = get_remote_data($url);
	 
	return $data;
	
}
function you_subscribe($channel_id)
{
	$apikey	 = you_key();
	$url = "https://www.googleapis.com/youtube/v3/channels?part=statistics&id=".$channel_id."&key=".$apikey;
	
	$data = get_remote_data($url);
	 
	return $data;
	
}
function you_view($videoid)
{
	$apikey	 = you_key();
	 $video_ID = $videoid;
	$url = "https://www.googleapis.com/youtube/v3/videos?part=statistics&id=".$videoid."&key=".$apikey;
	$data = get_remote_data($url);
	return $data;
 
	 
	//$JSON = file_get_contents("https://gdata.youtube.com/feeds/api/videos/{$video_ID}?v=2&alt=json");
	//$JSON_Data = json_decode($JSON);
	//$views = $JSON_Data->{'entry'}->{'yt$statistics'}->{'viewCount'};
	//echo $views;	
}
 