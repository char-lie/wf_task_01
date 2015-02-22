<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">{translate}Toggle navigation{/translate}</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="/">{translate}Site{/translate}</a>
    </div>

    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        {foreach from=$navigationElements key=url item=name}
          <li {if $currentPage === $name}class="active"{/if}><a href="{$url}">{$name}</a></li>
        {/foreach}
      </ul>

      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{translate}Language{/translate}<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            {foreach from=$languages key=url item=title}
            <li {if $languageCode === $title['short']}class="disabled"{/if}><a href="{$url}">{$title['long']}</a>
            {/foreach}
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
