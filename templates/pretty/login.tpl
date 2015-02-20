{extends file='main.tpl'}
{block name=title}
{translate}Log in{/translate}
{/block}
{block name=additionalMedia}
{/block}
{block name=content}
<form class="form-vertical form-login" id="form-login" name="form-login" role="form" novalidate method="POST">
  <fieldset>

    <!-- Form Name -->
    <legend>{translate}Log in{/translate}</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="sr-only control-label" for="input-email">{translate}Email{/translate}</label>
      <div class="controls">
        <input id="input-email" name="input-email" type="email" placeholder="{translate}Email{/translate}" class="form-control input-mini" required>
      </div>
    </div>

    <!-- Password input-->
    <div class="form-group">
      <label class="sr-only control-label" for="password-input">{translate}Password{/translate}</label>
        <div class="controls">
          <input id="password-input" name="password-input" type="password" placeholder="{translate}Password{/translate}" class="form-control" required>

      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="sr-only control-label" for="log-in-buttoon">{translate}Log in{/translate}</label>
        <div class="controls">
          <button id="log-in-buttoon" type="submit" name="log-in-buttoon" class="btn btn-primary">{translate}Log in{/translate}</button>
        </div>
    </div>

  </fieldset>
</form>

{/block}
