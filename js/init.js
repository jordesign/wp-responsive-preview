(function(w){
	var sw = document.body.clientWidth,
		sh = document.body.clientHeight - 30,
		$sgViewport = $('#viewport'),
		$urlToggle = $('#url-toggle'),
		$sizeToggle = $('#size-toggle'),
		$tSize = $('#size'),
		$sizeS = $('#size-s'),
		$sizeM = $('#size-m'),
		$sizeL = $('#size-l'),
		$sizeXL = $('#size-xl'),
		$sizeR = $('#size-random'),
		$vp,
		$sgPattern;
	
	$(w).resize(function(){ //Update dimensions on resize
		sw = document.body.clientWidth;
		sh = document.body.clientHeight;
	});
	
	//Size View Events
	$sizeS.on("click", function(e){
		e.preventDefault();
		sizeiframe(getRandom(240,500));
	});
	$sizeM.on("click", function(e){
		e.preventDefault();
		sizeiframe(getRandom(500,800));
	});
	$sizeL.on("click", function(e){
		e.preventDefault();
		sizeiframe(getRandom(800,1200));
	});
	$sizeXL.on("click", function(e){
		e.preventDefault();
		sizeiframe(getRandom(1200,1920));
	});
	$sizeR.on("click", function(e){
		e.preventDefault();
		sizeiframe(getRandom(240,sw));
	});
	
	$sgViewport.load(function (){
		$vp = $sgViewport.contents();
		$sgPattern = $vp.find('.pattern');
	});
	
	function sizeiframe(size) {
		$('#viewport').width(size);
	}
	
	/* Returns a random number between min and max */
	function getRandom (min, max) {
	    return Math.random() * (max - min) + min;
	}
$(document).ready(function() {
    sizeiframe(getRandom(240,sw));
});
})(this);

