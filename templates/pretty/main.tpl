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

    <!--<script src="{$media}/js/jquery-1.11.2.min.js"></script>-->
    <script src="{$media}/jquery-validation-1.13.1/lib/jquery.js"></script>
    <script src="{$media}/bootstrap-3.3.2/js/bootstrap.min.js"></script>
    <script src="{$media}/jquery-validation-1.13.1/dist/jquery.validate.js"></script>
    {if $languageCode !== 'en'}
    <script src="{$media}/jquery-validation-1.13.1/dist/localization/messages_{$languageCode}.js"></script>
    {/if}

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
        </div>

        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            {foreach from=$navigationElements key=url item=name}
              <li {if $currentPage === $name}class="active"{/if}><a href="{$url}">{$name}</a></li>
            {/foreach}
          </ul>

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

  </body>
</html>
