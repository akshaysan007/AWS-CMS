<!DOCTYPE html>
<html>
<head>
    <title>New Ride Booked</title>
</head>
 
<body>
<h2>Dear {{$ride->customer->f_name}}, Your ride has been booked (Ride No: {{$ride->ride_no}}) From {{$ride->source}} On {{$ride->from->format('d M Y')}}.</h2>
<br/>
</body>
 
</html>
