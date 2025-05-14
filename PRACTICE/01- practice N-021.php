<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $namber1 = $_POST["num1"];
        $namber2 = $_POST["num2"];
        $operation = $_POST["operation"];
        $results = 0;
    
        switch ($operation) {
            case "+":
                $results = $namber1 + $namber2;
                break;
            case "-":
                $results = $namber1 - $namber2;
                break;
            case "x":
                $results = $namber1 * $namber2;
                break;
            case "/":
                $results = $namber1 / $namber2;
                break;
        };
    
        echo "Le resultat de $namber1 $operation $namber2 = $results";
    };
  
    <!-- -------------------- -->
  
    <form action="prepa.php" method="post">
    <input type="number" name="num1" required/><br />
    <select name="operation" required>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="x">x</option>
        <option value="/">/</option>
    </select><br />
    <input type="number" name="num2" required/><br />
    <button type="submit">Calculer</button>
    </form>
</body>
</html>
