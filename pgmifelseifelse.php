<?php
$t=date("H");
if ($t>"12")
{
 echo "Good Morning";
}
elseif ($t >"12" && $t <"16")
{
echo "Good Noon";
}
else
{
echo "good evening";
}
?>