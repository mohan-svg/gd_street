<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css">
<style>
    #owl-demo .item {
        background: #fff;
        padding: 30px 0px;
        margin: 10px;
        color: black;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
    }
    
    .customNavigation {
        text-align: center;
    }
    
    //use styles below to disable ugly selection
    .customNavigation a {
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }
    
    .blog-entry .text {
        position: relative;
        border-top: 0;
        border-radius: 2px;
        width: 328px !important;
    }
    
    #owl-demo .item {
        width: max-content;
    } 

    @media only screen and (max-width: 400px) {
  .owl-item {
    width: inherit !important;
  }
}



</style>

<section class="hero-wrap hero-wrap-2" style="background-image: url(<?php echo base_url('images/bg_1.jpg')?>);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">University News</h1>
                <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span><span>News<i class="ion-ios-arrow-forward"></i></span></p> -->
            </div>
        </div>
    </div>
</section>

<body id="bg">
    <section>
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4" style="padding-top:10px;"><span>Universities</span> News</h2>

                </div>
                <div></div>
                <div class="card " style="box-shadow: 0 4px 6px -2px #d5d0c0;margin:1em 1em 1em 1em;">
                    <p style="text-align: left;"> <b>Posted on:</b>
                        <?php echo date("d-F-Y",strtotime($snews[0]['posting_date']));  ?>
                    </p>
                    <img class="card-img-top" src="<?php echo base_url('imgg/news/'.$snews[0]['news_image'])?>" alt="Card image cap">
                    <div class="card-body">
                        <div class="text bg-white p-4">
                            <h4 class="heading"><a href="#"><?php echo $snews[0]['news_title']; ?></a></h4>
                            <p>
                                <?php echo $snews[0]['content']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Related</span> News</h2>
                    <!-- <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p> -->
                </div>
            </div>

            <div id="owl-demo" class="owl-carousel owl-theme">
                <?php
                                  foreach($news as $key => $val){ ?>

                    <div class="item blog-entry " >
                        <a href="#" class="block-20 d-flex align-items-end" style="background-image: url(<?php echo base_url('imgg/news/'.$val['news_image'])?>);">
                            <div class="meta-date text-center p-2">

                                <span class="day"><?php echo date("d",strtotime($val['posting_date']));  ?></span>
                                <span class="mos"><?php echo date("M", mktime(0, 0, 0, date("m",strtotime($val['posting_date'])), 10));  ?></span>
                                <span class="yr"><?php echo date("Y",strtotime($val['posting_date']));  ?></span>
                            </div>
                        </a>

                        <div class="text bg-white">
                            <h4><a href="<?php echo base_url('newscontent/'.$val['news_id'])?>"><?php echo $val['news_title']; ?></a></h4>
                            <p style="text-align: justify; color: #666666;">
                                <?php echo substr($val['content'],0,200) ; ?>...
                            </p>
                            <div class="d-flex align-items-center ">
                                <p class="mb-0"><a href="<?php echo base_url('newscontent/'.$val['news_id'])?>" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>

                            </div>
                        </div>

                    </div>

                    <?php }
                                  ?>

            </div>
            <ul style="list-style-type: none;
  margin: 0;
  padding: 0;">
                <li style="float:left;">
                    <h1 style="text-align:left;"><span class="ion-ios-arrow-round-back"></span></h1></li>
                <li style="float:right;">
                    <h1 style="text-align:right;"><span class="ion-ios-arrow-round-forward"></span></h1></li>
            </ul>
            <!-- owl theme id close -->

        </div>
    </section>

    <script src="<?php echo base_url('js/jquery.min.js')?>"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>

    <script>
        $(document).ready(function() {

            var owl = $("#owl-demo");

            owl.owlCarousel({
                items: 3, //10 items above 1000px browser width
                itemsDesktop: [1000, 1], //5 items between 1000px and 901px
                itemsDesktopSmall: [900, 1], // betweem 900px and 601px
                itemsTablet: [800, 1], //2 items between 600 and 0
                itemsMobile: [600, 1],
                autoPlay: true,
                stopOnHover: true, // itemsMobile disabled - inherit from itemsTablet option
            });
            // Custom Navigation Events

        });
    </script>