<?php include('header.php'); ?>
<!-- text description -->
<tr>
    <td valign="" bgcolor="#fafafa" height="" align="left" style="line-height:0px; font-size:16px">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>

                    <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> 
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>

                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:20px;padding-top:5px;color: #E3762D;font-size:16px; font-family:Nunito;font-family:'Nunito'">
                                        Hello <?php echo isset($userName) ? $userName : "User"; ?>,
                                    </td>
                                </tr>

                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #00BDAE; font-size:16px; margin-left:10px;font-family:'Nunito'">
                                        Greetings!
                                    </td>
                                </tr>

                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:14px; font-family:'Nunito'">
                                        Thank you for registering with TopOneExchange. We are happy to have you on board.
                                    </td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:14px; font-family:'Nunito'">
                                        Please verify your account by clicking the below link 
                                    </td>
                                </tr>
                                <tr height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:14px; font-family:'Nunito'">
                                    <td>
                                        <table id="table1" border="0" align="center">

                                            <tbody>
                                                <tr style="line-height:4em;">
                                                    <td style="background:#00BDAE;color:#FFF600;font-size:15px; line-height:1em;font-family: 'Montserrat', sans-serif; padding:10px 20px 10px 20px;margin-right:10px">
                                                        <a href="<?php echo isset($activationurl) ? $activationurl : ""; ?>" style="text-decoration:none; color:#FFFFFF;">Confirm</a> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:14px; font-family:'Nunito'">
                                        <p>We appreciate your interest and urge you to keep using TopOneExchange.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                <?php include('footer.php'); ?>