jQuery(document).ready(function($){
	var m = $('.lightbox').find('.lightbox-inner[rel="#message"]');
	var poringmax = 2700;

	var forcelikeenable = false;
	var forcelike = null;
	var forcelikesec = 10;
	var forcelikeautoclose = true;
	/*
	 * Common
	 */
	$(window).load(function(){
		if(forcelikeenable){
			cls();
			$('.lightbox-inner').each(function(){
				$(this).attr('rel') == '#fblike' ? $(this).show() : $(this).hide();
			});
			window.location.hash = '#fblike';
			$('.lightbox').fadeIn(400);
			forcelike = setInterval(function(){
				b = $('.lightbox-inner[rel="#fblike"]').find('a[href="#"]');
				b.text('ปิด ('+forcelikesec+')');
				if(forcelikesec <= 0){
					b.text('ปิด').attr('rel','true');
					if(forcelikeautoclose){
						cls(true);
						window.location.hash = '#home';
					}
					clearInterval(forcelike);
				}
				forcelikesec--;
			},1000);
		}
	});

	$('.lightbox-close-fblike').click(function(){
		if($(this).attr('rel') != 'true')
			return false;
		cls(true);
		window.location.hash = '#home';
		return false;

	});

	$.ajax({
		url: 'https://nana-ro.com/core/ajax.php?module=account&action=islogin',
		dataType: 'jsonp',
		jsonp: 'callback',
		success: function(d){
			if(d != null)
				placeuserdata(d);
		},
		error: function(jqXHR,textStatus,errorThrown){
			errorlog(jqXHR,textStatus,errorThrown);
		}
	});

	$.ajax({
		url: 'https://nana-ro.com/core/ajax.php?module=init&action=status',
		dataType: 'jsonp',
		jsonp: 'callback',
		success: function(d){
			on = '<img src="images/online.png" style="display: inline-block; vertical-align: bottom;" />';
			off = '<img src="images/offline.png" style="display: inline-block; vertical-align: bottom;" />';
			if(d.Status == 'true')
				$('.status-server').empty().append(on);
			else
				$('.status-server').empty().append(off);
			$('.status-player').text(d.Player);
			$('.status-peak').text(d.Peak);

			if(d.Woe == 'true')
				$('.status-woe').empty().append(on);
			else
				$('.status-woe').empty().append(off);
			$('.status-account').text(d.Account);

			e = $('.branding-profile').find('.counter');
			if(parseInt(d.Player2[d.Player2.length - 1]) == 0 && d.Player2.length == 1){
				$('.branding-profile .foreground').css('background-image','url("images/poring-sleep.png")');
				$('.branding-profile .background').css('background-image','url("images/poring-sleep_.png")');
				r = 160;
			}else{
				r = ((parseInt(d.Player.replace(',','')) / poringmax ) * 160);
				for(var i = 0; i < d.Player2.length; i++)
					e.append('<img src="images/counter/'+d.Player2[i]+'.png" />');
			}
			$('.branding-profile .foreground').animate({
				height : r
			},3200);

		},
		error: function(jqXHR,textStatus,errorThrown){
			errorlog(jqXHR,textStatus,errorThrown);
		}
	});

	$.ajax({
		url: 'https://nana-ro.com/core/ajax.php?module=refill&action=reward',
		dataType: 'jsonp',
		jsonp: 'callback',
		success: function(d){
			e = $('#tmn-reward');
			for(var i = 0; i < d.length; i++)
				e.append('<tr><td>'+d[i].card_id+'</td><td>'+d[i].value_point+'</td></tr>');
		},
		error: function(jqXHR,textStatus,errorThrown){
			errorlog(jqXHR,textStatus,errorThrown);
		}
	});

	$.ajax({
		url: 'https://nana-ro.com/core/ajax.php?module=guild&action=castle',
		dataType: 'jsonp',
		jsonp: 'callback',
		success: function(d){
			e = $('.castle-list');
			for(var i = 0; i < d.length; i++){
				f = e.find('li[rel="'+i+'"]');
				if(parseInt(d[i].gid) != 0)
					f.find('.castle-flag').find('img').attr('src','https://nana-ro.com/core/ajax.php?module=guild&action=emblem&gid='+d[i].gid);
				g = f.find('.castle-name');
				g.find('h5').text(d[i].castleName);
				g.find('span').text(d[i].guildName);
			}
		},
		error: function(jqXHR,textStatus,errorThrown){
			errorlog(jqXHR,textStatus,errorThrown);
		}
	});

	$.ajax({
		type: 'GET',
		url: 'https://graph.facebook.com/147489058750708?fields=photos,count,name',
		dataType: 'json',
		success: function(d){
			$('.jp-gallery li').each(function(i){
				j = d.photos.data.length - i - 1;
				if(j >= 0)
					$(this).find('a').attr({
						'href': d.photos.data[j].images[0].source,
						'rel': 'fancybox'
					}).find('img').attr('src',d.photos.data[j].picture);
			});
		},
	});

	$('a[rel="fancybox"]').fancybox({
		prevEffect: 'none',
		nextEffect: 'none',
		closeBtn: false,
		helpers: {
			title: { type: 'inside' },
			buttons: { position: 'bottom' },
		}
	});

	$(':input').each(function(){
		var e = $(this).parent().find('.lightbox-hint');
		$(this).focus(function(){
			if(e.length)
				e.fadeIn(200);
		}).blur(function(){
			if(e.length)
				e.fadeOut(300);
		});
	});

	$('input[name="birthdate"]').datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		dayNames: [ "อาทิตย์", "จันทร์", "อังคาร", "พุทธ", "พฤหัสบดี", "ศุกร์", "เสาร์" ],
		dayNamesMin: [ "อา.", "จ.", "อ.", "พ.", "พฤ.", "ศ.", "ส." ],
		monthNames: [ "มกราคม", "กุมภาพันธุ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" ],
        monthNamesShort: [ "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค." ],
		minDate: new Date(1943, 1 - 1, 1),
		maxDate: new Date(),
		yearRange: '1943:2012',
	});

	var tmnreload = null;

	$('#reload-tmn').change(function(){
		if(this.checked) {
			tmnreload = setInterval(function(){
				if(window.location.hash == '#refill-history'){
					window.location.hash = '#home';
					cls();
					window.location.hash = '#refill-history';
				}else{
					clearInterval(tmnreload);
				}
			},30000);
		}else{
			clearInterval(tmnreload);
		}
	});

	$('.lightbox-inner[rel="#radio"]').draggable({
		handle: 'h2',
	});

	$('.jp-hashidden').hover(function(){
		$(this).find('.jp-hidden').stop().fadeIn(400);
	},function(){
		$(this).find('.jp-hidden').stop().fadeOut();
	});

	$('.jp-hashidden-click').click(function(){
		if($(this).hasClass('more') && is_login() == false)
			return false;
		cls(true);
		var e = $(this).find('.jp-hidden');
		if(e.css('display') == 'none')
			e.stop().fadeIn(400);
		else
			e.stop().fadeOut(500);
	});

	$('.jp-hashidden-click').find('.jp-hidden').click(function(e){
		e.stopPropagation();
	});

	$('.jp-haspopup').hover(function(){
		$(this).children('.jp-popup').stop().fadeIn(400);
	},function(){
		$(this).children('.jp-popup').stop().fadeOut(400);
	});

	$('.lightbox-close, .jp-hidden-close').click(function(){
		cls(true);
		window.location.hash = '#home';
		return false;
	});
