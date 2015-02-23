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

<form class="form-vertical form-registration" id="form-registration" name="form-registration" role="form" novalidate method="POST">
  <fieldset>

    <!-- Form Name -->
    <legend>{translate}Registration{/translate}</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="sr-only control-label" for="input-email">{translate}Email{/translate}</label>
      <div class="controls">
        <input id="input-email" name="input-email" type="email" placeholder="{translate}Email{/translate}" class="form-control input-mini" required value="{$emailValue}">
      </div>
    </div>

    <!-- Password input-->
    <div class="form-group">
      <label class="sr-only control-label" for="password-input">{translate}Password{/translate}</label>
        <div class="controls">
          <input id="password-input" name="password-input" type="password" placeholder="{translate}Password{/translate}" class="form-control" required>

      </div>
    </div>

    <!-- Password input-->
    <div class="form-group">
      <label class="sr-only control-label" for="password-confirm">{translate}PasswordConfirm{/translate}</label>
        <div class="controls">
          <input id="password-confirm" name="password-confirm" type="password" placeholder="{translate}Confirm the password{/translate}" class="form-control" required>

      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="sr-only control-label" for="continue-registration-buttoon">{translate}Continue registration{/translate}</label>
        <div class="controls">
          <button id="continue-registration-buttoon" type="submit" name="continue-registration-buttoon" class="btn btn-primary" value="ok">{translate}Continue registration{/translate}</button>
        </div>
    </div>

  </fieldset>
</form>

{/block}
