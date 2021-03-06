{extends file='main.tpl'}
{block name=title}
{translate}Registration{/translate}
{/block}
{block name=additionalMedia}
  <script src="{$media}/js/validation.js"></script>
  <script src="{$media}/js/registration_validation.js"></script>
{/block}
{block name=content}
{if !is_null($error)}
  <div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
      {$error}
  </div>
{/if}

{$form}

{/block}
