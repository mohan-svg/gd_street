<aside class="main-sidebar">
    <section class="sidebar" style="font-size: 16px;">
      
      <ul class="sidebar-menu" data-widget="tree" style="">
          <li><div style="padding: 5px; margin-left: 20px;"><img src="<?php echo base_url('images/icons/gs_logo_whitejk.jpg'); ?>"></div></li>
          <li><p style="color: white; margin-left: 40px;margin-top: 20px; font-size: 18px;"><i class="fa fa-user-secret" ></i>&nbsp;<?php echo $this->session->userdata('name');?></p></li>
          <li><p style="color: white; margin-left: 40px;margin-top: 20px; font-size: 14px;"><i class="fa fa-circle text-success"></i> Online </p></li>

          <li><a href="<?php echo site_url('student_status');?>"><i class="fa fa-th-large"></i>Home</a></li>

          <li><a href="<?php echo site_url('add_user');?>"><i class="fa  fa-user-plus"></i>Add User</a></li>
          <li><a href="<?php echo base_url('search_student_status')?>"><i class="fa fa-search"></i>University List By Student</a></li>

          <li><a href="<?php echo base_url('search_university_status')?>"><i class="fa fa-search"></i>Student Stat By Univ</a></li>

        <!--Student University Status-->  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>Add University Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('add_university');?>"><i class="fa fa-bank"></i>Add Universities Detail</a></li>
            <li><a href="<?php echo site_url('add_course_group');?>"><i class="fa fa-cubes"></i>Add Course Group</a></li>
            <li><a href="<?php echo site_url('add_course');?>"><i class="fa fa-book"></i>Add Courses Detail</a></li>
            <li><a href="<?php echo site_url('benefits');?>"><i class="fa fa-money"></i>Add Benefits</a></li>
            <li>
                <a href="<?php echo site_url('univ_images');?>"><i class="fa fa-picture-o"></i>Add Images</a>
            </li>
            <li>
              <a href="<?php echo site_url('univ_details');?>"><i class="fa fa-th-list"></i>Merge Complete Info</a>
            </li>                        
          </ul>
        </li><!--Student University Status-->

        
        <li>
            <a href="<?php echo site_url('/admin/show_add_news/'); ?>"><i class="fa  fa-video-camera"></i>Add News</a>
        </li>
        <li>
            <a href="<?php echo site_url('admit_reject_display'); ?>"><i class="fa fa-gg"></i>Add Admit Reject Data</a>
        </li>
        <li>
            <a href="<?php echo site_url('student_status'); ?>"><i class="fa fa-street-view"></i>Student Status</a>
        </li>       
        <li>
            <a href="<?php echo site_url('logout'); ?>"><i class="fa fa-power-off"></i>Logout</a>
        </li>
                        
      </ul>
    </section>
  </aside>