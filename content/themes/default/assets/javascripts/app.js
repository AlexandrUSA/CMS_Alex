window.onload = function () {
	(function menu_module () {
		let menu = document.getElementById('hamburger'),
			menu_itms = document.querySelectorAll('.menu-item'),
			menu_is_open = false,
			anim_enter = [
				{
					transform: 'translateX(-60px) translateY(-10px)',
					color: '#000',
					opacity: 0
				},
				{
					transform: 'translateX(0) translateY(0px)',
					color: '#fff',
					opacity: 1
				}
			],
			anim_leave = anim_enter.slice().reverse();
		anim_timing = {
			duration: 300,
			iterations: 1,
			fill: "forwards"
		};
		menu.addEventListener('click', function () {
			this.classList.toggle('is-active');
			if (menu_is_open) {
				menu_animate(anim_leave);
			} else {
				menu_animate(anim_enter);
			}
			menu_is_open = !menu_is_open;
		})
		function menu_animate(mode) {
			let time = 0;
			menu_itms.forEach(element => {
				setTimeout(() => {
					menu_animFrames(element, mode);
				}, time += 50)
			});
		}
		function menu_animFrames(elem, mode) {
			if (menu_is_open) {
				elem.style.display = 'block';
			} else {
				setTimeout(() => elem.style.display = 'none', 10 * menu_itms.length);
			}
			elem.animate(mode, anim_timing);
		}
	})();
	
	// (function signIn_module(){
	// 	let button = document.getElementById('sign-in'),
	// 			popup  = document.getElementById('popup');
	// 	button.addEventListener('click', function( e ) {
	// 		e.preventDefault();
	// 		popup.style.display = 'block';
	// 	})
	// 	popup.addEventListener('click', function( e ) {
	// 		if( e.target.classList.contains('popup') ) {
	// 			this.style.display = 'none';
	// 		}
	// 	})
	}
