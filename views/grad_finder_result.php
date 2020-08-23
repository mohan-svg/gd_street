<style>
    h4>ol>li {
        padding-bottom: 8px;
    }
    
    .label-sm {
        font-size: .7em;
        padding: .2em .5em;
        line-height: 1.5em;
    }
    
    .row-alt-striped:nth-child(even) {
        background-color: #efefef;
    }
    
    #stickyTable,
    #stickyTable * {
        box-sizing: border-box;
    }
    
    @media(max-width: 978px) {
        .tc {
            text-align: center;
        }
        .ts {
            font-size: 21px;
        }
        .tj {
            text-align: justify;
            font-size: 17px;
        }
    }
</style>

<!-- header END -->
<section class="hero-wrap hero-wrap-2" style="background-image: url(<?php echo base_url('images/bg_1.jpg');?>);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Apply</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Apply<i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<!--Applications-->
<div class="container" style="padding-top:20px;">
    <div class="row application" style="margin-left:15px;margin-right:15px;">
        <h1 class="tc ts">
          <strong >Our Suggested Universities</strong><br>
        </h1>

        <h3 class="tj" style="padding-bottom: 20px;">Have a look at our suggested universities based on your provided scores, It is solely to give you an idea which universities you should apply at. 
        </h3>
        <br />
        <br />
        <br />

        <div style="background-color: rgb(255, 255, 255); font-weight: bold; border-bottom: 2px solid rgb(221, 221, 221); margin: 0px; padding: 0px; position: relative; transform: none; left: 0px; top: 0px; width: 100%;" class="row hidden-xs hidden-sm js-sticky-header" data-wrapper="#stickyTable" data-is-fixed="0">
            <div class="row col-md-12">
                <div class="col-sm-5 col-md-5 tc" style="padding: .5em .8em;">Universities</div>
                <div class="col-sm-6 col-md-6" style="padding: .5em .8em; text-align: center;">Avg. Profile of admits</div>
            </div>
        </div>
        <!--sticky table-->

        <?php
        if(count($result)==0){
          ?>

            <div class="row row-alt-striped" style="margin: 0; padding: .5em; border-radius: 5px;">
                <div class="col-sm-12 col-md-5" style="padding: 1em; margin: 0;">

                    <h2>No Record Found</h2>

                </div>
            </div>
            <!--row row-alt-striped-->

            <?php
		}

