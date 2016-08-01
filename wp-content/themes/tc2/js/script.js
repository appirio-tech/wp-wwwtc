jQuery(document).ready(function($){
  var normal_height = 768;
  
  //click on menu icon
  $(".btn-icon-menu").click(function(){
    //open the menu panel
    $(".right-aside").addClass("moving");
    $(".wrapper").addClass("moving");
  })
  
  //click on X in menu panel
  $(".right-aside .btn-icon-close").click(function(){
    //close the menu panel
    $(".right-aside").removeClass("moving");
    $(".wrapper").removeClass("moving");
  })
  
  //scroll up/down the mouse in Landing page
  $(".wrapper.landing-page").on("mousewheel DOMMouseScroll", function (e) {
    if(!$(".right-aside").hasClass("moving"))
    {
      var delta = (e.originalEvent.wheelDelta && (e.originalEvent.wheelDelta > 0 ? 1 : -1)) ||  // chrome & ie
                  (e.originalEvent.detail && (e.originalEvent.detail > 0 ? -1 : 1));            // firefox
      
      if (delta > 0){
        // scroll up
        scrollWidgetLandingPage("up");
      }
      else if (delta < 0){
        // scroll down
        scrollWidgetLandingPage("down");
      }
    }
  });
  
  //click key up/down in Landing page
  $(document).keyup(function (e) {
    if($(".landing-page").length>0 && !$(".right-aside").hasClass("moving"))
    {
      var keycode = e.which;
 
      if (keycode === 38){
        // scroll up
        scrollWidgetLandingPage("up");
      }
      else if (keycode === 40){
        // scroll down
        scrollWidgetLandingPage("down");
      }
    }
  });
  
  //swipe on Landing page
  $(".wrapper.landing-page").swipe({
    swipeUp: function() { 
      // scroll down
      scrollWidgetLandingPage("down");
    },
    swipeDown: function() { 
      // scroll up
      scrollWidgetLandingPage("up");
    }
  });
  
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
  $(".tab-contents .products-module .row .briefly").click(function(){
    $(this).addClass("hide");
    $(this).next().removeClass("hide");
  })
  
  //do nothing on expandable rows when click on View Detail button
  $(".tab-contents .products-module .row .briefly .btn-view-details").click(function(event){
    event.stopPropagation();
  })
  
  //click on X to collapse the content detail of Product List in What Can you Do page
  $(".tab-contents .products-module .row .detailed .btn-icon-close").click(function(){
    $(this).parents(".detailed").addClass("hide");
    $(this).parents(".detailed").prev().removeClass("hide");
  })
  
  //click on Option buttons in the content detail of Product List in What Can you Do page
  $(".tab-contents .products-module .row .detailed .btn-group a").click(function(){
    $(this).parent().find("a").removeClass("btn-black-border");
    $(this).addClass("btn-black-border");
  })
  
  var youtubePlayer;
  //when Video modal window show
  $('#modal-video').on('shown.bs.modal', function (e) {
    var tag = document.createElement("script");
    tag.src = "https://www.youtube.com/player_api";
    var firstScriptTag = document.getElementsByTagName("script")[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    
    if(youtubePlayer === undefined)
    {
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
    
    if(youtubePlayer !== undefined)
    {
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
    if($(window).scrollTop()>=$(".top-banner-about,.top-banner-what,.top-banner-marketplace").innerHeight())
    {
      $(".nav-tab.nav-tab-about,.nav-tab.nav-tab-what,.nav-tab.nav-tab-marketplace").addClass("nav-tab-fixed");
      $(".nav-placeholder").removeClass("hide");
    }
    else
    {
      $(".nav-tab.nav-tab-about,.nav-tab.nav-tab-what,.nav-tab.nav-tab-marketplace").removeClass("nav-tab-fixed");
      $(".nav-placeholder").addClass("hide");
    }    
  })
  
  //scroll the Landing page
  var scrolling = false;
  function scrollWidgetLandingPage(direction){
    if(scrolling)
      return;//do nothing when scrolling is working
  
    if($(".landing-page").length>0)
    {
      var page_sections = $(".landing-page .widget");
      var current_index = $(".landing-page .widget").length - $(".landing-page .widget.active").length;
      
      if(direction === "up")
      {
        if(current_index > 0)
        {
          scrolling = true;
          page_sections.eq(current_index - 1).addClass("active");
          setTimeout(function(){
            scrolling = false;
          },900);
        }
      }
      
      if(direction === "down")
      {        
        if(current_index < page_sections.length-1)
        {
          scrolling = true;
          page_sections.eq(current_index).removeClass("active");
          setTimeout(function(){
            scrolling = false;
          },900);
        }
      }
    }
  }
  
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
            
            
            $.getJSON( "http://api.topcoder.com/v2/challenges/"+challenge_id, function( data ) {
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
                $.getJSON( "http://api.topcoder.com/v2/challenges/registrants/"+challenge_id, function( registrants ) {
                    var ctr = registrants.length>0 ? registrants.length : 0;
                    $this.find('.challenge-registrants').text(ctr);
                });
                
                // get challenge submissions
                $.getJSON( "http://api.topcoder.com/v2/challenges/submissions/"+challenge_id, function( submissions ) {
                    var ctr = submissions.length>0 ? submissions.length : 0;
                    $this.find('.challenge-submissions').text(ctr);
                });
            });
            
        });
    }
    
})

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