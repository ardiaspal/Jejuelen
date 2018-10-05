function openNav() {
	document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
}

$(document).ready(function() {
	// console.log('masuk wes');
	$('#select-satuan').on('click',function(){
		var harga = $(this).find(':selected').attr('data-id');
		// console.log('msuk');
		// console.log(harga);
		$('.harga_kg').val(harga);

	});
});

// $(window).load(function() {
// 	$('#load-loading').hide();
// });

// $(window).load(function() {
// 	// $("#load-loading").fadeOut("slow");;
// 	console.log(3);
// });

$(function(){

	var menu = $('.heading-website'),
	pos = menu.offset();

	$(window).scroll(function(){
		if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('heading-website')){
			$('.grup-all-nav').addClass('navbar-fixed-top').fadeIn('slow');
			$('.grup-sendiri').addClass('navbar-fixed-top').fadeIn('slow');
			
			// mobile
			$('.penyelamtan-mobile').css({
				backgroundColor: 'rgb(42, 74, 91)',
				position: 'relative',
				display: 'block',
				width: '100%'
			}).fadeIn('slow');			
			$('.logo-jejuelen').css({
				display: 'inline-block',
				margin: '14px 17px',
				paddingBottom: '6px',
				position: 'initial',
			}).fadeIn('slow');			
			$('.humberger').css({
				display: 'inline-block',
				position: 'initial',
				right: '0',
				margin: '4px 17px',
				float: 'right'
			}).fadeIn('slow');
			
			// desktop
			$('.penyelamat').css({
				backgroundColor: '#2a4a5b',
				position: 'relative',
				display: 'inline-block',
				width: '100%'
			}).fadeIn('slow');
			$('.logo-jejuelen').css({
				display: 'inline-block',
				margin: '14px 17px'
			}).fadeIn('slow');
			$('.navigasi-nav').css({
				display: 'inline-block',
				float: 'right',
				position: 'inherit',
				right: '0'
			}).fadeIn('slow');		
			$('.navigasi-nav nav>ul').css({
				marginBottom: '0'
			}).fadeIn('slow');	
			('#regis-log').css({
				marginTop: '6px'
			}).fadeIn('slow');		
			$('.navigasi-nav nav>ul>li').css({
				marginTop: '0'
			}).fadeIn('slow');



		} else if($(this).scrollTop() <= pos.top && menu.hasClass('heading-website')){
			$('.grup-all-nav').removeClass('navbar-fixed-top').fadeIn('slow');
			$('.grup-sendiri').removeClass('navbar-fixed-top').fadeIn('slow');
			
			// mobile
			$('.penyelamtan-mobile').css({
				backgroundColor: 'rgba(42, 74, 91, 0)',
				position: 'absolute',
				display: 'block',
				width: '100%'
			}).fadeIn('slow');			
			$('.logo-jejuelen').css({
				display: 'inline-block',
				margin: '20px 17px',
				paddingBottom: '0',
				position: 'absolute',
			}).fadeIn('slow');			
			$('.humberger').css({
				display: 'inline-block',
				position: 'absolute',
				right: '0',
				margin: '12px 17px',
				float: 'right'
			}).fadeIn('slow');

			// desktop
			$('.penyelamat').css({
				backgroundColor: 'rgba(0, 128, 0, 0)',
				position: 'initial',
				display: 'block',
				width: '100%'
			}).fadeIn('slow');
			$('.logo-jejuelen').css({
				display: 'inline-block',
				margin: '20px 17px'
			}).fadeIn('slow');
			$('.navigasi-nav').css({
				display: 'inline-block',
				float: 'initial',
				position: 'absolute',
				right: '0'
			}).fadeIn('slow');		
			$('.navigasi-nav nav>ul').css({
				marginBottom: '11px'
			}).fadeIn('slow');			
			$('.navigasi-nav nav>ul>li').css({
				marginTop: '12px'
			}).fadeIn('slow');
			('#regis-log').css({
				marginTop: '12px'
			}).fadeIn('slow');		

		}
	});

});


