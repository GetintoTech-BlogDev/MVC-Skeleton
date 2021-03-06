<!-- Display article title-->
<div class="page-header text-center">
    <h2><?php echo $article->title; ?></h2>
<small style="color:graytext"> <i>Posted on <?php echo $article->date; ?></i></small>
<br><br>
<div class="fb-like" data-href="http://localhost/MVC-Skeleton/index.php" data-width="20px" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<a data-pin-do="buttonBookmark" href="https://www.pinterest.com/pin/create/button/"></a>
</div>

<!-- Display image-->        
<?php
$file = 'views/images/' . $article->id. '.jpg';
if (file_exists($file)) {
    $img = "<img src='$file' width='100% heght= 30%' />";
    echo $img;
} 
?>
 <!-- Display content-->   
<p class="text-justify" style="margin-top: 30px; margin-bottom: 40px"><?php echo $article->content; ?></p>

<!--  Display map if exists -->
<div id="map"></div> 

<!-- Display comments-->
<p class="page-header"></p>

<?php foreach ($comments as $commentObj) { ?>
<div class="media">
    <div class="media-body">
        <h6 class="media-heading"><?php echo $commentObj->subscriber; ?><br> <small><i>Posted on <?php echo $commentObj->date; ?></i></small></h6>
        <p ><small><?php echo $commentObj->comment; ?></small></p>
    </div>
    </div>   

<?php } ?>
 
<!-- Form for comments-->
<form action="" method="POST"  enctype="multipart/form-data" style="margin-top: 5%">
   
    <div class="form-group row">
       <div class="col-xs-12">
       <label >Leave your comment:</label>
       <textarea style="width: 50%" class="form-control well well-md"  name="comment" required></textarea>
       </div>
   </div>  
    
    <div class="form-group row">
        <div class="col-sm-4 col-xs-6">
        <label>Name</label>
        <input class="form-control" type="text" name="name" required > 
        </div>
    </div>
        <div class="form-group row">
            <div class="col-xs-6 col-sm-4">
            <label>Email</label>
            <input class="form-control" type="email" name="email" required>
            </div>            
        </div>

  <p>
      <button class="btn btn-primary"  type="submit">Submit</button>
  </p>
</form>  

    
    


<?php 
// Map. setting variables for coordinates to be used/echoed in JS
$lat = $map->latitude; 
$lng = $map->longitude;  
?>    
<script>
    function initMap() {
        var myCenter = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);
        var mapCanvas = document.getElementById("map");
        var mapOptions = {center: myCenter, zoom: 15};
        if (<?php echo $lat; ?> && <?php echo $lng; ?> ){
            var map = new google.maps.Map(mapCanvas, mapOptions);
            mapCanvas.style.height = '200px'; //element's height
            mapCanvas.style.width = '500px'; //element's width
            var marker = new google.maps.Marker({position: myCenter});
            marker.setMap(map);
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIUIVIME9OM1AlDAcjQFbD_bfq4usMdQM&callback=initMap"></script>

<!--Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Pin interest-->
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>