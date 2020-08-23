<style type="text/css">
body {
  font-family: 'Roboto', sans-serif;
  font-size: 14px;
  line-height: 18px;
  background: #f4f4f4;
}

.list-wrapper {
  padding: 15px;
  overflow: hidden;
}

.list-item {
  border: 1px solid #EEE;
  background: #FFF;
  margin-bottom: 10px;
  padding: 10px;
  box-shadow: 0px 0px 10px 0px #EEE;
}

.list-item h4 {
  color: #FF7182;
  font-size: 18px;
  margin: 0 0 5px;  
}

.list-item p {
  margin: 0;
}

.simple-pagination ul {
  margin: 0 0 20px;
  padding: 0;
  list-style: none;
  text-align: center;
}

.simple-pagination li {
  display: inline-block;
  margin-right: 5px;
}

.simple-pagination li a,
.simple-pagination li span {
  color: #666;
  padding: 5px 10px;
  text-decoration: none;
  border: 1px solid #EEE;
  background-color: #FFF;
  box-shadow: 0px 0px 10px 0px #EEE;
}

.simple-pagination .current {
  color: #FFF;
  background-color: #fd5f00;
  border-color: #fd5f00;
}

.simple-pagination .prev.current,
.simple-pagination .next.current {
  background: #fd5f00;
}


.header_ul{
      font-size: 16px;

    line-height: 1.8;

    font-weight: 400;
}



/* Auto complete*/

.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}



</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url('js/pagination_js/jquery.simplePagination.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/autocomplete.js')?>"></script>

<section id="login">
        
        <div class="container">
            <div class="intro-text">
              <h3>Apply through GradStreet for fast and smooth process</h3>
              <p>MS in US University Just One Step to go</p>
              <a href="<?php echo site_url('university')?>" class="btn-get-started">Apply Now</a>      

            </div> 
        </div>
    </section>

    <section class="ftco-section">
      <div class="container-fluid px-4">
        <div class="col-md-12 col-lg-12 course ftco-animate" style="background-color: white; padding: 20px;">
          <h4 style="color: #fd5f00; font-weight: bold;margin-left: 10%;">Admit Rejects</h4>

              <p style="text-align: center;color: grey; font-weight: bold;font-size: 16px;" >Check profiles and test scores (GRE, GMAT, TOEFL, IELTS...) of students who got an admit from Northeastern University (Analytics) for Fall 2019 and Spring 2019</p>

              <form autocomplete="off" action="<?php echo base_url('University/admit_reject_result'); ?>" method="post" enctype="multipart/form-data">

                      <div class="col-md-11" style="margin-left: 5%">
                              <div class="row">
                                  <div class="col-md-3 autocomplete" style="margin-left: 5%">
                                    <i style="color: #fd5f00; font-weight: bold;">University Name</i>
                                      <input id="uname" type="text" name="university_name" class="form-control" required placeholder="University Name">

                                  </div>

                                  <div class="col-md-3 autocomplete" style="margin-left: 5%">
                                    <i style="color: #fd5f00; font-weight: bold;">Course Name</i>
                                      <input id="cname" type="text" name="course_name" class="form-control" required placeholder="Grad Course Name">

                                  </div>

                                  

                                  <div class="col-md-3">
                                    <i style="color: #fd5f00; font-weight: bold;">Status</i>
                                      <select name="status" class="form-control" style="padding: .3em;height: 30px;" required>
                                        <option value="Admit">Admit</option>
                                        <option value="Reject">Reject</option>
                                        <option value="Applied">Applied</option>
                                        <option value="Interested">Interested</option>
                                        
                                      </select>

                                  </div>



                                </div><!--row-->

                                <div class="col-md-9" style="text-align: center; margin-left: 5%; margin-top: 20px;">
                                      <input class="btn btn-success" type="submit" value="Submit" name="" style="border-radius: 0px; border : 2px solid #8bc34a; ">

                                  </div>
                    </div>

              </form>
        </div>
      </div><!--container fluid-->
    </section>

    <section class="ftco-section">
      <div class="container-fluid px-4">
        <div class="row">

        	<div class="list-wrapper">

			          <?php 

			          


			             //foreach ($uni_course as $key => $val) { 


			              //  if($val['c_name'] ==''){

			            // echo "No Record Found";
			           // }

			              ?>

			             
			             <div class="list-item">
				              <div class="col-md-3 course ftco-animate">
				                

				                  <div class="col-md-12 text-center" style="padding-top: 100px; height:280px;">
				                            <div class="img-thumbnail img-w-25" style="padding: 1px; width: 50%;margin: 0 auto;">
				                                <!-- <img src="<?php echo base_url('imgg/'.$val['logo']);?>" class="img-responsive img-rounded img-loader" width="70%;" alt=""> -->
				                            </div>
				                            <div><b> University Name Address </b></div>
				                    </div>



				                   
				                <div class="text pt-4">
				                 <!--  <p class="meta d-flex">
				                    <span><i class="icon-user mr-2"></i>Mr. Khan</span>
				                    <span><i class="icon-table mr-2"></i>10 seats</span>
				                    <span><i class="icon-calendar mr-2"></i>4 Years</span>
				                  </p> -->
				                  <h4><a href="<?php //echo site_url('university/apply/'.$val['u_id']);?>"><?php // echo $val['c_name']; ?></a></h4>
				                  <p><?php// echo substr($val['u_details'],0,300) ; ?></p>
				                  <p><a href="<?php //echo site_url('university/apply/'.$val['u_id']);?>" class="btn btn-primary">Apply now</a></p>
				                </div>


				              </div> <!-- col-md-3 course ftco-animate -->
			              </div><!-- list-item -->

			          
			          <?php // }  ?>
          </div><!--list-wrapper-->
        </div><!--row-->
      </div>

      <div id="pagination-container"></div>
    </section>

    <!-- <section>
      <div class="list-wrapper">
			  <div class="list-item">
			    
			  </div>
  
	</div> --><!--list-wrapper-->
