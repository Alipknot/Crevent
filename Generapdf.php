<?php
include 'header.php';
if($comp===1){
if($per===2 ||  $per===1){
 ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-block btn-lg btn-primary" href="Generarpdf.php" target="_blank">Generar pdf<i class="fa fa-fw fa-print "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
<?php
}else{
  header("location: index.php");
  die();

}
}else{
  header("location: index.php");
  die();

}

 ?>
