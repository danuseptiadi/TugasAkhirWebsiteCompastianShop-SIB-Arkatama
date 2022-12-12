
 <section class="forms-section">
        <h1 class="section-title">Login</h1>
        <div class="forms">
          <div class="form-wrapper is-active">
            <button type="button" class="switcher switcher-login">
              Login
              <span class="underline"></span>
            </button>
            <form class="form form-login" method="POST" action="#">
              <fieldset>
                <legend>Please, enter your username and password for login.</legend>
                <div class="input-block">
                  <label for="login-username">Username</label>
                  <input id="login-username" type="username" name="login[login_username]" required>
                </div>
                <div class="input-block">
                  <label for="login-password">Password</label>
                  <input id="login-password" type="password" name="login[login_password]" required>
                </div>
              </fieldset>
              <button type="submit" class="btn-login">Login</button>
            </form>
          </div>
          <div class="form-wrapper">
            <button type="button" class="switcher switcher-signup">
              Sign Up
              <span class="underline"></span>
            </button>
            <form class="form form-signup">
              <fieldset>
                <legend>Please, enter your name, username, password and password confirmation for sign up.</legend>
                <div class="input-block">
                  <label for="signup-name">Name</label>
                  <input id="signup-name" type="text" required>
                </div>
                <div class="input-block">
                  <label for="signup-username">Username</label>
                  <input id="signup-username" type="username" required>
                </div>
                <div class="input-block">
                  <label for="signup-password">Password</label>
                  <input id="signup-password" type="password" required>
                </div>
                <div class="input-block">
                  <label for="signup-password-confirm">Confirm password</label>
                  <input id="signup-password-confirm" type="password" required>
                </div>
              </fieldset>
              <button type="submit" class="btn-signup">Continue</button>
            </form>
          </div>
        </div>