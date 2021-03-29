<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email Template</title>
</head>

<body>
<div id="mailsub" class="notification" align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;">
    <tr>
      <td align="center" bgcolor="#eff3f8"><table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
          <tr>
            <td><!-- padding -->
              <div style="height: 80px; line-height: 80px; font-size: 10px;"> </div></td>
          </tr>
          <!--header -->
          <tr>
            <td align="center" bgcolor="#ffffff"><!-- padding -->
              <div style="height: 30px; line-height: 30px; font-size: 10px;"> </div>
              <table width="90%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="left"><div class="mob_center_bl" style="float: left; display: inline-block; width: 115px;">
                      <table class="mob_center" width="115" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                        <tr>
                          <td align="left" valign="middle"><!-- padding -->
                            <div style="height: 20px; line-height: 20px; font-size: 10px;"> </div>
                            <table width="115" border="0" cellspacing="0" cellpadding="0" >
                              <tr>
                                <td align="left" valign="top" class="mob_center"><a href="{{URL('/')}}/" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;"> <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167"> <img src="{{URL('/')}}/images/logo.png" alt="The Food Pharmacy" border="0" style="display: block;" /></font></a></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                    </div></td>
                </tr>
              </table>
              
              <!-- padding -->
              <div style="height: 50px; line-height: 50px; font-size: 10px;"> </div></td>
          </tr>
          <!--header END--> 
          
          <!--content 1 -->
          <tr>
            <td align="center" bgcolor="#fbfcfd"><table width="90%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center"><!-- padding -->
                    <div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
                    <div style="line-height: 44px;"> <font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;"> <span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;"> Reset Password </span></font> </div>
                    
                    <!-- padding -->
                    <div style="height: 40px; line-height: 40px; font-size: 10px;"> </div></td>
                </tr>
                <tr>
                  <td><div style="line-height: 24px;"> <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;"> <b>Hello {{$customer_name}},</b><br>
                      <span  style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;"> To reset your password click the link <a href="{{URL('/')}}/verify/{{$customer_username}}/{{$customer_verification_code}}">HERE</a> </span></font> </div>
                    
                    <!-- padding -->
                    <div style="height: 40px; line-height: 40px; font-size: 10px;"> </div></td>
                </tr>
                <tr>
                  <td ><div style="line-height: 24px;"> <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167"> <span  style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;"> The Food Pharmacy <br>
                      (+92) 302 843 7778 <br>
                      Lahore </span></font> </div>
                    
                    <!-- padding -->
                    <div style="height: 60px; line-height: 60px; font-size: 10px;"> </div></td>
                </tr>
              </table></td>
          </tr>
          <!--content 1 END--> 
          <!--footer -->
          <tr>
            <td class="iage_footer" align="center" bgcolor="#ffffff" style="padding-top:15px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center"><font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;"> <span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;"> 2020 © The Food Pharmacy. ALL Rights Reserved. </span></font></td>
                </tr>
              </table></td>
          </tr>
          <!--footer END-->
        </table></td>
    </tr>
  </table>
</div>
</body>
</html>
