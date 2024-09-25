<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Calculation Result</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0" width="50%">
        <tr>
            <th>Expression</th>
            <th>Result</th>
        </tr>

        <?php 
        $rows = [  [$_POST['input1'], $_POST['op1'], $_POST['input2'], $_POST['op2'], $_POST['input3']],
                   [$_POST['input4'], $_POST['op3'], $_POST['input5'], $_POST['op4'], $_POST['input6']],
                   [$_POST['input7'], $_POST['op5'], $_POST['input8'], $_POST['op6'], $_POST['input9']] ];

        foreach ($rows as $row) {
            $num1 = trim($row[0]);  
            $op1 = $row[1];
            $num2 = trim($row[2]);
            $op2 = $row[3];
            $num3 = trim($row[4]);

            // Construct the expression
            $expression = $num1 . ' ' . $op1 . ' ' . $num2 . ' ' . $op2 . ' ' . $num3;

            // Check for empty input or invalid characters
            if ($num1 === '' || $num2 === '' || $num3 === '' || !is_numeric($num1) || !is_numeric($num2) || !is_numeric($num3)) {
                $result = "Error: Invalid input";
            } 
            
            // Check for division by zero
            elseif (($op1 === '/' && $num2 == 0) || ($op2 === '/' && $num3 == 0)) {
                $result = "Error: Division by zero";

            } else {
                // Evaluate the expression
                $result = eval("return $expression;");  // Use eval to evaluate the expression
            }

            // Round result if it is numeric
            if (is_numeric($result)) {
                $result = round($result,4);
            }

            print "<tr><td>$expression</td><td>$result</td></tr>";
        }
        
        ?>
    </table>
</body>
</html>
