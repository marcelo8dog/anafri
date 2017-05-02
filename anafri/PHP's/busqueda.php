<?php
$form=array('id','kingdom','phylum','class','order','family','genus','species','subspecies','scientific_name','nameauthor','rank','listing','party','listed_under','full_note','#full_note','all_distributionfullnames','all_distributionisocodes','nativedistributionfullnames','introduced_distribution','introduced(?)_distribution','reintroduced_distribution','extinct_distribution','extinct(?)_distribution','distribution_uncertain');
$form2=array('id','kingdom','phylum','class_','order_','family','genus','species','subspecies','scientific_name','author','rank_','listing','party','listed_under','full_note','full_note_','all_distributionfullnames','all_distributionisocodes','nativedistributionfullnames','introduced_distribution','introduced_p_distribution','reintroduced_distribution','extinct_distribution','extinct_p_distribution','distribution_uncertain');
$con= mysql_connect('localhost','root',"");
mysql_select_db('anafri',$con);
$prin=mysql_query("SELECT * FROM prin WHERE species='$_POST[esp]'");
while($reg= mysql_fetch_array($prin)){
$species=$reg['species'];
$id=$reg['id'];
}
if(isset($species)){
$todo=mysql_query("SELECT * FROM prin JOIN clas JOIN dats JOIN alldis JOIN prim JOIN ulti WHERE prin.id=$id and clas.id=$id and dats.id=$id and alldis.id=$id and prim.id=$id and ulti.id=$id");
while($reg= mysql_fetch_array($todo)){
	for($i=0;$i<26;$i++)
	$r[$i]=$reg[''.$form2[$i].''];
}
echo "<table border='1'>";
for($i=0;$i<26;$i++){
echo "<tr>
	<td>".$form[$i]."</td>
	<td>".$r[$i]."</td>
	</tr>";
}
echo "</table>";
}
else{
echo "No existe esta especie. ¿Desea agregarla?";
echo "<form method='POST' action='modificar.php'>
		<input type='submit' value='Si, deseo agregarla'/>
		<input type='hidden' name='spe' value='$_POST[esp]'/>
		</form>
		<form method='POST' action='principal.php'>
		<input type='submit' value='No, volver a buscar'>
		</form>";
}
echo	"<!DOCTYPE hmtl>
		<html lang='es'>
			<head>
				<title>Coyo-species</title>
				<meta charset='UTF-8'/>
				<link rel='stylesheet' type='text/css' href='estilado.css'/>
			</head>
			<body>
				<div align='center'><IMG height='50px' src='africa.jpg'/><IMG height='50px' src='pagprin.jpg'/></div>
			</body>
		</html>"
?>