if (window.innerWidth <= 654) {
	$('#just-buy').click(function () {
		$('#left-regis').css({
			bottom: '0',
			zIndex: '1'
		});
		$('.relatif-img i').css({
			display:'block',
			zIndex: '1'
		});
		$('.form-isi-buy').css({
			height: '100%',
			overflow: 'initial'
		}).fadeIn('slow');
	});

	$('.relatif-img i').click(function () {
		$('#left-regis').css({
			bottom: '67%',
			zIndex: '0'
		});
		$('.relatif-img i').css({
			display:'none'
		});
		$('.form-isi-buy').css({
			height: '0',
			overflow: 'hidden'
		}).fadeOut('slow');
	});

	$('#Petani').click(function () {
		$('#center-regis').css({
			top: '0',
			zIndex: '1',
			bottom:'0'
		});
		$('.relatif-img-petani i').css({
			display:'block',
			zIndex: '1'
		});
		$('.form-isi-farmer').css({
			height: '100%',
			overflow: 'initial'
		}).fadeIn('slow');
	});

	$('.relatif-img-petani i').click(function () {
		$('#center-regis').css({
			top: '33%',
			zIndex: '0',
			bottom:'33%'
		});
		$('.relatif-img-petani i').css({
			display:'none'
		});
		$('.form-isi-farmer').css({
			height: '0',
			overflow: 'hidden'
		}).fadeOut('slow');
	});


	$('#mitra-js').click(function () {
		$('#right-regis').css({
			top: '0',
			zIndex: '1'
		});
		$('#right-side i').css({
			display:'block',
			zIndex: '1'
		});
		$('.form-isi-buy-right').css({
			height: '100%',
			overflow: 'initial'
		}).fadeIn('slow');
	});

	$('#right-side i').click(function () {
		$('#right-regis').css({
			top: '66%',
			zIndex: '0'
		});
		$('#right-side i').css({
			display:'none'
		});
		$('.form-isi-buy-right').css({
			height: '0',
			overflow: 'hidden'
		}).fadeOut('slow');
	});
}else{
	$('#just-buy').click(function () {
		$('#left-regis').css({
			width: '100%',
			zIndex: '1'
		});
		$('.relatif-img i').css({
			display:'block'
		});
		$('.form-isi-buy').css({
			height: '100%',
			overflow: 'initial'
		}).fadeIn('slow');
	});

	$('.relatif-img i').click(function () {
		$('#left-regis').css({
			width: '33%',
			zIndex: '0'
		});
		$('.relatif-img i').css({
			display:'none'
		});
		$('.form-isi-buy').css({
			height: '0',
			overflow: 'hidden'
		}).fadeOut('slow');
	});

	$('#Petani').click(function () {
		$('#center-regis').css({
			width: '100%',
			zIndex: '1',
			left:'0'
		});
		$('.relatif-img-petani i').css({
			display:'block'
		});
		$('.form-isi-farmer').css({
			height: '100%',
			overflow: 'initial'
		}).fadeIn('slow');
	});

	$('.relatif-img-petani i').click(function () {
		$('#center-regis').css({
			width: '34%',
			zIndex: '0',
			left:'33%'
		});
		$('.relatif-img-petani i').css({
			display:'none'
		});
		$('.form-isi-farmer').css({
			height: '0',
			overflow: 'hidden'
		}).fadeOut('slow');
	});


	$('#mitra-js').click(function () {
		$('#right-regis').css({
			width: '100%',
			zIndex: '1'
		});
		$('#right-side i').css({
			display:'block',
			zIndex: '1',
		});
		$('.form-isi-buy-right').css({
			height: '100%',
			overflow: 'initial'
		}).fadeIn('slow');
	});

	$('#right-side i').click(function () {
		$('#right-regis').css({
			width: '33%',
			zIndex: '0'
		});
		$('#right-side i').css({
			display:'none'
		});
		$('.form-isi-buy-right').css({
			height: '0',
			overflow: 'hidden'
		}).fadeOut('slow');
	});
}