/*
	$('.lightbox-close-radio').click(function(){
		cls(true);
		$('.lightbox-inner[rel="#radio"]').find('.lightbox-content').empty().append('<embed src="http://www.alllowband.com/radio/jwplayer/player.swf" width="180" height="18" align="middle" allowscriptaccess="always" flashvars="file=http://202.170.126.99:8000/;stream.nsv&amp;type=mp3&amp;stretch=none&amp;autostart=false&amp;displayclick=none&amp;bgcolor=#000000&amp;frontcolor=#000000&amp;backcolor=#ffffff&amp;lightcolor=#000000&amp;screencolor=#000000&amp;volume=35" quality="high"></embed>');
		return false;
	});
*/
	$('.jp-form').submit(function(){
		var f = $(this);
		var s = f.find(':input:visible');
		if(f.attr('action') == '')
			return false;
		$.ajax({
			url: f.attr('action'),
			type: 'POST',
			data: s.serialize(),
			dataType: 'jsonp',
			jsonp: 'callback',
			success: function(d){
				switch(d.status){
					case 'error':
						var e = f.find('.jp-handle').children('ul');
						e.empty();
						for(var i = 0; i < d.error.length; i++)
							e.append('<li>'+d.error[i]+'</li>');
						e.parent().show();
						break;
					case 'success':
						var e = f.find('.jp-handle').children('ul');
						e.empty();
						e.parent().hide();
						showmsg(m,d.title,d.message);
						if(f.hasClass('jp-login'))
							placeuserdata(d);
						h = window.location.hash;
						if(h == '#refill'){
							setTimeout(function(){
								window.location.hash = '#refill-history';
							},2000)
						}
						if(h == '#login-refill')
							window.location.hash = '#refill';
						reset(f);
						break;
				}
				if(f.parent().attr('rel') == '#register-accepted')
					$('#captcha').attr('src', 'https://nana-ro.com/core/ajax.php?module=account&action=captcha&refresh='+rand(0,256));
			},
			error: function(jqXHR,textStatus,errorThrown){
				errorlog(jqXHR,textStatus,errorThrown);
			}
		});
		return false;
	});

	$('a').click(function(){
		l = $(this).attr('href');
		h = window.location.hash;
		if(l == '#' || h == '#fblike')
			return false;
		if(l == '#captcha'){
			$('#captcha').attr('src', 'https://nana-ro.com/core/ajax.php?module=account&action=captcha&refresh='+rand(0,256));
			return false;
		}
		return;
	});

	setTimeout(function(){ switchlink(window.location.hash) },1000);

	$(window).bind('hashchange',function() {
		h = window.location.hash;
		if(h == '#' || h == '#home')
			return false;
		switchlink(h);
	});

	$('#register-accepted').click(function(){
		$(this).hide();
	});

	/*
	 * Megaphone
	 */
	$.ajax({
		url: 'https://nana-ro.com/core/ajax.php?module=init&action=megaphone',
		dataType: 'jsonp',
		jsonp: 'callback',
		success: function(d){
			var m = $('.megaphone').find('.wrapper');
			m.empty();
			for(var i = 0; i < d.length; i++)
				m.append(d[i]);
		},
		error: function(jqXHR,textStatus,errorThrown){
			errorlog(jqXHR,textStatus,errorThrown);
		}
	});

	/*
	 * Meta
	 */
	$('.branding-meta-item .wrapper').hover(function(){
		$(this).stop().animate({
			borderColor: '#97A4C2'
		});
	},function(){
		$(this).stop().animate({
			borderColor: '#E5E7EB'
		});
	});

	/*
	 * Sidebar
	 */
	$('.mainmenu a').hover(function(){
		if(!$(this).hasClass('noanimate'))
			$(this).stop().animate({
				backgroundColor : '#3B5998',
				color : '#FFFFFF'
			},300);
	},function(){
		if(!$(this).hasClass('noanimate'))
			$(this).stop().animate({
				backgroundColor : 'transparent',
				color : '#333333'
			},300);
	});

	/*
	 * Cover
	 */
	$.coverslidercount = 0;
	$.coverslidercurrent = 0;

	$('.cover-slider li').each(function(i){
		$(this).attr('data',$.coverslidercount);
		$('.cover-control').append('<li'+(i == 0 ? ' class="selected"' : '')+' data="'+$.coverslidercount+'"></li>');
		$.coverslidercount++;
	});

	$('.cover-control li').click(function(){
		$('.cover-slider li[data='+$.coverslidercurrent+']').fadeOut(2400);
		$.coverslidercurrent = $(this).attr('data');
		$('.cover-slider li[data='+$.coverslidercurrent+']').fadeIn(2400);
		$('.cover-control li').removeClass('selected');
		$(this).addClass('selected');
	});

	/*
	 * Article - Job
	 */
	$('.job-control .left').mousedown(function(){
		$('.job-list').animate({
			left : 0
		},'slow');
	}).mouseup(function(){
		$('.job-list').stop();
	});

	$('.job-control .right').mousedown(function(){
		$('.job-list').animate({
			left : -($('.job-list').width() - $('.job-list').parent().width())
		},'slow');
	}).mouseup(function(){
		$('.job-list').stop();
	});

	$('.job-list').draggable({
		axis: 'x',
		stop: function(){
			if(parseInt($(this).css('left')) > 0)
				$(this).animate({
					left: 0
				})
			else if(Math.abs(parseInt($(this).css('left'))) > $(this).width() - $(this).parent().width())
				$(this).animate({
					left: -($(this).width() - $(this).parent().width())
				})
		}
	});

	$('.job-list a').hover(function(){
		var img = $(this).find('.job-img').children('img');
		if(!img.hasClass('noswitch'))
		{
			var newimg = img.attr('src').substring(0,img.attr('src').length -5)+'m.gif';
			img.animate({
				opacity : 0
			},200,function(){
				img.attr('src',newimg);
				img.animate({
					opacity : 1
				},400);
			});
		}
		$(this).find('.jp-button-large').addClass('selected');

	},function(){
		var img = $(this).find('.job-img').children('img');
		if(!img.hasClass('noswitch'))
		{
			var newimg = img.attr('src').substring(0,img.attr('src').length -5)+'f.gif';
			img.stop().animate({
				opacity : 0
			},200,function(){
				img.attr('src',newimg);
				img.stop().animate({
					opacity : 1
				},400);
			});
		}
		$(this).find('.jp-button-large').removeClass('selected');
	});

	/*
	 * Article - Castle
	 */
	$('.castle-control a').click(function(){
		$('.castle-control a').removeClass('selected');
		$(this).addClass('selected');
		$('.castle-wrapper').stop().animate({
			top : -(parseInt($(this).attr('data'))*62)
		},'slow');
	});
	
	/*
	 * Article - Feed
	 */
	$('.feed-control a').click(function(){
		$('.feed-control a').removeClass('selected');
		$(this).addClass('selected');
		var feedcontent = '.feed-content.'+$(this).attr('data');
		$('.feed-content.selected').fadeOut(200,function(){
			$(this).removeClass('selected');
			$(feedcontent).addClass('selected').fadeIn(200);
		});
		return false;
	});

	/*
	 * Article - Gallery
	 */
	$('.thumb-img').hover(function(){
		$(this).stop().animate({
			opacity : 0.6
		});
	},function(){
		$(this).stop().animate({
			opacity : 1
		});
	});

	/*
	 * Poring Plugin
	 */
	/*
	$.initporingwalk = [];
	$('div[rel=poring]').draggable().each(function(i){
		$(this).css({
			top : rand(37,($(window).height() - 42)),
			left : rand(0,($(window).width() - 42))
		}).attr('data',i);
		$.initporingwalk[i] = setInterval(function(){ poringwalk(i) },rand(4000,8000));
	});
	*/

	var initcoverslider = setInterval(coverslider,15000);
});

