<?php
include_once('connection.php');
$_SESSION['page'] = 'main';
include('header.php');
 ?>
<!-- Title -->

<br>
<h1 class="txt-dark text-center">MENU</h1>
<br>



<?php 
$qry = mysqli_query($connection, "select * from menu_category_table");

while ($res = mysqli_fetch_assoc($qry)) { ?>





<a href="menu.php?menucategoryid=<?php echo $res['menucategoryid'] ?>&menucategoryname=<?php echo $res['menucategoryname']; ?>">
<div class="panel panel-primary card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h4 class="panel-title txt-light"><?php echo $res['menucategoryname']; ?></h4>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
</a>



<?php } ?>








<!-- /Title -->
<?php 
include('footer.php');
 ?>


