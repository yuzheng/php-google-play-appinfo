<?php
include_once dirname(__FILE__) . "/simple_html_dom.php";

//http://simplehtmldom.sourceforge.net/manual.htm

$id = isset($_REQUEST['id'])?$_REQUEST['id']:'com.chttl.ubi';
$queryUrl = "https://play.google.com/store/apps/details?id=".$id."&hl=zh_TW";
$ch = curl_init($queryUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
$curl_html = curl_exec($ch); //use curl to get data from example.com
		
$dom = str_get_html($curl_html);

foreach($dom->find('div[itemprop]') as $element) {
	$content = $element->itemprop." : ".strip_tags($element->innertext);
	print $content."<br/>";
	
}
?>