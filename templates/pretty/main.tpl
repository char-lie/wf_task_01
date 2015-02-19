<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>{$title}</title>

    <!-- Bootstrap core CSS -->
    <link href="{$media}/bootstrap-3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--
    <link href="{$media}/css/main.css" rel="stylesheet">
    -->
    <link href="{$media}/css/main.css" rel="stylesheet">

    <!--<script src="{$media}/js/jquery-1.11.2.min.js"></script>-->
    <script src="{$media}/jquery-validation-1.13.1/lib/jquery.js"></script>
    <script src="{$media}/jquery-validation-1.13.1/dist/jquery.validate.js"></script>
    {if $languageCode !== 'en'}
    <script src="{$media}/jquery-validation-1.13.1/dist/localization/messages_{$languageCode}.js"></script>
    {/if}
    <script src="{$media}/js/validation.js"></script>
    <script src="{$media}/bootstrap-3.3.2/js/bootstrap.min.js"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {block name=additionalMedia}{/block}
  </head>

  <body>
  <div class="container">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
          <a class="navbar-brand" href="/">Brand</a>

        <ul class="nav navbar-nav">
          {foreach from=$navigationElements key=url item=name}
            <li {if $currentPage === $name}class="active"{/if}><a href="{$url}">{$name}</a></li>
          {/foreach}
        </ul>
      </div>


      <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{$Language}<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              {foreach from=$languages key=oLanguageCode item=languageTitle}
              <li {if $languageCode === $oLanguageCode}class="disabled"{/if}><a href="?select-language={$oLanguageCode}">{$languageTitle}</a>
              {/foreach}
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>
  <div class="container">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
    {block name=content}{/block}
    </div>
    <div class="col-sm-3">
    </div>
  </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
