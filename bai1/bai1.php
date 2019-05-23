<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    <h3>Giai Phương Trình Bậc Hai</h3>

    <form action="" method="POST" accept-charset="utf-8">
        <input type="text" name="txta" style="width: 20px;" value=""> X<sub>2</sub> +
        <input type="text" name="txtb" style="width: 20px;" value=""> X +
        <input type="text" name="txtc" value="">
        <br><br>
        <input type="submit" name="result" value="KetQua">
    </form>
    <?php
        if (isset($_POST['result']))
        {
            $kq = '';
            $a = isset($_POST['txta']) ? $_POST['txta'] : '';
            $b = isset($_POST['txtb']) ? $_POST['txtb'] : '';
            $c = isset($_POST['txtc']) ? $_POST['txtc'] : '';

            $delta = ($b*$b) - (4*$a*$c);

            if ($delta < 0){
                $kq = 'Phương trình vô nghiệp';
            }
            else if ($delta == 0){
                $kq = 'Phương trình nghiệp kép x1 = x2 = ' . (-$b/2*$a);
            }
            else {
                $kq = 'Phương trình có hai nghiệp phân biệt, x1 = ' . ((-$b + sqrt($delta))/2*$a);
                $kq .= ',x2 = ' . ((-$b - sqrt($delta))/2*$a);
            }   
        }
    ?>
    <?php
        if(isset($_POST['result']))
        {
            echo $kq;
        }
        
    ?>
</body>
</html>