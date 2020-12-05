<?php

$data = $_POST;
$get_predict = false;

if ( isset($data["do_goroscope"]) )
{
    $error = NULL;
    if ( $data["b_day"] == "" or $data["b_day"] > 31 ) {
        $error = "Enter a valid day of birth";
    }
    if ( $data["b_month"] == "" ) {
        $error = "Enter month of birth";
    }
    if ( $data["b_year"] == "" or $data["b_year"] > date("Y") ) {
        $error = "Enter a valid year of birth";
    }

    if ( $error == NULL )
    {
        include "astro.php";
        $sign = getsign($data["b_day"], $data["b_month"]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://horoscope-api.herokuapp.com/horoscope/today/" . $sign);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER , True);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION , TRUE);
        $result = json_decode(curl_exec($ch), true)["horoscope"];
        curl_close($ch);
        $get_predict = true;
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Horoscope</title>

        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>


    <body>

        <?php if ($get_predict ) echo '<script type="text/javascript">alert("' . $result . '");</script>';?>
        <div class="data">
            <form method="POST" action="/">
                <p>Find out your destiny</p>
                <?php if ( $error != NULL ) echo "<div style='color:#ff0000'>$error</div>" ?>
                <input type="number" name="b_day" class="bday" value=<?php echo @$data["b_day"]?>>

                <select name="b_month">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>

                <input type="number" name="b_year" class="byear" value=<?php echo @$data["b_year"]?>>

                <p><input type="submit" name="do_goroscope" value="Find out"></p>

            </form>
        </div>

    </body>
</html>

