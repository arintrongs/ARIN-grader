<html>

<?php
$log = shell_exec('./timeout -t 1 -m 32765 2>&1 ./a.out < problems/1/6.in > ans.sol');
echo $log;
?>
</html>