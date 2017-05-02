<?php
	$con= mysql_connect('localhost','root',"");
	mysql_select_db('anafri',$con);
	mysql_query("UPDATE alldis SET all_distributionfullnames='$_POST[all_distributionfullnames]', all_distributionisocodes='$_POST[all_distributionisocodes]', distribution_uncertain='$_POST[distribution_uncertain]'
	WHERE id='$_POST[id]'",$con);
	mysql_query("UPDATE clas SET scientific_name='$_POST[scientific_name]', kingdom='$_POST[kingdom]', phylum='$_POST[phylum]', class_='$_POST[class_]', order_='$_POST[order_]', family='$_POST[family]', genus='$_POST[genus]', subspecies='$_POST[subspecies]'
	WHERE id='$_POST[id]'",$con);
	mysql_query("UPDATE dats SET author='$_POST[author]', rank_='$_POST[rank_]', listing='$_POST[listing]', party='$_POST[party]', listed_under='$_POST[listed_under]', full_note='$_POST[full_note]', full_note_='$_POST[full_note_]'
	WHERE id='$_POST[id]'",$con);
	mysql_query("UPDATE prim SET reintroduced_distribution='$_POST[reintroduced_distribution]', introduced_distribution='$_POST[introduced_distribution]', introduced_p_distribution='$_POST[introduced_p_distribution]', nativedistributionfullnames='$_POST[nativedistributionfullnames]'
	WHERE id='$_POST[id]'",$con);
	mysql_query("UPDATE prin SET species='$_POST[species]'
	WHERE id='$_POST[id]'",$con);
	mysql_query("UPDATE ulti SET extinct_distribution='$_POST[extinct_distribution]', extinct_p_distribution='$_POST[extinct_p_distribution]'
	WHERE id='$_POST[id]'",$con);
	?>