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
                                        Thank you for registering with TopOneExchange. Your Account is Activated.
                                    </td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:14px; font-family:'Nunito'">
                                        Your Login Credentials are as stated below:
                                        <table cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td  valign="middle" align="left" style="line-height:10px;padding:10px; color: #828282; font-size:14px; font-family:'Nunito'">
                                                        Username:
                                                    </td>
                                                    <td  valign="middle" align="left" style="line-height:10px;padding:10px; color: #6b6b6b; font-size:14px;font-weight: bold; font-family:'Nunito'">
                                                        <?php echo isset($email) ? $email : ""; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td  valign="middle" align="left" style="line-height:10px;padding:10px; color: #828282; font-size:14px; font-family:'Nunito'">
                                                        Password:
                                                    </td>
                                                    <td  valign="middle" align="left" style="line-height:10px;padding:10px; color: #6b6b6b; font-size:14px;font-weight: bold; font-family:'Nunito'">
                                                        <?php echo isset($password) ? $password : ""; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:14px; font-family:'Nunito'">
                                        We appreciate your interest and urge you to keep using TopOneExchange.
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                <?php include('footer.php'); ?>