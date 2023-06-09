<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arTypesEx = CIBlockParameters::GetIBlockTypes(array("-"=>" "));

$arIBlocks=array();
$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
	$arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];

$arComponentParameters = array(
"GROUPS" => array(),
  "PARAMETERS" => array(
    "IBLOCK_TYPE" => array(
      "PARENT" => "BASE",
      "NAME" => GetMessage("PARAM_NAME_IBLOCK_TYPE"),
      "TYPE" => "LIST",
      "VALUES" => $arTypesEx,
			"DEFAULT" => "",
			"REFRESH" => "Y",
    ),
    "IBLOCK_ID" => array(
      "PARENT" => "BASE",
      "NAME" => GetMessage("PARAM_NAME_IBLOCK_ID"),
      "TYPE" => "LIST",
      "VALUES" => $arIBlocks,
			"DEFAULT" => '={$_REQUEST["ID"]}',
			"ADDITIONAL_VALUES" => "Y",
			"REFRESH" => "Y",
    ),
  ),
);
?>
