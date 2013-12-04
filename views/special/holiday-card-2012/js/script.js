var t, c, i, snowflakes, is_breaks;

var typeWrite = function() {

	$(t).append( c[i] );
	if (i < c.length) {
		i++;

		if (c[i] === '_') {
			$(t).transition({ y: '-=24' }, 80);
			i++;
		}

		setTimeout(typeWrite, Math.random(1, 10) * 80);
	} else {
		if (is_breaks) {
			t.html( t.html() + "<span class='blink'>_</span>");
		} else {
			t.append($("<span class='blink'>_</span>"));
		}

		setInterval(function() { $('.blink').toggle(); }, 500 );

		if (Modernizr.touch){
   		
   			$('body').one("touchstart", function(e){		
   				$('#printout').animate({ marginTop: '0', height: '100%', easing: 'linear' }, 2000, 
   					function() {
   						// only show the printout on touch devices. No going back.

						// $('body').one("touchstart", function(e){
						// 	$('#printout').animate({ top: '100%', height: '0%' });
						// });
					});	
   			});
	   		
		} else {

			// if touch events NOT present

			$('body').bind("keypress", function(e){
				var code = (e.keyCode ? e.keyCode : e.which);
				if(code == 13) {
					$('#printout').animate({
						marginTop: '0',
						height: '100%', 
						imeasing: 'linear'
					}, 2000, function() {
						$('body').one("keypress", function(e){
							$('#printout').animate({
								marginTop: '100%',
								height: '0',
								easing: 'linear'
							});
						});
					});	
				}	
			});

		}
	}
}


function Snowflakes(_pageContainer,_snowflakesContainer) {
	this.snowID			= 1;
	this.sizes			= new Array('', 'snowflakeSizeSM', 'snowflakeSizeMED', 'snowflakeSizeLRG');
	this.speeds			= new Array('', 'snowflakeSpeedSlow', 'snowflakeSpeedMed', 'snowflakeSpeedFast');
	this.opacities 		= new Array('', 'snowflakeOpacityFaint', 'snowflakeOpacityLight', 'snowflakeOpacityDark');
	this.delays			= new Array('', 'snowflakeDelay1', 'snowflakeDelay2', 'snowflakeDelay3', 'snowflakeDelay4', 'snowflakeDelay5', 'snowflakeDelay6');
	this.pageContainer	= document.getElementById(_pageContainer);
	this.snowflakesContainer = document.getElementById(_snowflakesContainer);
}

Snowflakes.prototype.randomFromTo = function(from,to) {
	return Math.floor(Math.random() * (to - from + 1) + from);
};

Snowflakes.prototype.findKeyframeAnimation = function(a) {
	var ss = document.styleSheets;
    for (var i = ss.length - 1; i >= 0; i--) {
        try {
            var s = ss[i],
                rs = s.cssRules ? s.cssRules : 
                     s.rules ? s.rules : 
                     [];

            for (var j = rs.length - 1; j >= 0; j--) {
                if ((rs[j].type === window.CSSRule.WEBKIT_KEYFRAMES_RULE || rs[j].type === window.CSSRule.MOZ_KEYFRAMES_RULE) && rs[j].name == a){
                    return rs[j];
                }
            }
        }
        catch(e) { }
    }
    return null;
};

Snowflakes.prototype.updateKeyframeHeight = function() {
	if (keyframes = this.findKeyframeAnimation("falling")) {
		var height		= this.pageContainer.offsetHeight;
		if ((window.innerHeight) > height) {
			height 		= window.innerHeight;
		}
		if (keyframes.cssText.match(new RegExp('webkit'))) {
			var newRule = "100% { -webkit-transform: translate3d(0,"+height+"px,0) rotate(360deg); }";
		} else if (keyframes.cssText.match(new RegExp('moz'))) {
			var newRule = "-moz-transform: translate(0,"+height+"px) rotate(360deg);";
		}
		keyframes.insertRule(newRule);
	}
}

Snowflakes.prototype.create = Snowflakes.prototype.moreSnow = function(snowflakeCount) {
	var i 				= 0;
	this.updateKeyframeHeight();
	while (i < snowflakeCount) {
		var snowflake	= document.createElement('i');
		var size 		= this.sizes[this.randomFromTo(0, this.sizes.length-1)];
		var speed		= this.speeds[this.randomFromTo(0, this.speeds.length-1)];
		var opacity 	= this.opacities[this.randomFromTo(0, this.opacities.length-1)];
		var delay		= this.delays[this.randomFromTo(0, this.delays.length-1)];
		snowflake.setAttribute('id', 'snowId'+this.snowID);
		snowflake.setAttribute('class', 'snowflake '+size+' '+speed+' '+opacity+' '+delay);
		snowflake.setAttribute('style','left: '+this.randomFromTo(0, 100)+'%;');
		this.snowflakesContainer.appendChild(snowflake);
		i++;
		this.snowID++;
	}
};

Snowflakes.prototype.lessSnow = function(snowflakeCount) {
	if (this.snowflakesContainer.childNodes.length > snowflakeCount) {
		var snowRemoveCount = 0;
		while (snowRemoveCount < snowflakeCount) {
			this.snowflakesContainer.removeChild(this.snowflakesContainer.lastChild);
			snowRemoveCount++;
		}
	}
}

$(function() {

	if (Modernizr.touch){
   		$('.can_touch').text('TOUCH SCREEN');
	}

	t = $('#code');

	var tmp = t.text();

	// if we don't find any line breaks, we're using some IE8-level shit
	if( tmp.indexOf('\r') < 0 && tmp.indexOf('\n') < 0 && tmp.indexOf('\r\n') < 0 ) {
		if_breaks = false;
		c = $('#ie_code').val();
	} else {
		c = t.text();
		is_breaks = true;
	}

	t.text('');

	i = 0;

	setTimeout(typeWrite, 10);

	if(Modernizr.cssanimations) {
		snowflakes = new Snowflakes('snowflakesInfoContainer','snowflakesContainer');
		snowflakes.create(120);
	} else {
		$('#snowflakesContainer').css('background', 'url(/img/shitty-snowflake-anim.gif)')
	}

});