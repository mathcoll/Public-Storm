<h2>Installation process - step 1</h2>
<h3>Database configuration</h3>
<p>
<form action="index.php" method="post">
type : <select name="type">
	<option value="database_txtsql">TxtSQL</option>
	<option value="database_sqlite">SqLite</option>
	<option value="database_mysql" selected="true">Mysql</option>
</select><br />
host : <input type="text" name="host" value="localhost"><br />
user : <input type="text" name="user" value="user"><br />
password : <input type="password" name="password" value="*****"><br />
database : <input type="text" name="database" value="database"><br />
<input type="submit" value="Next">
</form>
</p>