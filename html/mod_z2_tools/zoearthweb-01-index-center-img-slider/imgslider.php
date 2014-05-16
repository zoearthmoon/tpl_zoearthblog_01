<?php
defined('_JEXEC') or die;
?>
<div class="slider-wrap">
<?php foreach ($images as $img):?>
    <div class="slide" data-thumb="<?php echo $img;?>" style="background-image:url(<?php echo $img;?>)"></div>
<?php endforeach; ?>
<!-- <span class="promo-action"><a href="#" target="_blank"> </a></span> -->
</div>
<script type="text/javascript">
$(window).load(function() {
$('.flexslider').flexslider({
    selector: ".slider-wrap > .slide",
    animation: "slide",
    easing: "swing",
    direction: "horizontal",
    slideshow: true,
    slideshowSpeed: 7000,
    animationSpeed: 600,
    pauseOnHover: true,
    video: true,
    controlNav: "thumbnails",
    directionNav: true,
	start: function(){
$('.flexslider > ol').find('li:first').addClass('flex-active');
$('.flexslider > ol >li').find('img').removeClass('flex-active') ;
},
before: function(){
$('.flexslider > ol').find('li').removeClass('flex-active');
}, 
after: function(){
$('.flex-active').removeClass('flex-active').parent('li').addClass('flex-active');
}
});
            
});
</script>