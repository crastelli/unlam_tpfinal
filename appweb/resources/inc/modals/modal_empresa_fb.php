<!-- <div class="fb-comments" data-href="http://milugar.esy.es/#<?php echo $_GET['id'];?>" data-colorscheme="light" data-numposts="3" data-width="400"></div> -->
<div class="fb-comments" data-href="<?php echo BASE_URL._DIR_INC_; ?>#?<?php echo $_GET['id'];?>" data-colorscheme="light" data-numposts="3" data-width="400"></div>

<script>
window.fbAsyncInit = function() {
FB.init({
  appId      : '1027003033991093',
  xfbml      : true,
  version    : 'v2.4'
});
};

(function(d, s, id){
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) {return;}
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/en_US/sdk.js#status=0";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>