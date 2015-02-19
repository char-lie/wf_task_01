{extends file='main.tpl'}
{block name=additionalMedia}
  <script src="{$media}/js/registration_validation.js"></script>
{/block}
{block name=content}
<form class="form-vertical form-registration" id="form-registration" name="form-registration" role="form" novalidate>
  <fieldset>

    <!-- Form Name -->
    <legend>{$registrationFormName}</legend>

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

    <!-- Password input-->
    <div class="form-group">
      <label class="sr-only control-label" for="password-confirm">{$lblPasswordConfirm}</label>
        <div class="controls">
          <input id="password-confirm" name="password-confirm" type="password" placeholder="{$plhPasswordConfirm}" class="form-control" required>

      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="sr-only control-label" for="continue-registration-buttoon">{$lblContinueReg}</label>
        <div class="controls">
          <button id="continue-registration-buttoon" type="submit" name="continue-registration-buttoon" class="btn btn-primary">{$plhContinueReg}</button>
        </div>
    </div>

  </fieldset>
</form>

{/block}
