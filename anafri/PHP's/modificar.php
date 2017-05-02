<html>
	<head>
		<title>Coyo-Species</title>
		<meta charset='UTF-8'/>
		<link rel='stylesheet' type='text/css' href='estilado.css'/>
	</head>
	<body>
	<form method="POST" action="modificar.php">
	<div align='center'><IMG height='50px' src='africa.jpg'/><IMG height='50px' src='pagprin.jpg'/></div>
		<label>Actualizar o agregar nueva especie:</label>
		<?php
		if(isset($_POST['spe'])&&$_POST['spe']!='')
		{
			echo $_POST['spe'];
			echo "<input type='hidden' name='mog' value='$_POST[spe]'/>";
		}
		else
		{
		echo "<input type='text' placeholder='Escribe el nombre de la especie' name='mog'/>";
		}
		?>
		<input type='submit'>
	</form>
	<body>
<html>
	
<?php
	$tipo=array('id','kingdom','phylum','class_','order_','family','genus','species','subspecies','scientific_name','author','rank_','listing','party','listed_under','full_note','full_note_','all_distributionfullnames','all_distributionisocodes','nativedistributionfullnames','introduced_distribution','introduced_p_distribution','reintroduced_distribution','extinct_distribution','extinct_p_distribution','distribution_uncertain');
	$campos=array("ID","KINGDOM","PHYLUM","CLASS","ORDER","FAMILY","GENUS","SPECIES","SUBSPECIES","SCIENTIFICNAME","AUTHOR","RANK","LISTING","PARTY","LISTEDUNDER","FULLNOTE",'#FULLNOTE',"All_DISTRIBUTIONFULLNAMES","ALL_DISTRIBUTIONISOCODES","NATIVEDISTRIBUTIONFULLNAMES","INTRODUCED_DISTRIBUTION","Introduced(?)_DISTRIBUTION","REINTRODUCED_DISTRIBUTION","EXTINCT_DISTRIBUTION","EXTINCT(?)_DISTRIBUTION","DISTRIBUTION_UNCERTAIN");
	if(isset($_POST['mog'])&&$_POST['mog']!='')
	{
		$mog=$_POST['mog'];
		$con= mysql_connect("localhost","root","");
		mysql_select_db("anafri");
		$prin=mysql_query("SELECT id FROM prin WHERE species='$mog'",$con);
		$reg= mysql_fetch_assoc($prin);
		$id=$reg['id'];
		
		//echo $id;
		if(mysql_query("SELECT * FROM prin JOIN clas JOIN dats JOIN alldis JOIN prim JOIN ulti WHERE prin.id=$id and clas.id=$id and dats.id=$id and alldis.id=$id and prim.id=$id and ulti.id=$id",$con))
		{
			$sec=mysql_query("SELECT * FROM prin JOIN clas JOIN dats JOIN alldis JOIN prim JOIN ulti WHERE prin.id=$id and clas.id=$id and dats.id=$id and alldis.id=$id and prim.id=$id and ulti.id=$id",$con);
			$com=mysql_fetch_assoc($sec);
		
			echo 	"<table border='1'>";
			$b=0;
			$c=0;
			foreach($com as $t)
			{
				echo "<tr>
						<td>".$campos[$b]."</td>
						<td><input type='text' name='".$tipo[$c]."' size='400' value='".$t."' /></td>
					</tr>";
				$b++;
				$c++;
			}
			echo "</table>";
		}
		else
		{
			echo "<table border='1'>";
			$c=1;
			foreach($campos as $j)
			{
				echo "<tr>
						<td>".$j."</td>";
						if($j=='ID')
						{
							$idf='aaa';
							echo "<td>".$idf."</td>";
						}
						else if($j=='SPECIES')
							echo "<td>".$mog."</td>";
						if($j!='ID'&&$j!='SPECIES')
						{
							echo "<td><input type='text' name'".$tipo[$c]."' size='300'/></td>";
							$c++;
						}
				echo "</tr>";
				
			}
		}
		echo "<input type='submit' name='act' value='Actualizar Datos'/>
			<input type='reset' value='Restablecer campos'/>";
	}
		
?>