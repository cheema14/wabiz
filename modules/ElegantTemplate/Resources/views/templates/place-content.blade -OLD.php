<?php $color = "#641612"; ?>

<style>
  	.row.show_info {
        display: none;
    }
  	.schedule .items > li {
        flex-direction: row;
        padding-top: 0;
        padding-bottom: 0;
        border-top: none!important;
        font-size: 14px;
    }
  	.float-img {
        position: absolute;
        left: -8px;
        z-index: 9999;
        width: 30px;
        border-radius: 50%;
        overflow: hidden;
    }

    nav.tabbable {
        max-width: 1080px;
        padding-left: 30px;
    }
    .catal {
        margin-left: 0.8%;
    }

    .myCent {
        text-align: center;
    }
	.myCentre{
      display:flex !important;
    	justify-content:center !important;
    align-content:center !important;
      flex-direction:column !important;
    }
    .myCate {
        background: white;
        color: black;
    }

    .myCate:hover {
        background: purple;
        color: white;
        text-decoration: none !important;
    }
  	.myCat{
    	display:flex;
    	justify-content: flex-start;
    	height: 100%;
  }
  .leM{
    color: #240c52 !important;
  }


  .myCo{
    height : 58px !important;
    border: none !important;
  }
  .myTop{
    margin-top : 30px ;
  }
  .myTake{
    width : 150px;
    background : #f8f5f2;
  }
  
  .myTxtw{
    color:#240c52 !important;
    margin-right : 15px;
  }
  
  .myBack{
    background: #ffffff !important;
  }
  .myCoul{
    
    @if($heading_color)
        color:<?php echo $heading_color; ?> !important;
    @else
        color : #240c52 !important;
    @endif
  }
  .myImCat{
    width : 100% !important;
    border-radius : 2px 2px 0px 0px;
  }
  .muf{
    background : #f8f5f2 !important;
  }
  

    @media only screen and (max-width: 600px) {

        .catal {
            margin-left: 3.5% !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center;
        }
      .  .myTop{
    margin-top : 30px !important;
  }
	 #mobile-menu > .close-mobile-menu{
       top: 4px;
       
     }
      	.myRes{
    		width : 100%;
          height: 250px !important;
  		}
        .myCent {
            text-align: center;
            margin-left: 45%;
        }

        .myCate {
            margin-top: 5%;
            margin-bottom: 5%;
        }
      	.muf{
   	 		margin-top : 2%;
        	margin-bottom : 1%;
  	}
       .myDeco{
    		margin : 0px 16px;
  		}
       .myImCat{
    		width : 100% !important;
       		 height: 100% ;
  }
      .myTxtw{
    		margin-right : 0px;
        margin-left: 3px;
  }
      .myTake{
		width : 150px !important;
      }
      .myBg{
    	background : white !important; 
   		 width: 100% !important;
   		 height : 75px;
       	 position : fixed; 
        bottom : 0px; 
        right: 0px;
        z-index : 1000 !important;
  }
      .myIco{
        position : fixed;
        bottom: 26px;
        left: 50px;
        z-index : 1000;
        font-size : 27px;
      }
      .related-mobile-menu{
	 		 margin-bottom: 19px; 
    }
  
    }
  
    .myProd {
        width: 100% !important;
    }

    .show_info{
        height:330px !important;
    }
</style>
<!-- section-place-content-menu -->
<section class='section section-place-content-menu  muf  '>

    <div class='packer'>
		<div class="float-img">
          <img src="{{ asset('images/img-sl.jpg') }}" alt="flt-img"/>
      </div>
        <div class="package ">
            <div class="text-center">
                
                <div>
            
   			@if(!$restorant->categories->isEmpty())
        	<nav class="tabbable sticky" style="top: {{ config('app.isqrsaas') ? 64:88 }}px;">
                <!--<ul class="nav nav-pills bg-white mb-2">
                     <li class="nav-item  ">
                        <a class="nav-link  mb-sm-3 mb-md-0 active" data-toggle="tab" role="tab" href="">{{ __('All categories') }}</a>
                    </li> -->
                   
                        
                            
                  <div class="swiper mySwiper" >
      <div class="swiper-wrapper" id="top-menu">
         @foreach ( $restorant->categories as $key => $category)
        <div class="nav-item swiper-slide" >
                                <a class="btn  nav-link mb-sm-3 mb-md-0 leM"   
                                   href="#subsection-<?php echo $category->id; ?>">{{ $category->name }}</a>
                            </div>
        @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      
    </div>
                        
                    
                <!--</ul>-->

                
            </nav>

            
            @endif
                </div>
              
            </div>

	
        </div>
    </div>
