<?php
$catalog_options = array("apiClientId"=>17483, "apiKey"=>"6e6b5715afe22c6c0469511dfd56ae39", "apiDomain"=>"avtosvet-vrn.ru");

define ("apiClientId", $catalog_options["apiClientId"]);
define ("apiKey", $catalog_options["apiKey"]);
define ("apiDomain" , $catalog_options["apiDomain"]);
define ("apiStaticContentHost","//static.ilcats.ru");
define ("apiImagesHost","//images.ilcats.ru");
define ("apiVersion","2.0");
define ("apiArticlePartLink","http://".$catalog_options["apiDomain"]."/shop/part_search?article=<%API_URL_PART_NUMBER%>");
define ("apiArticlePartLinkTarget", 1);
define ("apiPartWBrandLink", 'http://'.$catalog_options["apiDomain"].'/shop/part_search?article=<%API_URL_PART_NUMBER%>');
define ("apiPartWBrandLinkTarget", 1);
define ("apiPartUsageTarget", 0);
define ("apiPartInfo",$partInfoValue);


define ("apiClientIpAddress",$_SERVER["REMOTE_ADDR"]);

define ("apiHttpCatalogsPath",'originalnye-katalogi');

$apiActiveLanguages=[
	'ru'
];
?>