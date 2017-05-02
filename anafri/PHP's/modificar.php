<html>
	<head>
		<title>Coyo-species</title>
		<meta charset='UTF-8'/>
		<link rel='stylesheet' type='text/css' href='estilado.css'/>
	</head>
	<body>
	<form method="POST" action="modificar.php">
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
	echo "<form action='modificar_r.php' method='POST'>";
	if(isset($_POST['mog'])&&$_POST['mog']!='')
	{
	$mog=$_POST['mog'];
	$form=array('id','kingdom','phylum','class','order','family','genus','species','subspecies','scientific_name','nameauthor','rank','listing','party','listed_under','full_note','#full_note','all_distributionfullnames','all_distributionisocodes','nativedistributionfullnames','introduced_distribution','introduced(?)_distribution','reintroduced_distribution','extinct_distribution','extinct(?)_distribution','distribution_uncertain');
	$form2=array('id','kingdom','phylum','class_','order_','family','genus','species','subspecies','scientific_name','author','rank_','listing','party','listed_under','full_note','full_note_','all_distributionfullnames','all_distributionisocodes','nativedistributionfullnames','introduced_distribution','introduced_p_distribution','reintroduced_distribution','extinct_distribution','extinct_p_distribution','distribution_uncertain');
	$con= mysql_connect('localhost','root',"");
	mysql_select_db('anafri',$con);
	$prin=mysql_query("SELECT * FROM prin WHERE species='$mog'");
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
	echo "<tr>
	<td>id</td>
	<td>".$r[0]."</td>
	<input type='hidden' name='id' value='".$r[0]."'/>
	</tr>";
	for($i=1;$i<26;$i++){
	echo "<tr>
	<td>".$form[$i]."</td>
	<td><input type='text' name='".$form2[$i]."' value='".$r[$i]."'></td>
	</tr>";
	}
	echo "</table>
	<input type='submit' name='save' value='guardar cambios'>
	</form>
	<form action='modificar.php' method='POST'>
	<input type='submit' name='res' value='restaurar'>
	<input type='hidden' name='mog' value='$mog'/>
	</form>";
	}
		/* if("existe el nombre de la especie en la base de datos")
		{
			enviar todos los datos de la especie de manera vertical;
			a la derecha de los datos de la especie agregar 'submit type=text' para que el usuario ingrese los nuevos datos que desee para la especie;
			agregar
			-un botón al final que diga guardar cambios==>para que se guarden los cambios en la base de datos;
			-y otro botón que diga restablecer que borre todo lo escrito==>;	
		}
		else "si no existe la especie en la base de datos"
		{		
		enviar todos los nombres de atributo;
			a la derecha de los atributos agregar 'submit type=text' para que el usuario ingrese los nuevos datos que desee para la especie;
			agregar
			-un botón al final que diga guardar especie==>para que se guarden los datos en la base de datos;
			-y otro botón que diga restablecer que borre todo lo escrito==>;	 
		} */
	}
		


?>