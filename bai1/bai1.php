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
        <input type="text" name="txta" style="width: 20px;" value=""> X<sup>2</sup> +
        <input type="text" name="txtb" style="width: 20px;" value=""> X +
        <input type="text" name="txtc" style="width: 20px;" value=""> = 0
        <br><br>
        <input type="submit" name="result" value="KetQua">
    </form>
    <?php
        if (isset($_POST['result']))
        {

            $kq = '';

            $a = ($_POST['txta']=='') ? 0 :  $_POST['txta'];
            $b = ($_POST['txtb']=='') ? 0 :  $_POST['txtb'];
            $c = ($_POST['txtc']=='') ? 0 :  $_POST['txtc'];

            if(!is_numeric($a) || ! is_numeric($b) || ! is_numeric($c))
            {
                echo "Sai Dữ Liệu";
                exit();
            }
            
            echo $a = gptb2($a,$b,$c);
            
        }

        function gptb2($a,$b,$c)
        {
            $delta = ($b*$b) - (4*$a*$c);
            if ($delta < 0){
                $kq = 'Phương trình vô nghiệp';
            }
            else if ($delta == 0){
                $kq = 'Phương trình nghiệp kép x1 = x2 = ' . (-$b/2*$a);
            }
            else {
                $kq = 'Phương trình có hai nghiệp phân biệt:'.'<br>'.'x1='.((-$b + sqrt($delta))/2*$a)."<br>".'x2 = '.((-$b - sqrt($delta))/2*$a);
            }   
            return $kq;
        }
    ?>

</body>
</html>