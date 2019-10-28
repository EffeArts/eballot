
<?php  
date_default_timezone_set('Africa/Kigali');


$Draw_time = "23/10/2019 10:30:00";

$date = DateTime::createFromFormat("d/m/Y H:i:s",$Draw_time);
$date2 = new DateTime();
echo $diff = $date2->diff($date)->format("%a days, %H hours and %i minutes")

?>