<!-- 
				<div id="pagination-container"></div>
  </section>

 -->

     <!-- <section>
      <div class="list-wrapper">
  <div class="list-item">
    <h4>Iron Man</h4>
    <p>Iron Man is a 2008 American superhero film based on the Marvel Comics character of the same name, produced by Marvel Studios and distributed by Paramount Pictures. It is the first film in the Marvel Cinematic Universe (MCU). The film was directed by Jon Favreau, with a screenplay by the writing teams of Mark Fergus ...</p>
  </div>
  <div class="list-item">
    <h4>The Incredible Hulk</h4>
    <p>The Incredible Hulk is a 2008 American superhero film based on the Marvel Comics character the Hulk, produced by Marvel Studios and distributed by Universal Pictures. It is the second film in the Marvel Cinematic Universe (MCU). The film was directed by Louis Leterrier, with a screenplay by Zak Penn. It stars Edward ...</p>
  </div>
  <div class="list-item">
    <h4>Iron Man 2</h4>
    <p>Iron Man 2 is a 2010 American superhero film based on the Marvel Comics character Iron Man, produced by Marvel Studios and distributed by Paramount Pictures. It is the sequel to 2008's Iron Man, and is the third film in the Marvel Cinematic Universe (MCU). Directed by Jon Favreau and written by Justin Theroux, the film ...</p>
  </div>
  