</section>
<!-- section-place-content -->
<section class="section section-place-content">
    <div class="container-fluid">
      
                <div class="myBg thecartbtnClass third-child" id="theCartBottomButtonDiv" style="display:none;">

                    <input type="hidden" name="total_in_cart" id="total_in_cart" value="0" />
                    <div id="theCartBottomButton" onClick="openNav()" class=" close-mobile-menu circle callOutShoppingButtonBottom icon icon-shape bg-gradient-red text-white rounded-circle shadow mb-2" style=" background: linear-gradient(87deg, #ffffff 0, #ffffff 100%) !important;">
                        
                            <button class="btn btn-primary custom--cart myCo myUbuntu" style="background :  #240c52">
                                Checkout
                            </button>
                        
                        <i style="color : white;" class="las la-shopping-bag myIco"></i>
                                                    
                    </div>
                </div>
        <div class='row'>
            @if(!$restorant->categories->isEmpty())
            @foreach ( $restorant->categories as $key => $category)
            
            <div id='subsection-<?php echo $category->id; ?>' class='box-info'>
                    
                <div class=' align-center myDeco myTop myUbuntu' style="background:none;border-radius:none;">
                
                    @if($category->logom)

                        <img id="previewImg" class="img-fluid  myImCat" src="<?php echo $category->logom;?>" alt="..." /> 

                    @endif
                </div>
                <div class='head  myDeco'>
                    <h2 class="myTxtw myUbuntu3"><?php echo $category->name; ?></h2>
                </div>


                <!-- PRODUCT CARD START -->

                <div class='row mt-3'>
                    @foreach ($category->aitems as $item)
                    <div class="col-md-3" style="width: 18rem;">
                        <img src="{{ $item->logom }}" class="img-fluid myRes" alt="...">
                        <div class="card-body myBack ">
                            <h5 class="card-title myCoul">{{ $item->name }}</h5>
                            <p class="card-text myCoul myUbuntu3">{{ $item->short_description}}</p>
                            <!-- class="extras" -->
                           <div class="price-btn-wrap"> <div class='price myCoul'>@money($item->price, config('settings.cashier_currency'),config('settings.do_convertion'))</div>
                            <a href='javascript:;' onClick="setCurrentItem({{ $item->id }})" class='item-offer-horizontal'>

                                <div class="quantity-btn">
                                    <div id="addToCart1">
                                        <button class="btn btn-primary" style="background : #240c52;" v-on:click='addToCartAct'> <h3>
                                          <i style="color : white;" class="las la-shopping-bag"></i>
                                          </h3></button>
                                    </div>
                                </div>
                            </a>
                          </div>

                            <div class="allergens">
                                @foreach ($item->allergens as $allergen)
                                <div class='allergen' data-toggle="tooltip" data-placement="bottom" title="{{$allergen->title}}">
                                    <img src="{{$allergen->image_link}}" />
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                  

                    @endforeach
                </div>

                <!-- PRODUCT CARD END -->


            </div>

            @endforeach
            @endif





        </div>

        <div class="row show_info">
            <div id='place-info' class='col-md-12'>
                <div class='full-width'>
                    <div class='box-info'>
                        <div class='head myTw'>
                            <h3><i class="las la-map-marker"></i>{{ __('Address') }}</h3>
                            <div class='info'>
                                <p><strong>{{ $restorant->address }}</strong></p>
                                <p>{{ $restorant->phone }}</p>
                            </div>
                        </div>
                        <div class='content'>
                            <div class='schedule-map'>
                                <div class='schedule'>
                                    <h4>Hours</h4>
                                    <ol class='items'>
                                        @foreach ($wh as $day=>$hours)
                                        <li>
                                            @if ($day==$currentDay)
                                            <div class='day'>{{ __(ucfirst($day))}}
                                                <span class='tag'>
                                                    {{ __('Today') }}
                                                </span>
                                            </div>
                                            @else
                                            <div class='day'>{{ __(ucfirst($day))}} </div>
                                            @endif
                                            @foreach ($hours as $timeRange)
                                            <div class='hours'>{{ $timeRange->start() }} - {{ $timeRange->end() }} </div>
                                            @endforeach

                                        </li>
                                        @endforeach

                                    </ol>

                                </div>
                                <div class="map">
                                    <iframe src="https://maps.google.com/maps?q={{ $restorant->lat }},{{ $restorant->lng }}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <!-- <div class='holder-right'> -->
                <!-- New cart -->
                
                <!-- End New cart -->
           <!-- </div> -->
        </div>

    </div>
