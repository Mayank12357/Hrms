 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>Leave Application</title>
 <style>
 html, body{margin:0; padding:0; font-family:arial; font-size:14px; font-weight:400;}
 
 </style>
 
 
  </head>
  <body>
    <!-- main table -->
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td bgcolor="#f1f1f1" width="100%">	
<!--table header -->
<table width="100%" border="0" bgcolor="#f18900" style="padding:0 0;">
<tr>
<td>
<table width="600" border="0" bgcolor="#fff" style="margin:60px auto 0;">
<tr>
<td align="center" valign="bottom">
<h2><img src="https://hrms.<?php echo $_SERVER['SERVER_NAME']; ?>/img/logo.jpg" alt="maxxmann logo" width="280" /></h2>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!--table header close-->
<!-- middle table -->
<table width="100%" border="0" bgcolor="#fff" >
<tr>
<td>
<table width="600" border="0" style="margin:0 auto;">
<tr>
<td>
<?php  //print_r($data); die; ?>
<h2 style="font-size:16px; margin-top:20px;">Dear {{$data['name']}},</h2>
<p style="font-size:14px; margin-top:20px;">This is to bring to your kind attention that your <b>{{$data['Leave_Type']}}</b> has been cancelled. The leave applied on <b>{{$data['updated_at']}}</b>  for <b><?php if($data['days'] <= 1){ echo $data['days'] . " Day";} else{
   echo $data['days'] . " Days"; 
} ?></b> from <b>{{$data['date_from']}}</b> to <b>{{$data['date_to']}}</b>.</p>
<p style="font-size:14px; margin-top:20px; line-height:20px;">Regards</p>
<p style="font-size:14px; margin-top:20px; line-height:20px;"><b>{{$data['team_leader_name']}}</b></p>
</td>
</tr>
</table>
</td>
</tr><!-- text content -->
<tr>
<td>
 
</td>
</tr>
</table>

</td>
</tr>
<!-- content -->
<tr>
<td>

</td>
</tr><!-- text content -->

</table>

<table width="100%" border="0" bgcolor="#f1f1f1" style="margin-top:50px;">
<tr>
<td>
<table width="600" border="0" style="margin:0 auto;">
<tr>
<td align="center">
<h3>Maxxmann Communications</h3>
<p style="line-height:24px;">
SCO 341-342, Sector 34-A, Chandigarh (160022).<br/>
0172 461 0626&nbsp;&nbsp; | &nbsp;&nbsp;contactus@maxxmann.com<br/>

</p>

</td>
</tr>
</table>
<!-- offer table -->	

</td>
</tr>	
</table>


</body>
</html>