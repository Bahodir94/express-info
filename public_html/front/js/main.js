(function($,window){$(function(){var $mainMenu=$('.main-menu');$mainMenu.on('click','a',function(e){var $this=$(this);if($this.attr('href')=='#'||$this.attr('href')==''){e.preventDefault();}});if($(window).width()<992){$('.btn-toggle').bind('click',function(){$(this).addClass('active');$('.menu-mobile-wrap').addClass('open');});}else{$('.btn-toggle').removeClass('active');$('.menu-mobile-wrap').removeClass('open');}
$('.menu-mobile-wrap .btn-menu-close').bind('click',function(){$('.btn-toggle').removeClass('active');$('.menu-mobile-wrap').removeClass('open');});var heightProfileMenu=$('.menu-mobile-profile').height();var heightWin=$(window).height();$('.menu-mobile').css('max-height',heightWin-heightProfileMenu+'px');$(window).on('resize',function(){if($(window).width()<992){$('.btn-toggle').bind('click',function(){$(this).addClass('active');$('.menu-mobile-wrap').addClass('open');});}else{$('.btn-toggle').removeClass('active');$('.menu-mobile-wrap').removeClass('open');}
var heightProfileMenu=$('.menu-mobile-profile').height();var heightWin=$(window).height();$('.menu-mobile').css('max-height',heightWin-heightProfileMenu+'px');});$('.btn-toggle-search').bind('click',function(e){e.stopPropagation();$(this).parent().find('.search-form').addClass('show');return false;});$('.header-box .search-form').bind('click',function(e){e.stopPropagation();});$('html, body').bind('click',function(){$('.header-box .search-form').removeClass('show');});$('.toggle-sidebar-left').bind('click',function(){$('.sidebar-left').addClass('show');});$('.btn-close-sidebar-left').bind('click',function(){$('.sidebar-left').removeClass('show');});$('.scroller').mCustomScrollbar({axis:'y',theme:'3d'});$('#slider-range').slider({range:true,min:0,max:90000,values:[0,15000],slide:function(event,ui){$('#amount').val('$'+ui.values[0]+' - $'+ui.values[1]);}});$('#amount').val($('#slider-range').slider('values',0)+'$'+' - '+$('#slider-range').slider('values',1)+'$');$('.hide-filter label').bind('click',function(){$('body').toggleClass('collapse-filter');});$('.testmonials').slick({autoplay:true,slidesToShow:1,slidesToScroll:1,arrows:false,dots:false});$('.smart-search-list').each(function(){var $this=$(this),numberOfOptions=$(this).children('option').length;$this.addClass('select-hidden');$this.wrap('<div class="smart-search-category"></div>');$this.after('<div class="smart-search-category-styled"></div>');var $styledSelect=$this.next('div.smart-search-category-styled');$styledSelect.text($this.children('option').eq(0).text());var $list=$('<ul />',{'class':'select-options'}).insertAfter($styledSelect);for(var i=0;i<numberOfOptions;i++){$('<li />',{text:$this.children('option').eq(i).text(),rel:$this.children('option').eq(i).val()}).appendTo($list);}
var $listItems=$list.children('li');$styledSelect.click(function(e){e.stopPropagation();$('div.smart-search-category-styled.active').not(this).each(function(){$(this).removeClass('active').next('ul.select-options').hide();});$(this).toggleClass('active').next('ul.select-options').toggle();});$listItems.bind('click',function(e){e.stopPropagation();$styledSelect.text($(this).text()).removeClass('active');$this.val($(this).attr('rel'));$list.hide();});$(document).bind('click',function(){$styledSelect.removeClass('active');$list.hide();});});var $container=$('.masonry').isotope({itemSelector:'.masonry-item'});$container.imagesLoaded().progress(function(){$container.isotope('layout');});$('#filters button').bind('click',function(){var selector=$(this).attr('data-filter');$(this).addClass('is-checked');$container.isotope({filter:selector});return false;});$('.toggle-sidebar-admin').bind('click',function(){$(this).toggleClass('active');$('.sidebar-admin').toggleClass('show');});$('.msg-contact-item').bind('click',function(){$('.employer-messages').addClass('conversation-mb');return false;});$('.back-view').bind('click',function(){$('.employer-messages').removeClass('conversation-mb');});$('.popup-video').magnificPopup({disableOn:700,type:'iframe',mainClass:'mfp-fade',removalDelay:160,preloader:false,fixedContentPos:false});});})(jQuery,window);