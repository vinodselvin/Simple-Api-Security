# Simple Api Security

An easy to use library for securing Api Calls,

## How to Install

Just, Copy and Paste library Authenticator.php, library location

```html
application/libraries/Authenticator.php
```

## How to Use

  1) Load Library Authenticator,

  ```html
  $this->load->library("Authenticator");
  ```

  2) If user is valid user set_user param to true, so that library can generate access_token for that user.

  ```html
  $this->load->library("Authenticator", array("set_user"=> true));
  ```

  3) To get Access Token, use below code.

  ```html
  $access_token = $this->authenticator->getAccessToken();
  ```

  4) Then for all call use the above generated Access Token, to get access to API, just post or get method with key as `access_token`, example below shows, for get request.

  ```html
  eg. http://your-url/some-controller/?access_token=access_token_generated_at_step_3
  ```

  5) Cheers! It is working, if it doesn't, then have a coffee and debug :)

#### Notice: The Above Documentation is for Codeigniter, for other libraries, create issue or pull request for ReadMe.md
