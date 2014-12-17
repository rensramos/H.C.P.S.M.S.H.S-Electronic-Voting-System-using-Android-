<?php
$a = array(1, 2, 3, 17);

for($x=2;$x<5;$x++){
	array_push($a,"hi".$x);
}

foreach ($a as $val) {
    echo "Current value of \$a: $val.\n";
}

echo count	($a)." ";

?>