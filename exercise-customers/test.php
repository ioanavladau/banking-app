<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Test</title>
  <style>
    input.invalid{
      border: 2px solid red;
    }
  </style>
</head>
<body>
  <h1>TEST PAGE</h1>

  <form action="">
    <input type="text" placeholder="username" data-validate="yes" data-type="string" data-min="2" data-max="20">
    <input type="text" placeholder="name" data-validate="yes" data-type="string" data-min="2" data-max="20">
    <input type="text" placeholder="price" data-validate="yes" data-type="integer" data-min="2" data-max="8888">
    <input type="text" placeholder="email" data-validate="yes" data-type="email" data-min="6" data-max="300">
    <button>validate form one</button>
  </form>

  <form action="">
    <input type="text" placeholder="username" data-validate="yes" data-type="string" data-min="2" data-max="5">
    <button>validate form two</button>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="validate.js"></script>
</body>
</html>