<div class="list-item">
    <h4>Thor</h4>
    <p>Thor is a 2011 American superhero film based on the Marvel Comics character of the same name, produced by Marvel Studios and distributed by Paramount Pictures. It is the fourth film in the Marvel Cinematic Universe (MCU). The film was directed by Kenneth Branagh, written by the writing team of Ashley Edward Miller ...</p>
  </div>
  <div class="list-item">
    <h4>Captain America: The First Avenger</h4>
    <p>Captain America: The First Avenger is a 2011 American superhero film based on the Marvel Comics character Captain America, produced by Marvel Studios and distributed by Paramount Pictures. It is the fifth film in the Marvel Cinematic Universe (MCU). The film was directed by Joe Johnston, written by the writing team of ...</p>
  </div>
  <div class="list-item">
    <h4>The Avengers</h4>
    <p>Marvel's The Avengers or simply The Avengers, is a 2012 American superhero film based on the Marvel Comics superhero team of the same name, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sixth film in the Marvel Cinematic Universe (MCU). The film was written and ...</p>
  </div>
  <div class="list-item">
    <h4>Iron Man 3</h4>
    <p>Iron Man 3 is a 2013 American superhero film based on the Marvel Comics character Iron Man, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sequel to 2008's Iron Man and 2010's Iron Man 2, and the seventh film in the Marvel Cinematic Universe (MCU). The film was directed ...</p>
  </div>
  <div class="list-item">
    <h4>Thor: The Dark World</h4>
    <p>Thor: The Dark World is a 2013 American superhero film based on the Marvel Comics character Thor, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sequel to 2011's Thor and the eighth film in the Marvel Cinematic Universe (MCU). The film was directed by Alan Taylor, with a ...</p>
  </div>
  <div class="list-item">
    <h4>Captain America: The Winter Soldier</h4>
    <p>Captain America: The Winter Soldier is a 2014 American superhero film based on the Marvel Comics character Captain America, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sequel to 2011's Captain America: The First Avenger and the ninth film in the Marvel Cinematic ...</p>
  </div>
  <div class="list-item">
    <h4>Guardians of the Galaxy</h4>
    <p>Guardians of the Galaxy is a 2014 American superhero film based on the Marvel Comics superhero team of the same name, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the tenth film in the Marvel Cinematic Universe (MCU). The film was directed by James Gunn, who wrote the ...</p>
  </div>
  <div class="list-item">
    <h4>Avengers: Age of Ultron</h4>
    <p>Avengers: Age of Ultron is a 2015 American superhero film based on the Marvel Comics superhero team the Avengers, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sequel to 2012's The Avengers and the eleventh film in the Marvel Cinematic Universe (MCU). The film was ...</p>
  </div>
  <div class="list-item">
    <h4>Ant-Man</h4>
    <p>Ant-Man is a 2015 American superhero film based on the Marvel Comics characters of the same name: Scott Lang and Hank Pym. Produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures, it is the twelfth film in the Marvel Cinematic Universe (MCU). The film was directed by Peyton Reed, with a ...</p>
  </div>
  <div class="list-item">
    <h4>Captain America: Civil War</h4>
    <p>Captain America: Civil War is a 2016 American superhero film based on the Marvel Comics character Captain America, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the thirteenth film in the Marvel Cinematic Universe (MCU), and the sequel to 2011's Captain America: The First ...</p>
  </div>
  <div class="list-item">
    <h4>Doctor Strange</h4>
    <p>Doctor Strange is a 2016 American superhero film based on the Marvel Comics character of the same name, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the fourteenth film in the Marvel Cinematic Universe (MCU). The film was directed by Scott Derrickson, who wrote it with Jon ...</p>
  </div>
  <div class="list-item">
    <h4>Spider-Man: Homecoming</h4>
    <p>Spider-Man: Homecoming is a 2017 American superhero film based on the Marvel Comics character Spider-Man, co-produced by Columbia Pictures and Marvel Studios, and distributed by Sony Pictures Releasing. It is the second Spider-Man film reboot and the sixteenth film in the Marvel Cinematic Universe (MCU).</p>
  </div>
  <div class="list-item">
    <h4>Guardians of the Galaxy Vol. 2</h4>
    <p>Guardians of the Galaxy Vol. 2 is a 2017 American superhero film based on the Marvel Comics superhero team Guardians of the Galaxy, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sequel to 2014's Guardians of the Galaxy and the fifteenth film in the Marvel Cinematic ...</p>
  </div>
 
</div>

<div id="pagination-container"></div>
    </section>
 -->
 <?php

  
  // $query=$this->db->query("select university_name from university_name");
  // $uname = $query->result_array();

 ?>
    

<script type="text/javascript">

  // var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina"];

  var university = [<?php foreach ($uname as $key) {?>"<?php echo $key['university_name'] ?>",<?php } ?>];

  var course = [<?php foreach ($cname as $key) {?>"<?php echo $key['course_name'] ?>",<?php } ?>];

  autocomplete(document.getElementById("uname"), university);
  autocomplete(document.getElementById("cname"), course);

  
  // jQuery Plugin: 

  //http:flaviusmatis.github.io/simplePagination.js/

    var items = $(".list-wrapper .list-item");
    var numItems = items.length;
    var perPage = 4;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        // cssStyle: 'dark-theme',
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });
    
</script>


<script src="<?php echo base_url('js/jquery.min.js')?>"></script>