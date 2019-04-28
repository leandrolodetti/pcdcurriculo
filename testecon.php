<html>

<head>

<title>PHP Test</title>

</head>

<body>

<?php echo '<p>Hello World</p>';

// Troque os termos "webuser" e "senha" pelo usuário e senha do MySQL

$servername = "localhost";

$username = "publico";

$password = "ede02e60172b237f72e48299bce8ac8e";

// Create MySQL connection

$conn = mysqli_connect($servername, $username, $password);

// Verifique a conexão. Se falhar, uma mensagem de erro deve ser exibida

if (!$conn) {

die('<p>Connection failed: <p>' . mysqli_connect_error());

}

echo '<p>Connected successfully</p>';

?>

</body>

</html>