</section>
</div>
    <div class='holder-right'>
                <!-- New cart -->
                @include('elegant-template::templates.side_cart',['id'=>'cartList','idtotal'=>'totalPrices'])
                <!-- End New cart -->
    </div>
</div>



        <div class="footeR" data-qa="footer">
            <div class="content">  
                <div class="sqs-layout sqs-grid-12 columns-12" data-type="page-section" id="page-section-5ee05985563b1766e4e38f2c">
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-1a0d9d71d94cde550247">
                                <div class="sqs-block-content">
                                    <h3>
                                    <?php
                                         
                                        $shop_name = explode("eshop",URL::current());
                                        if($_SERVER['HTTP_HOST'] == 'wabizz-eshop.com'){
                                            $shop_name = $shop_name[2];
                                        }
                                        else{
                                            $shop_name = $shop_name[1];
                                        } 
                                        $shop_name = str_replace("/"," ",$shop_name);
                                    ?>
                                    <p style="text-align:center;white-space:pre-wrap;" class="sqsrte-small">{{ strtoupper($shop_name)  }}</p>
                                    </h3>
                                    <?php foreach($pages_links as $page){ ?>
                                    <p style="text-align:center;white-space:pre-wrap;" class="sqsrte-small"><a href="{{ url('blog/'.$page) }}" target="_blank"><?php echo str_replace("-"," ",$page);?></a></p>
                                    <!-- <p style="text-align:center;white-space:pre-wrap;" class=""><a href="/nos-services">Nos services</a></p>
                                    <p style="text-align:center;white-space:pre-wrap;" class="sqsrte-small"><a href="/contact/garde-malade/garde-enfants/belgique">Contactez-nous</a></p>
                                    <p style="text-align:center;white-space:pre-wrap;" class="sqsrte-small"><a href="/story/garde-malade/garde-enfants/belgique">Qui sommes-nous</a></p>
                                    <p style="text-align:center;white-space:pre-wrap;" class=""><a href="/postuler-chez-nous/garde-malade/garde-enfants/belgique/aux-petits-soins">Postuler chez nous</a></p>
                                    <p style="text-align:center;white-space:pre-wrap;" class=""><a href="/rendez-vous/garde-malade/garde-enfants/aux-petits-soins">Prendre rendez-vous</a></p>
                                    <p style="text-align:center;white-space:pre-wrap;" class="">Mentions légales </p>
                                    <p style="text-align:center;white-space:pre-wrap;" class=""><a href="/commencer">Conditions générales </a></p>
                                    <p style="text-align:center;white-space:pre-wrap;" class=""><a href="/commencer">Politique de confidentialité</a> </p> -->
                                <?php } ?>
                                </div>
                            </div>
                            <div class="row sqs-row">
                                <div class="col sqs-col-4 span-4">
                                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21" id="block-yui_3_17_2_1_1592038889779_12911">
                                        <div class="sqs-block-content">&nbsp;

                                        </div>
                                    </div>
                                </div>
                                <div class="col sqs-col-3 span-3">
                                    <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21" id="block-yui_3_17_2_1_1592039073944_13369">
                                        <div class="sqs-block-content">&nbsp;

                                        </div>
                                    </div>
                                </div>
                                <div class="col sqs-col-5 span-5">
                                    <div class="row sqs-row">
                                        <div class="col sqs-col-2 span-2">
                                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21" id="block-yui_3_17_2_1_1592038889779_14199">
                                                <div class="sqs-block-content">&nbsp;

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col sqs-col-3 span-3">
                                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21" id="block-yui_3_17_2_1_1592039073944_23516">
                                                <div class="sqs-block-content">&nbsp;

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1592038889779_11104">
                                <div class="sqs-block-content"> 
                                    <p style="text-align:center;white-space:pre-wrap;" class="sqsrte-small">Tous droits réservés. Wabizz©</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php //print_r($pages_links); ?>
        </div>

