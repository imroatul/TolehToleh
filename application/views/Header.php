<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login TolahToleh</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto+Slab'>

      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  height: 100%;
  background-color: #2c3e50;
  font-family: "Roboto Slab", serif;
  color: white;
}

.preload * {
  transition: none !important;
}

label {
  display: block;
  font-weight: bold;
  font-size: small;
  text-transform: uppercase;
  font-size: 0.7em;
  margin-bottom: 0.35em;
}

input[type="text"], input[type="password"] {
  width: 100%;
  border: none;
  padding: 0.5em;
  border-radius: 2px;
  margin-bottom: 0.5em;
  color: #333;
}
input[type="text"]:focus, input[type="password"]:focus {
  outline: none;
  box-shadow: inset -1px -1px 3px rgba(0, 0, 0, 0.3);
}

button {
  padding-left: 1.5em;
  padding-right: 1.5em;
  padding-bottom: 0.5em;
  padding-top: 0.5em;
  border: none;
  border-radius: 2px;
  background-color: #00BFA5;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
  color: white;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.45);
}

small {
  font-size: 1em;
}

.login--login-submit {
  float: right;
}

.login--container {
  width: 600px;
  background-color: #2c3e50;
  margin: 0 auto;
  position: relative;
  top: 25%;
}

.login--toggle-container {
  position: absolute;
  background-color: #2c3e50;
  right: 0;
  line-height: 2.5em;
  width: 50%;
  height: 120px;
  text-align: right;
  cursor: pointer;
  transform: perspective(1000px) translateZ(1px);
  transform-origin: 0% 0%;
  transition: all 1s cubic-bezier(0.06, 0.63, 0, 1);
  backface-visibility: hidden;
}
.login--toggle-container .js-toggle-login {
  font-size: 4em;
  text-decoration: underline;
}
.login--active .login--toggle-container {
  transform: perspective(1000px) rotateY(180deg);
  background-color: #bc1012;
}

.login--username-container, .login--password-container {
  float: left;
  background-color: #2c3e50;
  width: 50%;
  height: 120px;
  padding: 0.5em;
}

.login--username-container {
  transform-origin: 100% 0%;
  transform: perspective(1000px) rotateY(180deg);
  transition: all 1s cubic-bezier(0.06, 0.63, 0, 1);
  background-color: #bc1012;
  backface-visibility: hidden;
}
.login--active .login--username-container {
  transform: perspective(1000px) rotateY(0deg);
  background-color: #2c3e50;
}

footer {
  position: absolute;
  bottom: 12px;
  left: 20px;
}

    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>