<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>{block name=title}{translate}Site{/translate}{/block}</title>

    <!-- Bootstrap core CSS -->
    <link href="{$media}/bootstrap-3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!--<script src="{$media}/js/jquery-1.11.2.min.js"></script>-->
    <script src="{$media}/jquery-validation-1.13.1/lib/jquery.js"></script>
    <script src="{$media}/bootstrap-3.3.2/js/bootstrap.min.js"></script>
    <script src="{$media}/jquery-validation-1.13.1/dist/jquery.validate.js"></script>
    {if $currentLanguageCode !== 'en'}
    <script src="{$media}/jquery-validation-1.13.1/dist/localization/messages_{$currentLanguageCode}.js"></script>
    {/if}

    {block name=additionalMedia}{/block}
  </head>

  <body>

  <div class="container">
    {include file='navigation_bar.tpl'}
  </div>
  <div class="container">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
    {block name=content}{/block}
    </div>
    <div class="col-sm-3">
    </div>
  </div> <!-- /container -->

  </body>
</html>