/*
 * Poring Plugin
 */
/*
function poringwalk(i){
	w = 80;
	m = 30;
	p = $('div[rel=poring][data='+i+']');
	ot = parseInt(p.css('top'));
	ol = parseInt(p.css('left'));
	c = 0;
	do{
		nt = ot + rand(-w,w);
		c++;
		if(c > 4){
			nt = rand(37,($(window).height() - 42));
			break;
		}
	}while(nt < 0 || nt > ($(window).height() - 42) || Math.abs(nt - ot) < m);

	c = 0;
	do{
		nl = ol + rand(-w,w);
		c++;
		if(c > 4){
			nl = rand(37,($(window).height() - 42));
			break;
		}
	}while(nl < 0 || nl > ($(window).width() - 42) || Math.abs(nl - ol) < m);
	
	d = [];
	(nt > ot) ? d[0] = 'b' : d[0] = 'f';
	(nl > ol) ? d[1] = 'r' : d[1] = 'l';

	p.removeClass().addClass('w'+d[0]+d[1]).animate({
		top : nt,
		left : nl
	},1800,function(){
		p.removeClass().addClass('n'+d[0]+d[1])
	});
}
*/

function rand(min, max){
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function coverslider(){
	$('.cover-slider li[data='+$.coverslidercurrent+']').fadeOut(2400);
	$.coverslidercurrent++;
	if($.coverslidercurrent >= $.coverslidercount)
		$.coverslidercurrent = 0;
	$('.cover-slider li[data='+$.coverslidercurrent+']').fadeIn(2400);
	$('.cover-control li').removeClass('selected');
	$('.cover-control li[data='+$.coverslidercurrent+']').addClass('selected');
}

function cls(a){
	if(a){
		$('.lightbox').fadeOut(500);
		$('.jp-hidden').fadeOut(500);
	}else{
		$('.lightbox').hide();
		$('.jp-hidden').hide();
	}
}

function showmsg(e,t,m){
	cls();
	e.find('h2').text(t);
	e.find('.lightbox-content').children('p').text(m);
	$('.lightbox-inner').hide();
	e.show();
	$('.lightbox').fadeIn(400);
}

function errorlog(jqXHR,textStatus,errorThrown){
	/*
	console.log('jqXHR');
	console.log(jqXHR);
	console.log('textStatus');
	console.log(textStatus);
	console.log('errorThrown');
	console.log(errorThrown);
	*/
}

function reset(e){
	$(e).find(':input').each(function() {
		switch(this.type) {
			case 'password':
			case 'select-multiple':
			case 'select-one':
			case 'text':
			case 'textarea':
				$(this).val('');
				break;
			case 'checkbox':
			case 'radio':
				this.checked = false;
				break;
		}
	});
}

function placeuserdata(d){
	var m = $('.member-info-list');
	var c = $('.member-char-list');

	m.empty();
	for(var i = 0; i < d.memberinfolist.length; i++)
		m.append('<li>'+d.memberinfolist[i]+'</li>');

	d.userdata.sex == 'M' ? $('.member-profile').empty().append('<img src="images/male.gif" />') : $('.member-profile').empty().append('<img src="images/female.gif" />');
	
	c.empty();
	for(var i = 0; i < d.charlist.length; i++)
		c.append('<li><input type="radio" name="char_id" value="'+d.charlist[i].char_id+'" /> <label for="char_id">'+d.charlist[i].name+'</label></li>');

	$('#member-login').hide();
	$('.member-username').text(d.userdata.userid);
	$('#member-loggedin').show();

	$('a[href="#login"]').each(function(){
		$(this).attr('href',$(this).attr('rel'));
	});
}

function is_login(){
	if($('.member-username').text() == '')
		return false;
	return true;
}

function switchlink(l){
	if(l == null)
		return false;
	switch(l){
		case '#world-map':
		case '#monster-info':
		case '#item-info':
			showmsg($('.lightbox').find('.lightbox-inner[rel="#message"]'),'ขออภัย','ไม่สามารถใช้งานได้ในขณะนี้');
			return false;
		case '#register':
			cls();
			$('#register-accepted').show();
			$('.lightbox-inner').each(function(){
				$(this).attr('rel') == '#server-rules' ? $(this).show() : $(this).hide();
			});
			$('.lightbox').fadeIn(400);
			return false;
		case '#login-refill':
			if(is_login() == true)
				window.location.hash = '#refill';
		case '#login':
			cls();
			n = $('.jp-hidden.login');
			if(n.css('display') == 'none')
				n.stop().fadeIn(400);
			else
				n.stop().fadeOut(500);
			return false;
		case '#member':
			if(is_login() == false){
				showmsg($('.lightbox').find('.lightbox-inner[rel="#message"]'),'Member','Sorry, You are not login.');
				return false;
			}
			var h = $('.lightbox-inner[rel="#member"]');
			h.find('.lightbox-innercontent').each(function(){
				if($(this).attr('rel') != '#member-info')
					$(this).attr('rel') == '#member-menu' ? $(this).show() : $(this).hide();
			});
			h.find('.jp-form').attr('action','');
		case '#refill-history':
			$.ajax({
				url: 'https://nana-ro.com/core/ajax.php?module=refill&action=history',
				dataType: 'jsonp',
				jsonp: 'callback',
				success: function(d){
					e = $('#tmn-history');
					e.empty();
					e.append('<tr><th>รหัสบัตร</th><th>จำนวน</th><th>สถานะ</th><th>เวลา</th></tr>');
					for(var i = 0; i < d.length; i++)
						e.append('<tr><td>'+d[i].password+'</td><td>'+d[i].reward+'</td><td>'+d[i].status+'</td><td>'+d[i].time+'</td></tr>');
				},
				error: function(jqXHR,textStatus,errorThrown){
					errorlog(jqXHR,textStatus,errorThrown);
				}
			});
		case '#server-rules':
			if(l == '#server-rules')
				$('#register-accepted').hide();
		case '#download':
		/*
			if(l == '#download'){
				link = [
				'https://nanaonline.in.th/download/Setup_NanaLike_1.3.exe',
				'https://nanaonline.in.th/download/Setup_NanaLike_1.3.exe',
				];
				$('#downloadlink').attr('href',link[rand(0,link.length)]);
			}
		*/
		case '#nodownload':
		case '#pramool':
		case '#stream':
		case '#radio':
		case '#register-accepted':
			cls();
			var f = $('.lightbox-inner[rel="'+l+'"]');
			f.find('.jp-handle').hide().children('ul').empty();
			g = f.find('.jp-form');
			reset(g);
			$('.lightbox-inner').each(function(){
				$(this).attr('rel') == l ? $(this).show() : $(this).hide();
			});
			$('.lightbox').fadeIn(400);
			/*
			if(parseInt(f.outerHeight(true)) > parseInt($(window).height()))
				f.css('margin-top',parseInt($(window).height()) * 0.1)
			*/
			return false;
		case '#refill':
		case '#member-menu':
		case '#change-password':
		case '#reset-equipment-and-buff':
		case '#change-sls-password':
		case '#lock-unlock-sls':
			if(is_login() == false){
				showmsg($('.lightbox').find('.lightbox-inner[rel="#message"]'),'Member','Sorry, You are not login.');
				return false;
			}
			var h = $('.lightbox-inner[rel="#member"]');
			var i = h.find('.jp-form');
			if(l == '#member-menu')
				i.attr('action','');
			else
				l == '#refill' ? i.attr('action','https://nana-ro.com/core/ajax.php?module=refill&action=send') : i.attr('action',$('a[href="'+l+'"]').attr('action'));
			cls();
			$('.lightbox-inner').each(function(){
				$(this).attr('rel') == '#member' ? $(this).show() : $(this).hide();
			});
			h.find('.lightbox-innercontent').each(function(){
			if($(this).attr('rel') != '#member-info')
				$(this).attr('rel') == l ? $(this).show() : $(this).hide();
			});
			$('.lightbox').fadeIn(400);
			return false;
		case '':
		case '#':
			return false;
	}
	return;
}