<section class='section section-place-content' style="display: none;">
    <div class='packer'>
		
          
      
        <div class='packer'>
            <div id="theCartBottomButton" onClick="openNav()" class=" close-mobile-menu circle callOutShoppingButtonBottom icon icon-shape bg-gradient-red text-white rounded-circle shadow mb-4" style=" background: linear-gradient(87deg, #ffffff 0, #ffffff 100%) !important;">
              
                <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_atunf5kv.json" background="transparent" speed="0.5" style="width: 50px; height:50px;" loop autoplay></lottie-player>
          </div>
            <div class='content'>

                <!-- tab menu -->
                <!-- <div id='place-menu' class='holder-left content-tab expanded'>
                    <div class='content-left'>

                        <div class='categories'>
                            <div class='categories_title'>{{__('Categories')}}</div>
                            <nav>




                            </nav>



                            @if (count($allergens)>0)

                            <br /><br />
                            <div class='categories_title'>{{__('Allergens')}}</div>
                            <nav>

                                @foreach ( $allergens as $key => $allergen)

                                <div class='item'>
                                    <div class='allergen'>
                                        <img src="{{$allergen->image_link}}" />
                                    </div>
                                    <?php echo " " . $allergen->title ?>
                                </div>

                                @endforeach


                            </nav>

                            @endif

                        </div> 
                    </div>-->
                <!-- <div class='content-center'> -->

            </div>

            <!-- tab info -->
            <div id='place-info11' class='content-tab'>
                <div class='full-width'>
                    <div class='box-info'>
                        <div class='head'>
                            <h3 ><i class="las la-map-marker"></i>{{ __('Address') }}</h3>
                            <div class='info'>
                                <p ><strong>{{ $restorant->address }}</strong></p>
                                <p >{{ $restorant->phone }}</p>
                            </div>
                        </div>
                        <div class='content'>
                            <div class='schedule-map'>
                                <div class='schedule'>
                                    <h4>Hours</h4>
                                    <ol class='items'>
                                        @foreach ($wh as $day=>$hours)
                                        <li>
                                            @if ($day==$currentDay)
                                            <div class='day'>{{ __(ucfirst($day))}}
                                                <span class='tag'>
                                                    {{ __('Today') }}
                                                </span>
                                            </div>
                                            @else
                                            <div class='day'>{{ __(ucfirst($day))}} </div>
                                            @endif
                                            @foreach ($hours as $timeRange)
                                            <div class='hours'>{{ $timeRange->start() }} - {{ $timeRange->end() }} </div>
                                            @endforeach

                                        </li>
                                        @endforeach

                                    </ol>

                                </div>
                                <div class="map">
                                    <iframe src="https://maps.google.com/maps?q={{ $restorant->lat }},{{ $restorant->lng }}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- </div> -->




</section>

<style>
  .row.show_info {
    height: auto!important;
}
  
.footeR {
    background: #240c52;
    text-align: center;
    padding: 30px 0;
    color: yellow;
}

.footeR h3 {
    color: #fff;
  font-weight: bold;
}
  
  .footeR a{
    color: yellow;
    text-decoration: underline;
  }
  
.footeR h3{
  margin-bottom: 16px;
}
  
  
#infoModal .box-info > .head > h3 {
    height: 50px;
    background: #ffbb00;
    margin: 0;
    line-height: 2.8;
}

#infoModal .box-info > .head {
    height: auto!important;
    background: #f8f5f2;
    padding: 0;
}

#infoModal .box-info > .head > h3,#infoModal .box-info > .head > h3+ .info {
    padding-left: 8px;
}
.full-width .box-info > .head {
    display: none;
}
div#infoModal {
    overflow: hidden!important;
  background: rgba(0,0,0,.5);
}
</style>
<!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

