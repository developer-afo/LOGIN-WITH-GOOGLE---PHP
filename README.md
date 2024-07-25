# LOGIN WITH GOOGLE AND GET 30seconds OTP

## Configuration

### Create a free account in Auth0

1. Go to [Auth0](https://auth0.com) and click Sign Up.
2. Use Google, GitHub or Microsoft Account to login.

### Create an Auth0 Application

You will need to create a Regular Web Application using the [Auth0 Dashboard](https://manage.auth0.com). This will give you a Domain, Client ID, and Client Secret you will need below.

### Configure Credentials

Your project needs to be configured with your Auth0 Domain, Client ID, and Client Secret for the authentication flow to work.

Copy .env.example into a new file in the same folder called .env, and replace the values with your Auth0 application credentials:

```sh
# Your Auth0 application's Client ID
AUTH0_CLIENT_ID='YOUR_AUTH0_CLIENT_ID'

# The url of your Auth0 tenant domain
AUTH0_DOMAIN='https://YOUR_AUTH0_DOMAIN.auth0.com'

# Your Auth0 application's Client Secret
AUTH0_CLIENT_SECRET='YOUR_AUTH0_CLIENT_SECRET'

# A long secret value used to encrypt the session cookie
AUTH0_COOKIE_SECRET='LONG_RANDOM_VALUE'
```

**Note**: Make sure you replace `LONG_RANDOM_VALUE` with your secret (you can generate a suitable string using `openssl rand -hex 32` on the command line).

**Note**: Ensure you are consistent in your use of 'localhost' and/or '127.0.0.1' when testing. These must match your Auth0 Application settings or you will encounter errors. They must also match for session cookies to work correctly.

## Install dependencies

Please ensure you have [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos) installed and accessible from your shell. This is required.

```bash
composer install --no-dev
```

## Run the project

Next, use the following command to install the necessary dependencies and start the sample:

```bash
php -S 127.0.0.1:3000 public/index.php
```

Your Quickstart should now be accessible at [http://127.0.0.1:3000/](http://127.0.0.1:3000/) from your web browser.
