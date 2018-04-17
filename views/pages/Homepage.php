
​<section class="main-slider" style="margin-top: 5px">
  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" >


    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>


    <!-- Carousel items -->
    <div class="carousel-inner">

      <!-- Slide 1 : Active -->
      <div class="item active">
        <img src="views/images/slideshow/London at Night.jpg" alt="" >
        <div class="carousel-caption">
          <p>London @Night</p>
        </div><!-- /.carousel-caption -->
      </div><!-- /Slide1 -->

      <!-- Slide 2 -->
      <div class="item ">
        <img src="views/images/slideshow/Tea Time.png" alt="">
        <div class="carousel-caption">
          <p>Tea Break</p>
        </div><!-- /.carousel-caption -->
      </div><!-- /Slide2 -->

      <!-- Slide 3 -->
      <div class="item ">
        <img src="views/images/slideshow/The Queen.jpg" alt="">
        <div class="carousel-caption">
          <p>The Queen</p>
        </div><!-- /.carousel-caption -->
      </div><!-- /Slide3 -->

      <!-- Slide 4 -->
      <div class="item ">
        <img src="views/images/slideshow/The Savoy Hotel.jpg" alt="">
        <div class="carousel-caption">
          <p>The Savoy Hotel</p>
        </div><!-- /.carousel-caption -->
      </div><!-- /Slide4 -->

    </div><!-- /.carousel-inner -->


    <!-- Controls -->
    <div class="control-box">
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="control-icon prev fa fa-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="control-icon next fa fa-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.control-box -->


  </div><!-- /#myCarousel -->
</section><!-- /.main-slider -->



<?php
//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 3;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
?>
<div class="row">
<?php
foreach ($articles as $article){
   $file = 'views/images/' . $article->id. '.jpg';
?>  
        <div class="col-md-<?php echo $bootstrapColWidth; ?>">
            <div class="card" style="margin-top: 10px;padding-left: 20px;padding-bottom: 10px">
                <img class="card-img-top" style="width: 250px;height:150px" src="<?php echo $file?>" alt="Card image cap">
                <div class="card-body">
                <h6><?php echo $article->date; ?></h6>
                <h5 class="card-title"><?php echo $article->title; ?></h5>
                <button class="btn">Read more</button>   
             </div>
            </div>
        </div>
<?php
    $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
}
?>
</div>
