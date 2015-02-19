{extends file='main.tpl'}
{block name=additionalMedia}
{/block}
{block name=content}
<form class="form-vertical form-login" id="form-login" name="form-login" role="form" novalidate>
  <fieldset>

    <!-- Form Name -->
    <legend>{$loginFormName}</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="sr-only control-label" for="input-email">{$lblEmail}</label>
      <div class="controls">
        <input id="input-email" name="input-email" type="email" placeholder="{$plhEmail}" class="form-control input-mini" required>
      </div>
    </div>

    <!-- Password input-->
    <div class="form-group">
      <label class="sr-only control-label" for="password-input">{$lblPassword}</label>
        <div class="controls">
          <input id="password-input" name="password-input" type="password" placeholder="{$plhPassword}" class="form-control" required>

      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="sr-only control-label" for="log-in-buttoon">{$lblLogIn}</label>
        <div class="controls">
          <button id="log-in-buttoon" type="submit" name="log-in-buttoon" class="btn btn-primary">{$plhLogIn}</button>
        </div>
    </div>

  </fieldset>
</form>

{/block}
