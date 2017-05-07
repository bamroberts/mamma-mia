var cumulativeOffset = function(element) {
				var top = 0, left = 0;
				do {
					top += element.offsetTop  || 0;
					left += element.offsetLeft || 0;
					element = element.offsetParent;
				} while(element);

				return {
					top: top,
					left: left
				};
			};
			
			var left = document.getElementsByClassName('curtain')[0];
			var right = document.getElementsByClassName('curtain')[1];
			var menu = document.getElementsByClassName('ribbon')[0];
			var menumain = document.getElementsByClassName('ribbon-main')[0];
			var menutop = cumulativeOffset(menu)['top'];
			
			
			
			var start = 0;
			window.addEventListener('scroll', function() {
				var scrollTop = (window.pageYOffset || window.scrollTop);
				var scrollAmount = scrollTop/5
				
				left.style.left = (start + (scrollAmount*-1)) + 'px';
				right.style.right = (start + (scrollAmount*-1)) + 'px';
				if(scrollTop >= menutop ) {
					if(!menu.classList.contains('fixed')) {
						menu.classList.add("fixed");
					}
				} else if(menu.classList.contains('fixed')) {
					menu.classList.remove("fixed");
				}
								
			});
			
			$('[data-toggle="tooltip"]').tooltip();
			
			// ===== Scroll to Top ==== 
			var top = document.getElementById('return-to-top');
			window.addEventListener('scroll', function() {
				var top = document.getElementById('return-to-top');

				if (document.body.scrollTop >= menutop) {        // If page is scrolled more than 50px
					if(!top.classList.contains('show')) {
						top.classList.add("show");
					}    
				} else {
					top.classList.remove("show");
				}
			});
			
			function scrollTo(element, to, duration) {
				if (duration <= 0) return;
				var difference = to - element.scrollTop;
				var perTick = difference / duration * 10;

				setTimeout(function() {
					element.scrollTop = element.scrollTop + perTick;
					if (element.scrollTop === to) return;
					scrollTo(element, to, duration - 10);
				}, 10);
			}
			
			jQuery('#return-to-top').on('click', function() {
				scrollTo(document.body, 0, 600);
			});
			
			
			// Create a new style tag
			var style = document.createElement("style");

			// Append the style tag to head
			document.head.appendChild(style);

			// Grab the stylesheet object
			var sheet = style.sheet;

			function addMenuWidth() {
				$li = jQuery('.sub-menu li').first();
				if($li) {
					width = $li.width();
					extra = width - 170;
					deg = 16 - extra/14;
					sheet.addRule('.sub-menu li:before','transform: skewY(-' + deg + 'deg); ');
				}
			}
			addMenuWidth();

			window.onresize = function(event) {
				menutop = cumulativeOffset(menu)['top'];
				addMenuWidth();
			};
			
/*
GreedyNav.js - http://lukejacksonn.com/actuate
Licensed under the MIT license - http://opensource.org/licenses/MIT
Copyright (c) 2015 Luke Jackson
*/

jQuery(document).ready(function($){

  var $btn = $('nav.greedy .greedy-trigger');
  var $vlinks = $('nav.greedy .links');
  var $hlinks = $('nav.greedy .hidden-links');

  var availableSpace, numOfVisibleItems, requiredSpace, timer, closingTime = 1000;

	// Get initial state
	// $vlinks.children().outerWidth(function(i, w) {
	//   console.log(i);
	//   console.log(w);
	//   totalSpace += w;
	//   numOfItems += 1;
	//   breakWidths.push(totalSpace);
	// });
	// rewrite the above to work with jQuery 1.7

	var numOfItems = 0;
	var totalSpace = 0;
	var breakWidths = [];
	var is_initialised = false;


	function buildWidths() {

		if (is_initialised || !$vlinks.is(':visible')) {
		 return;
		}

		$vlinks.children().each(function(){
			totalSpace += $(this).outerWidth();
			numOfItems += 1;
			breakWidths.push(totalSpace);
		});

		is_initialised = true;
   }

  function check() {

	  if (!is_initialised) {
	    return;
     }

	 

    // Get instant state
    availableSpace = $vlinks.width() - ($btn.width() + 155);
	console.log(availableSpace);
    numOfVisibleItems = $vlinks.children().length;
    requiredSpace = breakWidths[numOfVisibleItems - 1];

    // There is not enough space
    if (requiredSpace > availableSpace) {
      $vlinks.children().last().prependTo($hlinks);
      numOfVisibleItems -= 1;
      check();
      // There is more than enough space
    } else if (availableSpace > breakWidths[numOfVisibleItems]) {
      $hlinks.children().first().appendTo($vlinks);
      numOfVisibleItems += 1;
      check();
    }
    // Update the button accordingly
    $btn.attr("count", numOfItems - numOfVisibleItems);
    if (numOfVisibleItems === numOfItems) {
		$btn.addClass('hidden');
    } else {
		$btn.removeClass('hidden');
		if($hlinks.find('li.active').length) {
			$btn.addClass('active');
		} else {
			$btn.removeClass('active');
		}
	}
  }

  // check();

  // Window listeners
  $(window).resize(function() {
	 buildWidths();
     check();
  });

  $btn.on('click', function() {
	$vlinks.toggleClass('fade');
	$btn.toggleClass('open');
    $hlinks.toggleClass('hidden');
    clearTimeout(timer);
  });

  $hlinks.on('mouseleave', function() {
    // Mouse has left, start the timer
    timer = setTimeout(function() {
      $hlinks.addClass('hidden');
	  $btn.toggleClass('open');
	  $vlinks.toggleClass('fade');
    }, closingTime);
  }).on('mouseenter', function() {
    // Mouse is back, cancel the timer
    clearTimeout(timer);
  })

	buildWidths();
	check();

});