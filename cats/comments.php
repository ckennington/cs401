<?php
  include("header.php");
  require_once 'classes/Dao.php';
  require_once 'classes/Render.php';
  $dao = new Dao();

?>
<div id="content">
  <form method="POST" action="handler.php">
    <div>
    Enter a comment
    <input type="text" id="comment" name="comment">
    <input type="password" id="comment" name="password">
    </div>
    <div>
    Enter your age
    <input type="text" name="age">
    <div>
    Favorite Car
		<select name="car">
			<option value="volvo">Volvo</option>
			<option value="saab">Saab</option>
			<option value="gremlin">Mercedes</option>
			<option value="audi">Audi</option>
		</select>
    </div>
    <div>
    <input type="radio" name="icecream" value="chocolate">Chocolate<br>
    <input type="radio" name="icecream" value="vanilla">Vanilla<br>
    </div>
<br/>
    <div>
    <input type="checkbox" name="male" value="on"> Male<br>
    <input type="checkbox" name="female" value="on"> Female<br>
    <input type="checkbox" name="other" value="on"> Other
    </div>
</form>
    <input type="submit">
  </form>
  <?php Render::renderTable($dao->getComments()); ?>
</div>
<?php
  include("footer.php");
?>
