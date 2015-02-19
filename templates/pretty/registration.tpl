{extends file='main.tpl'}
{block name=content}
      <form class="form-signin">
        <h2 class="form-signin-heading">{$registrationHeading}</h2>
        <label for="inputEmail" class="sr-only">{$labelEmail}</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="{$labelEmail}" required autofocus>
        <label for="inputPassword" class="sr-only">{$labelPassword}</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="{$labelPassword}" required>
        <label for="confirmPassword" class="sr-only">{$labelConfPassword}</label>
        <input type="password" id="confirmPassword" class="form-control" placeholder="{$labelConfPassword}" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">{$continueRegButton}</button>
      </form>
{/block}
