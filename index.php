<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karácsonyi húzás</title>
    <link rel="stylesheet" href="style.css">
</head>


<?php
$names = file("names.txt", FILE_IGNORE_NEW_LINES);
?>

<body>
    <div class="center rainbow">
        <h2>Karácsonyi húzás:))</h2>
    </div>
    <div class="inside">
        <?php
        for ($i = 0; $i < sizeof($names); $i++) {
            echo "<a class='paper' id='val" . $i . "' onclick='clickon(this.id)'></a>";
        }
        ?>
    </div>
</body>

<script>
    function clickon(index) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let str = this.responseText;
                if(str == "RELOAD") {
                    alert("Valaki más közben húzott, az oldalt újratöltjük!");
                    location.reload();
                } else {
                    alert("A húzott neved: " + str + "! ÍRD FEL!!");
                    document.getElementById(index).innerHTML = str;
                    let papers = document.getElementsByClassName("paper");
                    for (let x = 0; x < papers.length; x++) {
                        papers[x].onclick = "";
                        
                    }
                }
            }
        };
        let nums = document.querySelectorAll('.paper').length;
        xmlhttp.open("GET", "pick.php?q=" + index + "&num="+nums, true);
        xmlhttp.send();
    }
</script>

</html>