<?php
/*-------------------------------------------*/
/*  Add vkExUnit js
/*-------------------------------------------*/
add_action( 'wp_head', 'veu_add_smooth_js' );
function veu_add_smooth_js() {
?>
<script type="text/javascript">
;(function(w,d){
w.addEventListener('load',function(){
var go=function(e){
	var h=e.toElement.getAttribute('href');
	var x,s=d.getElementById(h.slice(1));
	x=s==null?0:s.getBoundingClientRect().top;
	w.scrollTo({
		top:x-w.pageYOffset,
		behavior:'smooth'
	})
	console.log(e);
	e.preventDefault();
}
Array.prototype.forEach.call(d.getElementsByTagName('a'),function(a){
	var h=a.getAttribute('href');if(h&&h.indexOf('#')==0){a.addEventListener('click',go,{passive: false})};
});
},false);
})(window,document);
</script>
<?php
}
