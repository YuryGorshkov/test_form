<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* @var array $arParams */
/* @var array $arResult */
/* @global \CMain $APPLICATION */
/* @global \CUser $USER */
/* @global \CDatabase $DB */
/* @var \CBitrixComponentTemplate $this */
/* @var string $templateName */
/* @var string $templateFile */
/* @var string $templateFolder */
/* @var string $componentPath */
/* @var array $templateData */
/* @var \CBitrixComponent $component */
$this->setFrameMode(true);
?>

<form id="iform" data-url="<?=POST_FORM_ACTION_URI?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name"><?=GetMessage("NAME")?></label>
    <input type="text" class="form-control" name="name" required>
  </div>
  <div class="form-group">
    <label for="detailText"><?=GetMessage("DETAIL_TEXT")?></label>
    <textarea class="form-control" name="detailText" required></textarea>
  </div>
  <div class="form-group">
    <label class="custom-file-label" for="uploadedFile"><?=GetMessage("DETAIL_PICTURE")?></label>
    <input type="file" class="custom-file-input" size="30" name="uploadedFile" value="">
  </div>
  <br><div class="alert alert-dark" role="alert" style="display: none;" id=message></div>
  <br><button type="submit" class="btn btn-primary"><?=GetMessage("SEND")?></button>
</form>
