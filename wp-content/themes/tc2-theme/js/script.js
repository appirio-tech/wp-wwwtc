jQuery(document).ready(function($){
  var normal_height = 768;

    $('#coverflow').coverflow({
      active: 1,
      angle: 0,
      select: function(event, ui) {
        $("#executeTeamSlider").carousel(ui.index);
      }
    });

    $("#coverflow").on("swipe",function(){
      console.log("abc");
      // $(this).hide();
    });

    $(".carousel-indicators li.team-item").each(function(index){

      $(this).on("click", function(e){
        // console.log(index);
      // $(this).click(function(e){
        // console.log(e);
        $('#coverflow' ).coverflow( 'select', index );
      });

      // console.log($(".team-item-dot-" + index));
    });


    $('#coverflow img').click(function() {
      if (!$(this).hasClass('ui-state-active')) {
          return;
      }

      $('#coverflow').coverflow('next');
    });
    
    // Instantiate the Bootstrap carousel
    $('.multi-item-carousel').carousel({
      interval: false
    });

    // for every slide in carousel, copy the next slide's item in the slide.
    // Do the same for the next, next item.
    $('.multi-item-carousel .item').each(function(){
      var next = $(this).next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));
      

      if (next.next().length>0) {
        next.next().children(':first-child').clone().appendTo($(this));
      } else {
        $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
      }
      
    });
    
    $('.multi-item-carousel .item').each(function(){
      $(this).children(':first-child').addClass('panel-active');
    });
    
  
  //click on menu icon
  $(".btn-icon-menu").click(function(){
    //open the menu panel
    $(".right-aside").addClass("moving");
    $(".wrapper").addClass("moving");
  })
  
  //click on X in menu panel
  $(".right-aside .btn-icon-close, .js-close-nav").click(function(){
    //close the menu panel
    $(".right-aside").removeClass("moving");
    $(".wrapper").removeClass("moving");
  })
  
  /*click on Get started with crowdsourcing button in Landing page
    click on Submit button in About Topcoder Contact page*/
  $(".landing-page .btn-get-started-with-crowdsourcing,\
     .tab-contents-contact .btn-submit,\
     .what-can-you-do-page .btn-get-started-with-crowdsourcing,\
     .what-can-you-do-page .btn-crowdsourcing-today,\
     .app-visual-design-page .btn-get-started-with-crowdsourcing,\
     .powered-by-page .btn-crowdsourcing-today,\
     .marketplace-overview-page .btn-get-started-with-crowdsourcing,\
     .marketplace-the-community-page .btn-crowdsourcing-today,\
     .marketplace-the-products-page .btn-crowdsourcing-today").click(function(){
    validateForm($(this).parents(".form-contact"));
  })
  
  //click on row to expand the content detail of Product List in What Can you Do page
  $(".tab-contents .products-module .row .briefly, .generic-products .row .briefly").click(function(){
    $(this).addClass("hide");
    $(this).next().removeClass("hide");
  })
  
  //do nothing on expandable rows when click on View Detail button
  /*
  $(".tab-contents .products-module .row .briefly .btn-view-details, .generic-products .row .briefly .btn-view-details").click(function(event){
    event.stopPropagation();
  })
  */
  
  //click on X to collapse the content detail of Product List in What Can you Do page
  $(".tab-contents .products-module .row .detailed .btn-icon-close, .generic-products .row .detailed .btn-icon-close").click(function(){
    $(this).parents(".detailed").addClass("hide");
    $(this).parents(".detailed").prev().removeClass("hide");
  })
  
  //click on Option buttons in the content detail of Product List in What Can you Do page
  $(".tab-contents .products-module .row .detailed .btn-group a, .generic-products .row .detailed .btn-group a").click(function(){
    $(this).parent().find("a").removeClass("btn-black-border");
    $(this).addClass("btn-black-border");
  })
  
  var youtubePlayer;
  //when Video modal window show
  $('#modal-video').on('show.bs.modal', function (e) {
    var tag = document.createElement("script");
    tag.src = "https://www.youtube.com/player_api";
    var firstScriptTag = document.getElementsByTagName("script")[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    
    if(youtubePlayer === undefined) {
      window.onYouTubePlayerAPIReady = function() {
        youtubePlayer = new YT.Player("youtube-player", {
          height: $("#youtube-player").height(),
          width: "100%",
          videoId: $(e.relatedTarget).data('video'),
          playerVars: { 
                        "autoplay": 1,
                        "showinfo": 1
                      }
        });
      }
    }
    
    if(youtubePlayer !== undefined) {
        youtubePlayer.loadVideoById($(e.relatedTarget).data('video'));
        youtubePlayer.playVideo();
    }
  })
  
  //when Video modal window hide
  $('#modal-video').on('hidden.bs.modal', function () {
    if(youtubePlayer !== undefined)
    {
      youtubePlayer.stopVideo();
    }
  })
  
  //resize window
  $(window).resize(function(){
    if($(".about-topcoder-page,.what-can-you-do-page,.marketplace-page,.powered-by-page").length>0)
    {
      //for Other pages except Landing page
      var nav_offset = $('.admin-bar').length>0 ? 32 : 0;
      $(".top-banner-about,.top-banner-what").innerHeight($(window).height()-$(".nav-tab").height()-nav_offset);
    }
  })
  
  //check and init different page
  function checkPages(){
    if($(".landing-page").length>0)
    {
      //for Landing page
      $(".landing-page .widget").hide();
      for(var i=0;i<$(".landing-page .widget").length;i++)
      {
        $(".landing-page .widget").eq(i).addClass("active");
        $(".landing-page .widget").eq(i).css("z-index",($(".landing-page .widget").length-i));
      }
      $(".landing-page .widget").show();
    }
    
    if($(".about-topcoder-page,.what-can-you-do-page,.marketplace-page,.powered-by-page").length>0)
    {
      //for Other pages except Landing page
      var nav_offset = $('.admin-bar').length>0 ? 32 : 0;
      $(".top-banner-about,.top-banner-what").innerHeight($(window).height()-$(".nav-tab").height()-nav_offset);
      
      if(getQueryString("tour") !== null)
      {
        var scroll_offset = 0;
        switch(getQueryString("tour"))
        {
          case "company"://Company tab of About Topcoder page
            scroll_offset = $(".nav-tab.nav-tab-about").offset();
            break;
          case "community"://Community tab of About Topcoder page
            scroll_offset = $(".nav-tab.nav-tab-about").offset();
            break;
          case "team"://Team tab of About Topcoder page
            scroll_offset = $(".nav-tab.nav-tab-about").offset();
            break;
          case "contact"://Contact tab of About Topcoder page
            scroll_offset = $(".nav-tab.nav-tab-about").offset();
            break;
          
          case "overview"://Overview tab of What Can you Do page
            if ( $(".nav-tab.nav-tab-what").length>0 ) {
                scroll_offset = $(".nav-tab.nav-tab-what").offset();
            } else {
                scroll_offset = $(".nav-tab.nav-tab-marketplace").offset();
            }
            
            break;
          case "mobile-applications"://Mobile Applications tab of What Can you Do page
            scroll_offset = $(".nav-tab.nav-tab-what").offset();
            break;
          case "web-applications"://Web Applications tab of What Can you Do page
            scroll_offset = $(".nav-tab.nav-tab-what").offset();
            break;
          case "algorithms-analytics"://Algorithms Analytics tab of What Can you Do page
            scroll_offset = $(".nav-tab.nav-tab-what").offset();
            break;
          case "innovation-catalyst"://Innovation Catalyst tab of What Can you Do page
            scroll_offset = $(".nav-tab.nav-tab-what").offset();
            break;
          
          case "the-community"://The Community tab of Marketplace page
            scroll_offset = $(".nav-tab.nav-tab-marketplace").offset();
            break;
          case "the-products"://The Products tab of Marketplace page
            scroll_offset = $(".nav-tab.nav-tab-marketplace").offset();
            break;
                
          default:
            scroll_offset = $(".nav-tab").offset();
            break;
        }
        $("body,html").animate({
          scrollTop:scroll_offset.top
        },1);
      }
    }
  }
  checkPages();
  
  //when scroll the Other pages except Landing page
  $(document).scroll(function(){
    if($(window).scrollTop()>=68){
        $(".nav-tab.nav-tab-about,.nav-tab.nav-tab-what,.nav-tab.nav-tab-marketplace,.nav-tab.nav-tab-generic").addClass("nav-tab-fixed");
        $(".nav-placeholder").removeClass("hide");
        showStickyBanner();
    }
    else
    {
        $(".nav-tab.nav-tab-about,.nav-tab.nav-tab-what,.nav-tab.nav-tab-marketplace,.nav-tab.nav-tab-generic").removeClass("nav-tab-fixed");
        $(".nav-placeholder").addClass("hide");
        hideStickyBanner();
    }    
    initMoveup($('.wrapper'));
  })
  
  //general validate form function
  function validateForm(formElement) {
    var pass = true;
    var validate_elements = formElement.find("input,textarea");
    
    for(var i=0;i<validate_elements.length;i++)
    {
      if(validate_elements.eq(i).val() !== "")
      {
        if(validate_elements.eq(i).attr("type") === "email")
        {
          if(checkMail(validate_elements.eq(i).val()))
          {
            validate_elements.eq(i).parent().removeClass("field-error");
          }
          else
          {
            validate_elements.eq(i).parent().addClass("field-error");
            pass = false;
          }
        }
        else
        {
          validate_elements.eq(i).parent().removeClass("field-error");
        }
      }
      else
      {
        validate_elements.eq(i).parent().addClass("field-error");
        pass = false;
      }
    }
    
    return pass;
  }
    
    
    // Hide/show of clients when selecting a category under the PoweredBy page
    $('#clientSelectCat li a').click(function(){
        var cat = $(this).data('cat');
        $('#dLabel .selected-option').text( $(this).text() );
        
        $('#clientToggleCat').fadeOut(1000);
        setTimeout(function(){
            if (cat===0) {
                $('#clientToggleCat li').show();
            } else {
                $('#clientToggleCat li').hide();
                $('#clientToggleCat li.client-'+cat).show();
            }
            $('#clientToggleCat').fadeIn(1000);
        }, 1000);
    });
    
    // Hide/show of products when selecting a category under the Marketplace - The Community page
    $('#productSelectCat li a').click(function(){
        var cat = $(this).data('cat');
        $('#dLabel .selected-option').text( $(this).text() );
        
        $('#productToggleCat').fadeOut(1000);
        
        setTimeout(function(){
            $('.product-row').hide();
            $('.product-row-'+cat).show();
            $('#productToggleCat').fadeIn(1000);
        }, 1000);
    });
    
    // Get Challenge Details
    if ( $('.get-challenge').length>0 ) {
        $('.get-challenge').each(function(){
            var $this = $(this),
                challenge_id = $this.data('challenge');
            
            
            $.getJSON( "https://api.topcoder.com/v2/challenges/"+challenge_id, function( data ) {
                var color = data.type==='design' ? 'green' : 'blue';
                
                $this.find('.title-line').addClass(color + '-color');
                $this.find('.challenge-title').text(data.challengeName).attr('href', 'https://www.topcoder.com/challenge-details/'+challenge_id+'/?type='+data.type);
                $this.find('.challenge-type').text(data.challengeType).addClass(color+'-txt');
                $this.find('.challenge-forum').attr('href', data.forumLink);
                $this.find('.challenge-phase').text(data.currentPhaseName);
                
                var remaining_time = secondsToString(data.currentPhaseRemainingTime);
                
                $this.find('.challenge-ends-in').text(remaining_time.num);
                $this.find('.challenge-ends-in-unit').text(remaining_time.unit);
                
                // get challenge registrants
                $.getJSON( "https://api.topcoder.com/v2/challenges/registrants/"+challenge_id, function( registrants ) {
                    var ctr = registrants.length>0 ? registrants.length : 0;
                    $this.find('.challenge-registrants').text(ctr);
                });
                
                // get challenge submissions
                $.getJSON( "https://api.topcoder.com/v2/challenges/submissions/"+challenge_id, function( submissions ) {
                    var ctr = submissions.length>0 ? submissions.length : 0;
                    $this.find('.challenge-submissions').text(ctr);
                });
            });
            
        });
    }
    
    // Switch arrow mode
    $('#carousel-app').on('slide.bs.carousel', function (el) {
        if ( $(el.relatedTarget).hasClass('light-mode') ) {
            $('#carousel-app .btn-icon-arrow-left .icons').removeClass('white-arrow-left');
            $('#carousel-app .btn-icon-arrow-right .icons').removeClass('white-arrow-right');
            $('#carousel-app .carousel-indicators').addClass('dark-dot');
        } else {
            $('#carousel-app .btn-icon-arrow-left .icons').addClass('white-arrow-left');
            $('#carousel-app .btn-icon-arrow-right .icons').addClass('white-arrow-right');
            $('#carousel-app .carousel-indicators').removeClass('dark-dot');
        }
    });

    //carousel swipe
    function carouselSwipe() {
        $(".js-slider").each(function() {
            var _ = $(this);
            _.swipe({
                swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
                  if(!_.hasClass('enable-xs') || ( _.hasClass('enable-xs') && $('.chk-active',_).is(':visible'))){
                    if (direction === 'left')
                        $(this).carousel('next');
                    if (direction === 'right')
                        $(this).carousel('prev');
                    }
                },
                allowPageScroll: "vertical"
            });
        })
    }
    carouselSwipe();
    
    //toggle nav-tab
  $('.js-nav-tab .nav-current').on('click',function(e){
        var _p = $(this).closest('.nav-tab')
        posT = _p[0].getBoundingClientRect(),
        posTtop = posT.top,
        scrolled = $('body > .wrapper').scrollTop();
        if(_p.hasClass('open')){
          _p.removeClass('open');
          $('body').removeClass('nav-open');
        }else{
          _p.addClass('open');
          $('body').addClass('nav-open');
        };
        
        if ( $('body').hasClass('has-sticky-banner') ) {
            posTtop = posTtop - $('.sticky-banner').height() - 18;
        }
        
        $('body > .wrapper').animate({ scrollTop: posTtop+scrolled}, 500, function(){
            if ( $('.sticky-banner').css('display')!=='block' ) {
                showStickyBanner();
            }
        });
      })

    //affix middle menu 
    var scrolling = false;
    function initAffix(){
      if(!scrolling){
        window.setTimeout(function(){
          scrolling = false;
          $('.wrapper').on('scroll',function(){

            //affix init
            var _a = $('.js-affix');

            _a.each(function(idx){
              var $this = $(this);
              var offsetY = parseInt($this.attr('data-offsetY')) || 0,
              pos = '',
              scrollT = '';     
              if($this.length>0){                         
                $this.removeClass('affixed');
                pos = $this[0].getBoundingClientRect();
                scrollT = $('.wrapper').scrollTop();


                 // is css position is fixed then compares scrolltop with postion top otherwise
                 // position should be greater than 0 or min offset
                 if($this.attr('data-position')==='fixed'){
                   if(scrollT>=pos.top+offsetY){
                        $this.addClass('affixed');
                    }else{
                        $this.removeClass('affixed');
                    }                    
                 }else{
                   if(pos.top+offsetY<=3){
                        $this.addClass('affixed');
                        showStickyBanner();
                    }else{
                        $this.removeClass('affixed');
                        hideStickyBanner();
                    }
                 }
              }
            })


          });        
        },200);
      }

    };
    initAffix();




    
    //inits move up funtiaon
    function initMoveup(scrollEl){
      var st = scrollEl.scrollTop(),
      wt = $('.top-banner').height()+10,
      winHt = $(window).height();
      wt = wt >winHt? wt : winHt;

      $('body').removeClass('moveup-enabled');
      if(st>wt){
        $('body').addClass('moveup-enabled');
      }
    }

    $('.js-nav-tab').on('click',function(e){
      e.stopPropagation();
    })
    
    //close drop-down on cliking overlay
    $('.overlay').on('click',function(){
      $('.nav-open').removeClass('nav-open');
      $('.js-nav-tab').removeClass('open');
    })
    
    // move up
    $('.move-up').on('click',function(){
     $('body > .wrapper').animate({ scrollTop: 0}, 500, 'swing');
    })
    
    
    /**
     * Sticky Banner 
     */
    // Remove Sticky Banner
    $('.sticky-banner a').click(function(){
        $('.sticky-banner').remove();
        $('.has-sticky-banner .nav-tab').removeAttr('style');
        $('body').removeClass('has-sticky-banner');
    });
    
    // Show Sticky Banner
    function showStickyBanner() {
        if ( $('.sticky-banner').length>0 ) {
            var sticky_banner_height = $('.sticky-banner').height() + 18;            
            $('.sticky-banner').slideDown(300);
            $('.has-sticky-banner .nav-tab.affixed').css('top', sticky_banner_height + 'px');
            $('.has-sticky-banner .nav-tab.nav-tab-fixed').css('top', sticky_banner_height + 'px');
        }
    }
    
    // Hide Sticky Banner
    function hideStickyBanner() {
        if ( $('.sticky-banner').length>0 ) {
            if ( $('.nav-open .overlay').css('display')!=='block' ) { 
                $('.has-sticky-banner .nav-tab').removeAttr('style');
                $('.sticky-banner').slideUp(300);
            }
        }
    }
    /* End of Sticky Banner */
    
    
    /* Blog Sub Navigation */
    if ( $('body').hasClass('blog') || $('body').hasClass('archive') ) {
        var $ul = $('.current-menu-ancestor .sub-menu').clone();
        $ul.removeClass('sub-menu').addClass('blog-menu');
        $('.contents').before($ul);
        $('.blog-menu').wrap('<div class="blog-sub-nav" data-spy="affix" data-offset-top="68"></div>');
        $('.blog-sub-nav').prepend('<a class="nav-current visible-xs">'+ $('.blog-menu .current-menu-item').text() +'</a>');
    }
    
    $('.blog-sub-nav').on('click','.nav-current', function(e){
        var _p = $(this).parents('.blog-sub-nav'),
        posT = _p[0].getBoundingClientRect(),
        posTtop = posT.top,
        scrolled = $('body > .wrapper').scrollTop();
        
        if(_p.hasClass('open')){
          _p.removeClass('open');
          $('body').removeClass('nav-open');
        }else{
          _p.addClass('open');
          $('body').addClass('nav-open');
        };
        
        if ( $('body').hasClass('has-sticky-banner') ) {
            posTtop = posTtop - $('.sticky-banner').height() - 18;
        }
        
        $('body > .wrapper').animate({ scrollTop: posTtop+scrolled}, 500, function(){
            if ( $('.sticky-banner').css('display')!=='block' ) {
                showStickyBanner();
            }
        });
      })
    
    
    /* Mobile Navigation */
    $('.mobile-hamburger').click(function(){
        var $this = $(this);
        
        if ( $this.hasClass('collapsed') ) {
            
            // Hide Nav
            $('.top-banner').animate({
                'margin-top': 0
            }, 200);
            $('header .right-area').animate({
                top: '-200vh'
            }, 200, function(){
                $this.removeClass('collapsed');
                $('header .right-area').removeClass('collapsed');
                $('.sub-menu').css({
                    visibility: 'hidden',
                    opacity: 0
                });
                $('.header .right-area').css({
                    left: 0
                });
                
                $('.hideSubNAv').text('').animate({
                    right: '-100%'
                }, 0);
            });
            
        } else {
            
            // Show Nav
            $('.top-banner').animate({
                'margin-top': 0
            }, 200);
            $('header .right-area').animate({
                top: 0
            }, 200, function(){
                $this.addClass('collapsed');
                $('header .right-area').addClass('collapsed');
            });
        }
    });
    
    $('.header .right-area li a').click(function(){
        var $this = $(this),
            $submenu = $this.siblings('.sub-menu');
        
        if ( $submenu.length>0 && $('.mobile-hamburger').css('display')=='block' ) {
            
            $('.sub-menu').css({
                visibility: 'hidden',
                opacity: 0
            });
            $submenu.css({
                visibility: 'visible',
                opacity: 1
            });
            
            $('.hideSubNAv').text($this.text()).animate({
                right: 0
            }, 100);
            
            $('.header .right-area').animate({
                left: '-100%'
            }, 100);
            
            return false;
        } else {
            return true;
        }
    });
    
    $('.hideSubNAv').click(function(){   
        $('.header .right-area').animate({
            left: 0
        }, 100, function(){
            $('.sub-menu').css({
                visibility: 'hidden',
                opacity: 0
            });
        });
        
        $('.hideSubNAv').text('').animate({
            right: '-100%'
        }, 100);
    });
    
    // Exit Intent
    if ( $('#modalExitIntent').length>0 ) {
        var _ouibounce = ouibounce(false, {
            aggressive: false,
            timer: 0,
            callback: function() {
                $('#modalExitIntent').modal('show');
            }
        });  
    }
    
    
    // Count Up
    if ( $('.case-studies-metrics li').length>0 ) {
        var countup     = new Array(),
            countplayed = new Array(),
            allplayed   = false,
            metrics_top = $('.case-studies-metrics').offset().top;
        
        $('.case-studies-metrics li').each(function(i){
            var $value = $(this).find('.value'),
                options = {
                    useEasing : true, 
                    useGrouping : true, 
                    separator : ',', 
                    decimal : '.', 
                    prefix : $value.data('prefix'), 
                    suffix : $value.data('suffix') 
                };
                
                if ( $value.data('value')>0 ) {
                    countup[i] = new CountUp('case-value-'+i, 0, $value.data('value'), 0, 3, options);
                } else {
                    $value.html( $value.data('prefix') + $value.data('suffix') );
                }
        });
        
        
        $('.case-study-content').scroll(function(){
            var body_height = $("body").innerHeight();
            
            $('.case-studies-metrics li').each(function(i){
                var $this = $(this);
                
                if ( body_height>($this.offset().top + $this.height()) ) {
                    if( countup[i]!=undefined ) {
                        countup[i].start();
                    }
                }
                
            });
        });
    }
    
    
    if ( $('.case-studies-post').length>0 ) {
        
        
        var $grid = $('.case-studies-post').masonry({
            itemSelector: '.case-studies-post ul li.visible',
            gutter: 20,
            columnWidth: '.grid-sizer',
            percentPosition: true
        });
        
        $grid.imagesLoaded().progress( function() {
            $grid.masonry('layout');
        });
        
        
        // Lazy load
        var loading = false;
        if ( $('#case-page').length>0 ) {
            $('.case-study-content').on("scroll",function(){
                if ( $('footer').offset().top<500 && loading==false ) {
                    loading = true;
                    $.post(
                        jsvars.admin_ajax,
                        {
                            "page": $('#case-page').val(),
                            "action": "case_lazy_load",
                        },
                        function(data){
                            
                            // set loading safe to false
                            loading = false;
                            
                            if (data!='' && data!='0') {
                                // update pagination
                                $('#case-page').val( parseInt($('#case-page').val()) + 1 );
                                
                                // update list
                                $('.case-studies-post ul').append(data);
                            } else {
                                // remove pagination to prevent future ajax request
                                $('#case-page').remove();
                            }
                            
                            $grid.masonry('reloadItems');
                            $grid.masonry('layout');
                        }
                    );
                }
            });
        }
        
        
        // Case Filter
        $('.categories a').click(function(){
            var $this = $(this);
            
            $('.categories li').removeClass('active');
            $this.parent().addClass('active');
            
            $('.case-studies-post li').removeClass('visible');
            
            if ( $this.data('catfilter')=='all' ) {
                $('.case-studies-post li').fadeIn().addClass('visible');
                $('.case-studies-post li.ad').hide();
            } else {
                $('.case-studies-post li').hide();
                $('.case-studies-post li.'+$this.data('catfilter')).fadeIn().addClass('visible');
            }
            
             var $ad = $('.case-studies-post ul li.ad').detach();
            
            if ( $('.case-studies-post ul li:visible').length>0 ) {
                var eq_insert = $('.case-studies-post ul li:visible').length>1 ? 1 : 0;
                $ad.insertAfter( $('.case-studies-post ul li.visible:eq('+eq_insert+')') );
            } else {
                $('.case-studies-post ul').append( $ad );
            }
            
            $('.case-studies-post ul li.ad').each(function() {
                if ( $(this).hasClass( $this.data('catfilter')) ) {
                    $(this).addClass('visible');
                } else {
                    $(this).removeClass('visible');
                }
            });
            
            $grid.masonry('reloadItems');
            $grid.masonry('layout');
            
            // Scroll up the categories if in mobile
            if ( $('.current-category').is(':visible') ) {
                $('.categories').slideUp(300);
            }
            
            $('.current-category a').text( $this.text() );
        });
        
        
        // Slide out categories
        $('.current-category').click(function(){
            if ( $('.categories').is(':visible') ) {
                $('.categories').slideUp(300);
            } else {
                $('.categories').slideDown(300);
                
                $('.case-study-content').animate({
                    scrollTop: $('#hero-carousel').height()
                }, 300);
            }
        });
        
        // Show category fix when hidden in mobile
        $(window).on('resize', function(){
            if( $(window).width()>=768 ){
                if ( $('.categories').is(':visible')==false ) {
                    $('.categories').slideDown(300);
                }
            } else {
                if ( $('.categories').is(':visible') ) {
                    $('.categories').slideUp(300);
                }
            }
        });
    }
    
    
    // Branding Navigation scroll to section
    $('.nav-branding a').click(function(){
        var target = $(this).data('target'),
            scrollTo = $('#'+target),
            container = $('.wrapper'),
            scrollValue = ( scrollTo.offset().top - container.offset().top + container.scrollTop() ) - parseInt(scrollTo.css('margin-top'));
        
        if ( $('.nav-tab').hasClass('affixed')==false ) {
            scrollValue = scrollValue - 70;
        }
        
        if ( $('body').hasClass('has-sticky-banner') ) {
            scrollValue = scrollValue - 70;
        }
        
        container.animate({
            scrollTop: scrollValue
        });
        
        
        // Mobile Nav
        $('.nav-current').text( $(this).text() );
        $('.nav-open .overlay').hide();
        $('body').removeClass('nav-open');
        $('.nav-tab').removeClass('open');
        
    });
});

    // convert secondas to days/hours/minutes
    function secondsToString(seconds) {
        var $return     = new Object();
        var $num        = Math.floor(seconds / 86400);
        
        if ( $num>0 ) {
            $return     = {num: $num, unit: 'day'};
            if ($num>1) {
                $return.unit = 'days';
            }
        } else {
            $num = Math.floor((seconds % 86400) / 3600);
            if ( $num>0 ) {
                $return     = {num: $num, unit: 'hour'};
                if ($num>1) {
                    $return.unit = 'hours';
                }
            } else {
                $num = Math.floor(((seconds % 86400) % 3600) / 60);
                if ( $num>0 ) {
                    $return     = {num: $num, unit: 'minute'};
                    if ($num>1) {
                        $return.unit = 'minutes';
                    }
                } else {
                    $return     = {num: seconds, unit: 'seconds'};
                }
            }
        } 
        
        return $return;
    }

  //check Email format
  function checkMail(mail){
    var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (filter.test(mail))
      return true;
    else
    {
      return false;
    }
  }
  
  //get value of URL paramaters
  function getQueryString(name) {
    var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
    var r = window.location.search.substr(1).match(reg);
    if (r !== null) {
      return unescape(r[2]);
    }
    return null;
  }