// Swiper JS Code
    var swiper = new Swiper(".mySwiper", {
        // modules: [ Pagination, Scrollbar],
        slidesPerView: 4,
        loop: false,
        mousewheel: {
            invert: true,
        },
        navigation: {
            prevEl: ".swiper-button-prev",
            nextEl: ".swiper-button-next",
          
        },
        breakpoints: {
          240: {
            slidesPerView: 4,
          },
          768: {
            slidesPerView: 6,
          },
          1024: {
            slidesPerView: 11,
          },
            setup() {
                const onSwiper = (swiper) => {
                    console.log(swiper);
                };
                const onSlideChange = () => {
                    console.log('slide change');
                };
                swiper.on('slideChange', function () {
                    console.log('slide changed');
                });
                return {
                    onSwiper,
                    onSlideChange,
                };
            },
        },
       
    });


    function forward(){
        // swiper.slideToClosest(100, false);
        // console.log("slided forward")
    }
    function backward(){
        // swiper.slidePrev(100, false);
        // console.log("backward called")
    }
    swiper.on('slideChange', function ({realIndex:r,previousIndex:p}) {
        if(r-p==1){
            forward();
        }
        else{
            back();
        }
    });

    
  $(".nav-link").click(function(event){
    $(".nav-link").removeClass("active");
    // event.target.addClass("active");
    $(this).addClass("active");
    

  });





  $(document).ready(function(){

    $(".nav-link").removeClass("active");
    $(' .mySwiper .nav-item > a[href*="subsection"]:first').addClass("active");
    $(".custom--cart").text("Checkout");
  });

    var lastId,
    // topMenu = $("#top-menu"),
    topMenu = $(".mySwiper"),
    topMenuHeight = topMenu.outerHeight()+15,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });
    
    // menuItems.click(function(e){
    //     var href = $(this).attr("href"),
    //         offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
    //     $('html, body').stop().animate({ 
    //         scrollTop: offsetTop
    //     }, 300);
    //     e.preventDefault();
    // });


    var lastScrollTop = 0;
    // Bind to scroll
    $(window).scroll(function(){

    // Get container scroll position
    var fromTop = $(this).scrollTop()+topMenuHeight;
    // console.log("fromTop",fromTop);
    // console.log("lastScrollTop",lastScrollTop);
    if (fromTop > lastScrollTop){
        // forward();
    } else {
        // backward();
    }
    lastScrollTop = fromTop;

    // Get id of current scroll item
    var cur = scrollItems.map(function(){
        if ($(this).offset().top < fromTop)
        return this;
    });
        //    console.log("curr",cur);
    // Get the id of the current element
    cur = cur[cur.length-1];
    var id = cur && cur.length ? cur[0].id : "";
    // console.log("menuItems",menuItems);
    // console.log("menuItems.parent",menuItems.parent());
    if (lastId !== id) {
        lastId = id;
        menuItems.removeClass("active");
        menuItems.filter("a[href='#"+id+"']").addClass("active");
        // console.log("swiper object",swiper);
        
        var slide_no =  menuItems.filter("a[href='#"+id+"']").parent().attr("aria-label");
        if(slide_no){
            slide_no = slide_no.split("/");
        }
        var active_slide = slide_no[0];
        var next_slide = slide_no[1];
        

        
        
    }                   
    });






    

$("#infoBtn").click(function(){
  $("#infoModal").css("display","block");
  $("#infoModal").addClass("show");
  $(".tablinks").removeClass("active");
  $("#review").css("display","none");
  $("#infoOpen").addClass("active");
  $("#info").css("display","block");
  $("body").css("overflow-y","hidden");
  $("body").css("height","100vh");
  $(".content-wrapper").css("display","none");
})


$("#reviewBtn").click(function(){
  $("#infoModal").css("display","block");
  $("#infoModal").addClass("show");
  $(".tablinks").removeClass("active");
  $("#info").css("display","none");
  $("#defaultOpen").addClass("active");
  $("#review").css("display","block");
  $("body").css("overflow-y","hidden");
  $("body").css("height","100vh");
  $(".content-wrapper").css("display","none");
})

$("#closeInfo").click(function(){
  $("#infoModal").css("display","none");
  $("#infoModal").removeClass("show");
  $("body").css("overflow-y","auto");
  $("body").css("height","auto");
  $(".content-wrapper").css("display","flex");
})



// Color Changing script
// $(document).ready(function(){
//      $("#bg").change(function(){
//         $("#full").css("background-color",$("#bg").val());
//     });
// });
// onchange="javascript:document.getElementById('full').style.backgroundColor=document.getElementById('bg2').value;"
var style_color = '';
$(document).ready(function(){
    
    $("#bg").change(function(){

    });
    
    
        

});

    var token = '<?php echo csrf_token(); ?>';

    // var parent = document.querySelector('#parent');
    var picker = new Picker(parent);

    
    // picker.onDone = function(color) {
        
    //     var style_color = color.hex;

    //     if(style_color){
        
    //         $(".myCoul").attr("style", "color: "+style_color+" !important;");
            
    //         $.ajax({
    //             type:'POST',
    //             url:'/save-heading-color/<?php echo $restorant->id;?>',
    //             headers: {
    //                 'X-CSRF-TOKEN': token
    //             },
    //             data:{color:style_color,restaurant_id:<?php echo $restorant->id;?>,element_class:'myCoul'},
    //             success:function(data) {
    //                 // console.log("inside success");
    //             },
    //             complete:function(data){
    //                 // console.log("data.status",data.status);
    //                 if(data.status == 200){
    //                     // $(".myCoul").style.setProperty( 'color', 'green', 'important' );
    //                     // window.location.reload();
    //                     // console.log("style color","'+style_color+'");
    //                     // $(".myCoul").removeClass("myCoul");
    //                     // $(".myTit").attr("style",'color: '+style_color+' !important ');
    //                     // $('.myCoul').css('color',style_color);  
    //                 }
    //                 // console.log("the complete",data.status);
    //             }
    //         });
        
    //     }


    // };

    /* onDone is similar to onChange, but only called when you click 'Ok' */
</script>