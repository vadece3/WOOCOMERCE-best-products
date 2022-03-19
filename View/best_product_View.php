<!DOCTYPE html>
<html>
  <head>
    <title>VIEW BEST SOLD PRODUCTS</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css" />
  </head>
  <body>
    <form name="form1" method="post" action="">
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>LIST OF THE BEST SOLD PRODUCTS FROM THE FIRST TO THE LAST</h1>
</div>    

        </div>

        <div id="product_number">
              <p class="description"><?php echo __( 'Enter the number of products you want to view ', 'bestproduct' ); ?></p>
              <label><input class="regular-text" type="number" name="product_number" value="<?php echo $product_number; ?>"></label>
            <p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php echo __( 'Save Changes', 'bestproduct' ); ?>" /></p>
      </div>
    </div> 
  </form>

<?php 


if($_POST['Submit']){
if( (empty($_POST['product_number'])) ){
      echo '<div class="updated"><p><strong>'. __( 'Wrong settings: Please enter the number of products you want to view.', 'bestproduct' ) .'</strong></p></div>';  
  }
else{


include('Control/best_product_Control.php');
$get_data =new PrintBestProductClass;
$get_data->PrintProduct("localhost","root","","test",$_POST['product_number']); 



echo '<div class="updated"><p><strong>'. __( 'Settings saved.', 'bestproduct' ) .'</strong></p></div>';

} 
}

?>




  </body>
</html>

