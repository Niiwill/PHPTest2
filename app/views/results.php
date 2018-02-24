<?php
if(empty($users)){
	
	?><H1>Nema trazenog usera</H1><?php
	die;
}


?>

<TABLE border="border" summary="">
<CAPTION>Users</CAPTION>
<TR>
   <TH id="t1">Name</TH>
   <TH id="t2">Email</TH>
<?php 

if(empty($users)){

}
foreach ($users as $user) {

?>
<TR>
   <TD id="t1"><?=$user['name']?></TD>
   <TD id="t2"><?=$user['email']?></TD>
   

<?php } ?>

</TABLE>