if($this->session->userdata('logged_in')=='true'){ 

            $this->db->where('stud_id',$this->session->userdata('id'));
            $query = $this->db->get('student_details')->row_array();

            $univ_arr = explode (",", $query['submited_university']);  
         //   print_r($univ_arr);   ?>

                <div class="col-md-12 col-xs-12 col-lg-12">

                    <button class="btn-sm btn-success">Safe Universities</button>
                    <button class="btn-sm btn-warning">Moderate Universities</button>
                    <button class="btn-sm btn-danger">Ambitious Universities</button>

                </div>

                <?php
    	//Safe Universities

      //echo 'course:'. $grad_data['course'] .' verbal:'. $grad_data['gre_verbal'].'  Quants:'.$grad_data['gre_quants'].' '.$grad_data['eng_test'].': '.$grad_data['eng_test_score'].' UG:'. $grad_data['ug_score'] ;

              foreach($result as $key => $val){

                $val_verbal = (int)$val['verbal_score'];
                $val_quants = (int)$val['quants_score'];
                $val_toefl = (int)$val['toefl_score'];
                $val_ielts = (float)$val['ielts_score'];  
                $val_ug = (float)$val['gpa']; 

                $gre_verbal = $grad_data['gre_verbal']-$val_verbal;
                $gre_quants = $grad_data['gre_quants']-$val_quants;

                if($grad_data['eng_test']=='toefl'){

                    $toefl = $grad_data['eng_test_score']-$val_toefl;

                } else if($grad_data['eng_test']=='ielts'){

                        $toefl = $grad_data['eng_test_score']-$val_ielts;

                }

                $ug = $grad_data['ug_score'] - $val_ug;  

               //echo '<br>'.'verbal:'. $gre_verbal.'  Quants:'.$gre_quants.' '.$grad_data['eng_test'].':'.$toefl.' UG:'.$ug ;

                ?>

                    <?php

                if((strtolower($grad_data['course'])==strtolower($val['c_name']))&&(($gre_verbal>=0)||($gre_verbal>=-5))&&($gre_quants>=0||$gre_quants>=-5)&&($toefl>=0)&&($ug>=-1)){

          ?>

                        <div class="row row-alt-striped col-lg-12" style="margin: 0; padding: .5em; border-radius: 5px;">

                            <div class="col-sm-12 col-md-4" style="padding: 1em; margin: 0; border-left:8px solid green; ">
                                <div style="padding: .5em 0 .8em;">
                                    <div style="font-size: 1.5em;" class="tc">
                                        <?php echo $val['u_name'];?>
                                    </div>
                                    <div class="tc">
                                        <?php echo $val['u_address'];?>
                                    </div>
                                    <div class="tc">
                                        <?php echo $val['c_name'];?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                                <div style="padding-top: .5em;" class="text-bold">
                                    GRE </div>
                                <br>
                                <?php 
                        if($val['gre_score']=='0'){

                        	echo "NA";

                        }
                        else{
                        	echo $val['gre_score'];
                        }
                          ?>

                            </div>
                            <div class="col-md-2 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                                <div style="padding-top: .5em;" class="text-bold">

                                    <?php      if($grad_data['eng_test']=='toefl'){ ?>

                                        TOEFL </div>
                                <br>
                                <?php echo $val['toefl_score'];?>

                                    <?php  } else if($grad_data['eng_test']=='ielts'){ ?>

                                        IELTS </div>
                            <br>
                            <?php echo $val['ielts_score'];?>

                                <?php     } ?>

                        </div>

                        <div class="col-md-1 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                            <div style="padding-top: .5em;" class="text-bold">
                                UG Score </div>
                            <br>
                            <?php echo $val['gpa'];?>

                        </div>

                        <div class="col-md-2 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">

                            <div style="padding-top: .5em;" class="text-bold">
                                Work Exp </div>
                            <br> 12 Months
                            <!-- <?php echo $val['c_name'];?> -->

                        </div>

                        <?php 

                $counter = 0;

               foreach($univ_arr as $key=>$univ){ 

                  if($univ_arr[$key]==$val['u_id']){ 

                        $counter++;

                   } //if()
                }//foreach()

               if($counter>0){ 

                   // echo "Counter::: ". $counter ;

                ?>

                            <div class="col-md-2 col-xs-12 col-sm-12 text-right" style="padding: 1em; margin: 0;">
                                <br>
                                <a href="#" class="btn btn-block btn-warning text-uppercase" style="border-radius: 0px !important;">
                    Applied
                    &nbsp;
                    <i class="fa fa-angle-right"></i>
                    </a>
                                <div class="text-center text-success" style="font-size: 1.05em; padding: .2em 0; ">
                                    <!-- (You saved $
                                    <?php echo ($process_fees+$sop_fees+$doc_fees+$app_fee); ?>) -->
                                </div>
                            </div>

                            <?php } else{   
     //checking for counter incremented or not
            ?>
                                <div class="col-md-2 col-xs-12 col-sm-12 text-right" style="padding: 1em; margin: 0;">
                                    <br>
                                    <a href="<?php echo site_url('university/apply/'.$val['u_id']);?>" class="btn btn-block btn-success text-uppercase" style="border-radius: 0px !important;">
                    Apply
                    &nbsp;
                    <i class="fa fa-angle-right"></i>
                    </a>
                                    <div class="text-center text-success" style="font-size: 1.05em; padding: .2em 0; ">
                                        <!-- (You save $
                                        <?php echo ($process_fees+$sop_fees+$doc_fees+$app_fee); ?>) -->
                                    </div>
                                </div>

                                <?php } //else counter ?>

    </div>
    <!--row row-alt-striped-->

    <?php

                }//if (course == c_name && toefl>=0 && gre_quants>=0) 

    ?>

        <?php

        //Moderate Universities

              if((strtolower($grad_data['course'])==strtolower($val['c_name']))&&($gre_verbal>-15 && $gre_verbal<-5)&&($gre_quants>-15 && $gre_verbal<-5)&&($toefl>=0 || $toefl<0)||($ug>-4 && $ug<-1)){

          ?>

            <div class="row row-alt-striped col-lg-12" style="margin: 0; padding: .5em; border-radius: 5px;">

                <div class="col-sm-12 col-md-4" style="padding: 1em; margin: 0; border-left:8px solid orange; ">
                    <div style="padding: .5em 0 .8em;">
                        <div style="font-size: 1.5em;" class="tc">
                            <?php echo $val['u_name'];?>
                        </div>
                        <div class="tc">
                            <?php echo $val['u_address'];?>
                        </div>
                        <div class="tc">
                            <?php echo $val['c_name'];?>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                    <div style="padding-top: .5em;" class="text-bold">
                        GRE </div>
                    <br>
                    <?php 
                        if($val['gre_score']=='0'){

                        	echo "NA";

                        }
                        else{
                        	echo $val['gre_score'];
                        }
                          ?>

                </div>
                <div class="col-md-2 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                    <div style="padding-top: .5em;" class="text-bold">

                        <?php      if($grad_data['eng_test']=='toefl'){ ?>

                            TOEFL </div>
                    <br>
                    <?php echo $val['toefl_score'];?>

                        <?php  } else if($grad_data['eng_test']=='ielts'){ ?>

                            IELTS </div>
                <br>
                <?php echo $val['ielts_score'];?>

                    <?php     } ?>

            </div>

            <div class="col-md-1 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                <div style="padding-top: .5em;" class="text-bold">
                    UG Score </div>
                <br>
                <?php echo $val['gpa'];?>

            </div>

            <div class="col-md-2 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">

                <div style="padding-top: .5em;" class="text-bold">
                    Work Exp </div>
                <br> 12 Months
                <!-- <?php echo $val['c_name'];?> -->

            </div>

            <?php 

                $counter = 0;

               foreach($univ_arr as $key=>$univ){ 

                  if($univ_arr[$key]==$val['u_id']){ 

                        $counter++;

                   } //if()
                }//foreach()

               if($counter>0){ 

                   // echo "Counter::: ". $counter ;

                ?>

                <div class="col-md-2 col-xs-12 col-sm-12 text-right" style="padding: 1em; margin: 0;">
                    <br>
                    <a href="#" class="btn btn-block btn-warning text-uppercase" style="border-radius: 0px !important;">
                    Applied
                    &nbsp;
                    <i class="fa fa-angle-right"></i>
                    </a>
                    <div class="text-center text-success" style="font-size: 1.05em; padding: .2em 0; ">
                        <!-- (You saved $
                        <?php echo ($process_fees+$sop_fees+$doc_fees+$app_fee); ?>) -->
                    </div>
                </div>

                <?php } else{   
     //checking for counter incremented or not
            ?>
                    <div class="col-md-2 col-xs-12 col-sm-12 text-right" style="padding: 1em; margin: 0;">
                        <br>
                        <a href="<?php echo site_url('university/apply/'.$val['u_id']);?>" class="btn btn-block btn-success text-uppercase" style="border-radius: 0px !important;">
                    Apply
                    &nbsp;
                    <i class="fa fa-angle-right"></i>
                    </a>
                        <div class="text-center text-success" style="font-size: 1.05em; padding: .2em 0; ">
                           <!--  (You save $
                            <?php echo ($process_fees+$sop_fees+$doc_fees+$app_fee); ?>) -->
                        </div>
                    </div>

                    <?php } //else counter ?>

</div>
<!--row row-alt-striped-->

<?php

                }//if of course == c_name  (moderate Universities)

    ?>

    <?php
           //Ambititious Universities

                if((strtolower($grad_data['course'])==strtolower($val['c_name']))&&($gre_verbal<-15)&&($gre_verbal<-15)&&($toefl<0 || $toefl>=0)&&($ug>=0 || $ug<0)){

          ?>

        <div class="row row-alt-striped col-lg-12" style="margin: 0; padding: .5em; border-radius: 5px;">

            <div class="col-sm-12 col-md-4" style="padding: 1em; margin: 0; border-left:8px solid red; ">
                <div style="padding: .5em 0 .8em;">
                    <div style="font-size: 1.5em;" class="tc">
                        <?php echo $val['u_name'];?>
                    </div>
                    <div class="tc">
                        <?php echo $val['u_address'];?>
                    </div>
                    <div class="tc">
                        <?php echo $val['c_name'];?>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                <div style="padding-top: .5em;" class="text-bold">
                    GRE </div>
                <br>
                <?php 
                        if($val['gre_score']=='0'){

                        	echo "NA";

                        }
                        else{
                        	echo $val['gre_score'];
                        }
                          ?>

            </div>
            <div class="col-md-2 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                <div style="padding-top: .5em;" class="text-bold">

                    <?php      if($grad_data['eng_test']=='toefl'){ ?>

                        TOEFL </div>
                <br>
                <?php echo $val['toefl_score'];?>

                    <?php  } else if($grad_data['eng_test']=='ielts'){ ?>

                        IELTS </div>
            <br>
            <?php echo $val['ielts_score'];?>

                <?php     } ?>

        </div>

        <div class="col-md-1 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
            <div style="padding-top: .5em;" class="text-bold">
                UG Score </div>
            <br>
            <?php echo $val['gpa'];?>

        </div>

        <div class="col-md-2 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">

            <div style="padding-top: .5em;" class="text-bold">
                Work Exp </div>
            <br> 12 Months
            <!-- <?php echo $val['c_name'];?> -->

        </div>

        <?php 

                $counter = 0;

               foreach($univ_arr as $key=>$univ){ 

                  if($univ_arr[$key]==$val['u_id']){ 

                        $counter++;

                   } //if()
                }//foreach()

               if($counter>0){ 

                   // echo "Counter::: ". $counter ;

                ?>

            <div class="col-md-2 col-xs-12 col-sm-12 text-right" style="padding: 1em; margin: 0;">
                <br>
                <a href="#" class="btn btn-block btn-warning text-uppercase" style="border-radius: 0px !important;">
                    Applied
                    &nbsp;
                    <i class="fa fa-angle-right"></i>
                    </a>
                <div class="text-center text-success" style="font-size: 1.05em; padding: .2em 0; ">
                    <!-- (You saved $
                    <?php echo ($process_fees+$sop_fees+$doc_fees+$app_fee); ?>) -->
                </div>
            </div>

            <?php } else{   
     //checking for counter incremented or not
            ?>
                <div class="col-md-2 col-xs-12 col-sm-12 text-right" style="padding: 1em; margin: 0;">
                    <br>
                    <a href="<?php echo site_url('university/apply/'.$val['u_id']);?>" class="btn btn-block btn-success text-uppercase" style="border-radius: 0px !important;">
                    Apply
                    &nbsp;
                    <i class="fa fa-angle-right"></i>
                    </a>
                    <div class="text-center text-success" style="font-size: 1.05em; padding: .2em 0; ">
                        <!-- (You save $
                        <?php echo ($process_fees+$sop_fees+$doc_fees+$app_fee); ?>) -->
                    </div>
                </div>

                <?php } //else counter ?>

                    </div>
                    <!--row row-alt-striped-->

                    <?php

       }//else of course == c_name 

    ?>

                        <?php

        }// foreach()

    // if (loggedin == true)    
    ?>

                            <?php 

       } else{
//if(logged_in==true)  ?>

                                <div class="col-md-12 col-xs-12 col-lg-12">

                                    <button class="btn-sm btn-success">Safe Universities</button>
                                    <button class="btn-sm btn-warning">Moderate Universities</button>
                                    <button class="btn-sm btn-danger">Ambitious Universities</button>

                                </div>

                                <?php
    	//Safe Universities

      echo 'course:'. $grad_data['course'] .' verbal:'. $grad_data['gre_verbal'].'  Quants:'.$grad_data['gre_quants'].' '.$grad_data['eng_test'].': '.$grad_data['eng_test_score'].' UG:'. $grad_data['ug_score'] ;

              foreach($result as $key => $val){

                $val_verbal = (int)$val['verbal_score'];
                $val_quants = (int)$val['quants_score'];
                $val_toefl = (int)$val['toefl_score'];
                $val_ielts = (float)$val['ielts_score'];  
                $val_ug = (float)$val['gpa']; 

                $gre_verbal = $grad_data['gre_verbal']-$val_verbal;
                $gre_quants = $grad_data['gre_quants']-$val_quants;

                if($grad_data['eng_test']=='toefl'){

                    $toefl = $grad_data['eng_test_score']-$val_toefl;

                } else if($grad_data['eng_test']=='ielts'){

                        $toefl = $grad_data['eng_test_score']-$val_ielts;

                }

                $ug = $grad_data['ug_score'] - $val_ug;  

               //echo '<br>'.'verbal:'. $gre_verbal.'  Quants:'.$gre_quants.' '.$grad_data['eng_test'].':'.$toefl.' UG:'.$ug ;

                ?>

                                    <?php

                if((strtolower($grad_data['course'])==strtolower($val['c_name']))&&(($gre_verbal>=0)||($gre_verbal>=-5))&&($gre_quants>=0||$gre_quants>=-5)&&($toefl>=0)&&($ug>=-1)){

          ?>

                                        <div class="row row-alt-striped col-lg-12" style="margin: 0; padding: .5em; border-radius: 5px;">

                                            <div class="col-sm-12 col-md-4" style="padding: 1em; margin: 0; border-left:8px solid green; ">
                                                <div style="padding: .5em 0 .8em;">
                                                    <div style="font-size: 1.5em;" class="tc">
                                                        <?php echo $val['u_name'];?>
                                                    </div>
                                                    <div class="tc">
                                                        <?php echo $val['u_address'];?>
                                                    </div>
                                                    <div class="tc">
                                                        <?php echo $val['c_name'];?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                                                <div style="padding-top: .5em;" class="text-bold">
                                                    GRE </div>
                                                <br>
                                                <?php 
                        if($val['gre_score']=='0'){

                        	echo "NA";

                        }
                        else{
                        	echo $val['gre_score'];
                        }
                          ?>

                                            </div>
                                            <div class="col-md-2 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                                                <div style="padding-top: .5em;" class="text-bold">

                                                    <?php      if($grad_data['eng_test']=='toefl'){ ?>

                                                        TOEFL </div>
                                                <br>
                                                <?php echo $val['toefl_score'];?>

                                                    <?php  } else if($grad_data['eng_test']=='ielts'){ ?>

                                                        IELTS </div>
                                            <br>
                                            <?php echo $val['ielts_score'];?>

                                                <?php     } ?>

                                        </div>

                                        <div class="col-md-1 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                                            <div style="padding-top: .5em;" class="text-bold">
                                                UG Score </div>
                                            <br>
                                            <?php echo $val['gpa'];?>

                                        </div>

                                        <div class="col-md-2 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">

                                            <div style="padding-top: .5em;" class="text-bold">
                                                Work Exp </div>
                                            <br> 12 Months
                                            <!-- <?php echo $val['c_name'];?> -->

                                        </div>

                                        <div class="col-md-2 col-xs-12 col-sm-12 text-right" style="padding: 1em; margin: 0;">
                                            <br>
                                            <a href="<?php echo site_url('university/apply/'.$val['u_id']);?>" class="btn btn-block btn-success text-uppercase" style="border-radius: 0px !important;">
                    Apply
                    &nbsp;
                    <i class="fa fa-angle-right"></i>
                    </a>
                                            <div class="text-center text-success" style="font-size: 1.05em; padding: .2em 0; ">
                                                <!-- (You save $<?php echo ($process_fees+$sop_fees+$doc_fees+$app_fee); ?>) -->
                                            </div>
                                        </div>

                                        </div>
                                        <!--row row-alt-striped-->

                                        <?php

                }//if (course == c_name && toefl>=0 && gre_quants>=0) 

    ?>

                                            <?php

        //Moderate Universities

               if((strtolower($grad_data['course'])==strtolower($val['c_name']))&&($gre_verbal>-15 && $gre_verbal<-5)&&($gre_quants>-15 && $gre_verbal<-5)&&($toefl>=0 || $toefl<0)||($ug>-4 && $ug<-1)){

          ?>

                                                <div class="row row-alt-striped col-lg-12" style="margin: 0; padding: .5em; border-radius: 5px;">

                                                    <div class="col-sm-12 col-md-4" style="padding: 1em; margin: 0; border-left:8px solid orange; ">
                                                        <div style="padding: .5em 0 .8em;">
                                                            <div style="font-size: 1.5em;" class="tc">
                                                                <?php echo $val['u_name'];?>
                                                            </div>
                                                            <div class="tc">
                                                                <?php echo $val['u_address'];?>
                                                            </div>
                                                            <div class="tc">
                                                                <?php echo $val['c_name'];?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                                                        <div style="padding-top: .5em;" class="text-bold">
                                                            GRE </div>
                                                        <br>
                                                        <?php 
                        if($val['gre_score']=='0'){

                        	echo "NA";

                        }
                        else{
                        	echo $val['gre_score'];
                        }
                          ?>

                                                    </div>
                                                    <div class="col-md-2 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                                                        <div style="padding-top: .5em;" class="text-bold">

                                                            <?php      if($grad_data['eng_test']=='toefl'){ ?>

                                                                TOEFL </div>
                                                        <br>
                                                        <?php echo $val['toefl_score'];?>

                                                            <?php  } else if($grad_data['eng_test']=='ielts'){ ?>

                                                                IELTS </div>
                                                    <br>
                                                    <?php echo $val['ielts_score'];?>

                                                        <?php     } ?>

                                                </div>

                                                <div class="col-md-1 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                                                    <div style="padding-top: .5em;" class="text-bold">
                                                        UG Score </div>
                                                    <br>
                                                    <?php echo $val['gpa'];?>

                                                </div>

                                                <div class="col-md-2 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">

                                                    <div style="padding-top: .5em;" class="text-bold">
                                                        Work Exp </div>
                                                    <br> 12 Months
                                                    <!-- <?php echo $val['c_name'];?> -->

                                                </div>

                                                <div class="col-md-2 col-xs-12 col-sm-12 text-right" style="padding: 1em; margin: 0;">
                                                    <br>
                                                    <a href="<?php echo site_url('university/apply/'.$val['u_id']);?>" class="btn btn-block btn-success text-uppercase" style="border-radius: 0px !important;">
                    Apply
                    &nbsp;
                    <i class="fa fa-angle-right"></i>
                    </a>
                                                    <div class="text-center text-success" style="font-size: 1.05em; padding: .2em 0; ">
                                                        <!-- (You save $<?php echo ($process_fees+$sop_fees+$doc_fees+$app_fee); ?>) -->
                                                    </div>
                                                </div>

                                                </div>
                                                <!--row row-alt-striped-->

                                                <?php

                }//if of course == c_name  (moderate Universities)

    ?>

                                                    <?php
           //Ambititious Universities

               if((strtolower($grad_data['course'])==strtolower($val['c_name']))&&($gre_verbal<-15)&&($gre_verbal<-15)&&($toefl<0 || $toefl>=0)&&($ug>=0 || $ug<0)){

          ?>

                                                        <div class="row row-alt-striped col-lg-12" style="margin: 0; padding: .5em; border-radius: 5px;">

                                                            <div class="col-sm-12 col-md-4" style="padding: 1em; margin: 0; border-left:8px solid red; ">
                                                                <div style="padding: .5em 0 .8em;">
                                                                    <div style="font-size: 1.5em;" class="tc">
                                                                        <?php echo $val['u_name'];?>
                                                                    </div>
                                                                    <div class="tc">
                                                                        <?php echo $val['u_address'];?>
                                                                    </div>
                                                                    <div class="tc">
                                                                        <?php echo $val['c_name'];?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                                                                <div style="padding-top: .5em;" class="text-bold">
                                                                    GRE </div>
                                                                <br>
                                                                <?php 
                        if($val['gre_score']=='0'){

                        	echo "NA";

                        }
                        else{
                        	echo $val['gre_score'];
                        }
                          ?>

                                                            </div>
                                                            <div class="col-md-2 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                                                                <div style="padding-top: .5em;" class="text-bold">

                                                                    <?php      if($grad_data['eng_test']=='toefl'){ ?>

                                                                        TOEFL </div>
                                                                <br>
                                                                <?php echo $val['toefl_score'];?>

                                                                    <?php  } else if($grad_data['eng_test']=='ielts'){ ?>

                                                                        IELTS </div>
                                                            <br>
                                                            <?php echo $val['ielts_score'];?>

                                                                <?php     } ?>

                                                        </div>

                                                        <div class="col-md-1 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">
                                                            <div style="padding-top: .5em;" class="text-bold">
                                                                UG Score </div>
                                                            <br>
                                                            <?php echo $val['gpa'];?>

                                                        </div>

                                                        <div class="col-md-2 col-xs-3 col-sm-3 text-center" style="padding: .5em; margin: 0;">

                                                            <div style="padding-top: .5em;" class="text-bold">
                                                                Work Exp </div>
                                                            <br> 12 Months
                                                            <!-- <?php echo $val['c_name'];?> -->

                                                        </div>

                                                        <div class="col-md-2 col-xs-12 col-sm-12 text-right" style="padding: 1em; margin: 0;">
                                                            <br>
                                                            <a href="<?php echo site_url('university/apply/'.$val['u_id']);?>" class="btn btn-block btn-success text-uppercase" style="border-radius: 0px !important;">
                    Apply
                    &nbsp;
                    <i class="fa fa-angle-right"></i>
                    </a>
                                                            <div class="text-center text-success" style="font-size: 1.05em; padding: .2em 0; ">
                                                                <!-- (You save $<?php echo ($process_fees+$sop_fees+$doc_fees+$app_fee); ?>) -->
                                                            </div>
                                                        </div>

                                                        </div>
                                                        <!--row row-alt-striped-->

                                                        <?php

                }//else of course == c_name 

    ?>

                                                            <?php

        }// foreach()

    } //else of if (loggedin == true)    
    ?>

                                                                </div>
                                                                <!--row application-->
                                                                </div>
                                                                <!---container-->
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <!--     <br>
    <br>
    </div>
    </div> -->
                                                                <!--End-->

                                                                <script src="<?php echo base_url('js/jquery.min.js')?>"></script>