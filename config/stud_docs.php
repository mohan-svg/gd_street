<?php

		$html_body="<html>

<head>
  
  <style>
table {
  width:50%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 8px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: black;
  color: white;
}
</style>
</head>
<body>
    
                             
        <table id='t01'>
          <tr>
               <td colspan='4'> <h3 style='text-align: center'>Applicants Detail </h3></td>
                  
            </tr>
            <tr>
               <td> <h4>Name:</h4></td> <td>[name]</td> <td> <h4>Email:</h4></td> <td>[email]</td>
                  
            </tr>
            <tr>
               <td> <h4>Mobile:</h4></td> <td>[mobile]</td> <td> <h4>Mailing Address:</h4></td> <td>[address]</td>
                  
            </tr>
            <tr>
               <td> <h4>UG College:<h4></td> <td>[ug_college]</td> <td> <h4>UG-course:<h4></td> <td>[ug_course]</td>
                  
            </tr>
            <tr>
               <td> <h4>UG CGPA:</h4></td> <td>[ug_gpa]</td> <td> <h4>UG-Passing Year:</h4></td> <td>[ug_duration]</td>
                  
            </tr>
            <tr>
               <td> <h4>GRE:</h4></td> <td>[gre]</td> <td> <h4>TOEFL/IELTS</h4></td> <td>[ielts_toefl]</td>
                  
            </tr>
<!-- 
            <tr>
               <td> <h4>PG:</h4></td> <td>[pg_status]</td> 
                  
            </tr> -->

            <tr>
               <td> <h4>PG College:</h4></td> <td>[pg_college]</td> <td> <h4>PG-course:</h4></td> <td>[pg_course]</td>
                  
            </tr>
            <tr>
               <td> <h4>PG CGPA:</h4></td> <td>[pg_gpa]</td> <td> <h4>PG-Duration:</h4></td> <td>[pg_duration]</td>
                  
            </tr>
           <!--  <tr>
               <td> <h4>Work Experience:</h4></td> <td>[work_status]</td> 
                  
            </tr> -->
             <tr>
               <td> <h4>Company Name:</h4></td> <td>[company]</td> <td> <h4>Position:</h4></td> <td>[position]</td>
                  
            </tr>
            <tr>
               <td> <h4>Salary:</h4></td> <td>[salary]</td> <td> <h4>Tenure:</h4></td> <td>[tenure]</td>
                  
            </tr>

        </table>
                
    
    </body>
</html>";

?>