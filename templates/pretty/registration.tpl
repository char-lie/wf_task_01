{extends file='main.tpl'}
{block name=content}
      <form class="form-signin">
        <h2 class="form-signin-heading" data-translatable="signin">Please sign in</h2>
        <label for="inputEmail" class="sr-only" data-translatable="email">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus data-translatable-placeholder="email_plh">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
{/block}
