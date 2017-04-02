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
			var menutop = cumulativeOffset(menumain)['top'];
			
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