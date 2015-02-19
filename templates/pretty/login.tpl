{extends file='main.tpl'}
{block name=content}
      <form class="form-signin">
        <h2 class="form-signin-heading">{$PleaseSignIn}</h2>
        <label for="inputEmail" class="sr-only">{$EmailAddress}</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="{$EmailAddress}" required autofocus>
        <label for="inputPassword" class="sr-only">{$Password}</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="{$Password}" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> {$RememberMe}
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">{$SignIn}</button>
      </form>
{/block}
