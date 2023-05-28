<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule('iblock');
$el = new CIBlockElement;

if($_REQUEST["detailText"] <> '' && $_REQUEST["name"] <> '')
{
  $arResult["ELEMENT_NAME"] = htmlspecialcharsbx($_REQUEST["name"]);
  $arResult["ELEMENT_DETAIL_TEXT"] = htmlspecialcharsbx($_REQUEST["detailText"]);
  $arResult["ELEMENT_DETAIL_PICTURE"] = htmlspecialcharsbx($_REQUEST["file_pol"]);
}

$target_dir = $_SERVER['DOCUMENT_ROOT']."/upload/";
$target_file = $target_dir . basename($_FILES["uploadedFile"]["name"]);
$imageFileType = substr(basename($_FILES["uploadedFile"]["name"]), -4);

if($imageFileType == ".jpg" || $imageFileType == ".png" || $imageFileType == "jpeg")
  move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file);

$arLoadProductArray = Array(
  "MODIFIED_BY"    => $USER->GetID(),
  "IBLOCK_SECTION_ID" => false,
  "IBLOCK_ID"      => $arParams["IBLOCK_ID"],
  "NAME"           => $arResult["ELEMENT_NAME"],
  "ACTIVE"         => "Y",
  "DETAIL_TEXT"    => $arResult["ELEMENT_DETAIL_TEXT"],
  "CODE" => $arResult["ELEMENT_NAME"],
  "DETAIL_PICTURE" => CFile::MakeFileArray($target_file)
);

if(!empty($arResult["ELEMENT_NAME"]) && !empty($arResult["ELEMENT_DETAIL_TEXT"]))
{
  if (strlen($arResult["ELEMENT_DETAIL_TEXT"]) >= 10) {
    if($PRODUCT_ID = $el->Add($arLoadProductArray))
      echo '<p id ="elem_mess">'.GetMessage("SUCCESS_MESSAGE").$PRODUCT_ID.'<p>';
    else
      echo '<p id ="elem_mess">'.GetMessage("EROOR_MESSAGE").$el->LAST_ERROR.'<p>';
    }
  else {
    echo '<p id ="elem_mess">'.GetMessage("TOO_SHORT_MESSAGE").'<p>';
  }
}

$this->includeComponentTemplate();
?>
