<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <link rel="stylesheet" href="currency.css">
</head>
<body>
    <div class="container">
    <h1>Currency</h1><br>
    <?php
    if(isset($_POST['submit'])){
        $from    = $_POST['from'];
        $to      = $_POST['to'];
        $amount  = $_POST['Amount'];

        $amount = $_POST['amount'];

        $dyno = $from . "_" . $to;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://free.currconv.com/api/v7/convert?q=$dyno&compact=ultra&apiKey=06f5c10d2df011f15a79",
            CURLOPT_RETURNTRANSFER => 1
        ));
        $response = curl_exec($curl);
        $response = json_decode($response  , true);
        $rate = $response[$dyno];
        $total = $rate * $amount;
        echo "$amount $from = $total $to";
        echo "<br>";
    }
    ?>
        <form method="POST" action="currency.php">
            <div class="form-group">
                <label>From</label><br>
                <input type="text" name="from" class="form-control">
            </div>
            <div class="form-group">
                <label>To</label><br>
                <input type="text" name="to" class="form-control">
            </div>
            <div class="form-group">
                <label>Amount</label><br>
                <input type="text" name="Amount" class="form-control">
            </div><br>
            <input type="submit" name="submit" class="button" value="Convert">
        </form>
    </div>
</body>
</html>

