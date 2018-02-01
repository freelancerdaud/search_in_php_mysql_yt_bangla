# Search with php mysql    

Sql query for search is   

~~~sql
select * from table_name where column_name like '%your_query_word%'    
~~~     
                   
So we will make a form with name q. which can be accessed by `$_GET` super global. Initially we will fetch all data from database but if user search for something we will filtering query by user search keyword       

html part     
~~~html
<input type="text" name="q" class="form-control" placeholder="search here .....">
<button type="submit" class="btn btn-primary">Search</button>
~~~

php part     
~~~php
$con = new PDO('mysql:host=localhost;dbname=search', 'root', '');

if (isset($_GET['q'])) {
  $q = $_GET['q'];
  $statement = $con->prepare("select * from people where name like :name or email like :email");
  $statement->execute([
    ':name' => '%'.$q.'%',
    ':email' => '%'.$q.'%',
  ]);
} else {
  $statement = $con->prepare('select * from people');
  $statement->execute();
}
$people = $statement->fetchAll(PDO::FETCH_OBJ);
~~~



