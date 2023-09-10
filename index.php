<?php
        require_once 'mpdf_package/vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf(['default_font' => 'Arial', 'mode' => 'utf-8', 'format' => 'A4-P']); // A4-L, A4-P
       // $mpdf = new \Mpdf\Mpdf(['default_font' => 'Kalpurush', 'mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetDisplayMode('fullpage');

        //call watermark content and image
        //$mpdf->SetWatermarkText('TM');
        //$mpdf->showWatermarkText = true;
        //$mpdf->watermarkTextAlpha = 0.1;

        $mpdf->defaultheaderline = 0;
        $mpdf->defaultfooterline = 0;
        $mpdf->defaultheaderfontstyle = 'N'; // N for normal
        //$mpdf->setFooter('{PAGENO}');
        // $mpdf->SetHeader('|<div class="row">
        // <div class="col-lg-12 text-center">
        // <span style="font-weight:bold;font-size:20px">অর্ডার রিপোর্ট </span><br>
        // <span style="font-weight:normal;font-size:18px">' . $start_dt . ' থেকে ' . $end_dt . ' পর্যন্ত</span>
        // </div></div>|');
        $mpdf->AddPage('P', '', '', '', '', 5, '', 5, 0);
        
        $mpdf->setFooter('Page {PAGENO} of {nbpg}');

        $report_html = '<html>
        <head>
             <title>Resume - Bashar</title>
             <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
             <style>
             .main_content{
                overflow:hidden;
                background:#fff;
                font-family:"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
             }
             
             p{
                text-align:justify;
             }
             .tiny-title{
                font-weight:600;
                border-bottom:2px solid #ddd;
             }
             </style>
        </head>
        <body>
            <div class="main_content">
                <table width="100%">
                  <tr>
                   <td style="width:70%;padding:5px 20px;vertical-align:top">
                   <p>
                      <span style="font-size:24px">ABUL BASHAR</span><br/>
                      <span style="font-size:16px">Senior Software Developer</span>
                   </p>
                   <p>
                        Proven and hard-working team-lead software engineer with 12 years of experience 
                        creating and executing innovative software solutions to enhance business productivity. 
                        I’m eager to solve creative problems and develop user-friendly systems for users. 
                        I am highly experienced in all aspects of the software development lifecycle and 
                        end-to-end project management, from concept to development and delivery.
                    </p>
                   </td>
                   <td style="background:#f9f9f9;height:100%;padding:2px 10px;vertical-align:top">
                    <div style="margin:0 auto;width:120px;height:120px;padding:3px;border:1px solid #ddd;border-radius:120px;text-align:center">
                       <img src="img/bashar.png" border="0" style="width:120px;height:120px;border-radius:120px;">
                    </div>
                    <div style="text-align:center">
                         <p class="tiny-title">CONTACT DETAILS</p>
                         <table width="100%">
                              <tr>
                                 <td style="width:30px"><i class="fa fa-map-marker"></i></td>
                                 <td>House # 02, Road # 01, Pryanka City, Sector-12, Uttara, Dhaka-1230.</td>
                              </tr>
                              <tr>
                                 <td><i class="fa fa-phone"></i></td>
                                 <td>01718 792 556.</td>
                              </tr>
                              <tr>
                                 <td><i class="fa fa-envelope-o"></i></td>
                                 <td>a.bashar042@gmail.com</td>
                              </tr>
                         </table> 
                         
                    </div>
                   </td>
                  </tr>
                </table>                
            </div>
        </body>
        </html>';

        echo '<div style="padding:100px 200px;background:#ddd">'.$report_html."</div>";

        $mpdf->WriteHTML($report_html);
        $mpdf->Output('downloads/' . 'Bashar_Resume_' .time() . '.pdf' , 'F');
?>