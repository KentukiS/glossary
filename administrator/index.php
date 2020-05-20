<?php
session_start();
if(!isset($_SESSION["session_username"])): header("location: login"); else:
?>
	
<?php include($_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"); ?>
<div id="welcome">
  <div class = "adminTitle">
    <h2>Hello, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
    <h2> Your Glossary </h2>
  </div>

<?php 
echo "<div class ='parentBlock'>";
?>

<div class ='buy_new'>
  <h2>Buy a professional account!!!</h2>
  <form method="POST" action="">
    <input type="submit" name="buyNewAcc" value="BUY NOW">
  </form>
    <?php 
      if (isset($_POST["buyNewAcc"])  ){
            $buyNow = $mysqli->query("UPDATE usertbl SET permission = '1' WHERE username = '".$_SESSION['session_username']."'  ");
            if ($buyNow == true){
                echo "<script>alert('You bought a professional account! Now you can edit the general glossary!');
                </script>";
                }else{
                    echo "Information wasn't send";
             }
      }

    ?>
</div>

<?php
$result = $mysqli->query("SELECT * FROM `translates` WHERE `admin` = '".$_SESSION['session_username']."' ");
	    // $result = mysqli_fetch_array($result);

  	$fNameId = 1;
  	$sNameId = 100;
   	$fName = 1000;
   	$sName = 10000;
   	$butName = 300;

    foreach($result as $key){ 
       

       	$fNameId++;
       	$sNameId++;
       	$fName++;
       	$sName++;
       	$butName++;

       	echo "<div class = 'translateBlock'>";

       	   echo "<div style='display:none'>". $key['translate_id'] . "</div>";

           echo "<br>Term</br>";
       	   echo "<form method='POST' id='formRefresh' action=''>";

       	   echo "<pre class = 'preClass'><p class = 'text'>Original term name</p>";
           echo "<textarea name='"."a".$fNameId."'>" . $key['name_original'] . "</textarea>";
           echo "</pre>";

           echo "<pre class = 'preClass'><p class = 'text'>Original term description</p>";
           echo "<textarea name='"."b".$sNameId."'>" . $key['desc_original'] . "</textarea>";
           echo "</pre>";

           echo "<br>Translation</br>";

           echo "<pre class = 'preClass'><p class = 'text'>translation of the term</p>";
           echo "<textarea name='"."c".$sName."'>" . $key['name_translate'] . "</textarea>";
           echo "</pre>";

           echo "<pre class = 'preClass'><p class = 'text'>translation of the term description</p>";
           echo "<textarea name='"."d".$fName."'>" . $key['desc_translate'] . "</textarea>";
           echo "</pre>";

           echo "<input type='submit' name='"."submit".$butName."' value='update translate'/> <br>";
           echo "</form>";

           echo "<pre></pre>";
       	echo "</div>";
    }
echo "</div'>";
     if (isset($_POST["submit".$butName.""])  ){
    $pressFtoPayRespect = $_POST["submit".$butName.""];
    $t1 = $_POST["a".$fNameId.""];
    $t2 = $_POST["b".$sNameId.""];
    $t3 = $_POST["c".$sName.""];
    $t4 = $_POST["d".$fName.""];
    

    $fBut = $mysqli->query("UPDATE `translates` SET `name_original` = '".$t1."', `name_translate` = '".$t2."', `desc_original` = '".$t3."', `desc_translate` = '".$t4."' WHERE `translate_id` = '".$key['translate_id']."' ");
    //$fBut = $mysqli->query("UPDATE `translates` SET `name_original` = '1' WHERE `translate_id` = '1' ");
    if ($fBut == true){
        echo "<script>alert('Info was send');
     document.location.href = 'http://glossary-master/administrator'
    </script>";
    }else{
        echo "Information wasn't send";
    }
   }
?> 
  
  
</div>
<pre></pre>
<div class = "adminTitle">
<h2> Create new translate </h2>
</div>
<div class="addClass">

  <form method="POST" action="">
    <pre class = 'preAddClass'><p class = 'text'>Original term name</p> <textarea  name="tabOne"></textarea></pre>
    <pre class = 'preAddClass'><p class = 'text'>Original term description</p> <textarea  name="tabTwo"></textarea></pre>
    <pre class = 'preAddClass'><p class = 'text'>translation of the term</p> <textarea  name="tabThree"></textarea></pre>
    <pre class = 'preAddClass'><p class = 'text'>translation of the term description</p> <textarea  name="tabFour"></textarea></pre>
    <input type="submit" value="Create" name="Add">
  </form>

</div>
<?php
if (isset($_POST['Add'])){

  $tab1 = $_POST['tabOne'];
  $tab2 = $_POST['tabTwo'];
  $tab3 = $_POST['tabThree'];
  $tab4 = $_POST['tabFour'];

  $createTranslate = $mysqli->query("INSERT INTO translates (admin,name_original,name_translate,desc_original,desc_translate) VALUES ('".$_SESSION['session_username']."' , '". $tab1."', '".$tab2."', '".$tab3."', '".$tab4."') ");

  if ($createTranslate == true){
        echo "<script>alert('Translate was created');
     document.location.href = 'http://glossary-master/administrator'
    </script>";
    }else{
        echo "Information wasn't send";
    }
}

?>

	<p><a href="logout.php">Log Out</a></p>
<?php include($_SERVER["DOCUMENT_ROOT"]. "/includes/footer.php"); ?>
	
<?php endif; ?>