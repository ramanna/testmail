<?php $this->renderPartial('/mailtemp/header'); ?>

<tr>
    <td valign="" bgcolor="#efed6a" height="55" align="left" style="line-height:0px; font-size:16px">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                    <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> Hello <?php echo ucfirst($walletPostArr['fromUserName']); ?>,</td>
                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

<!-- text description -->
<tr>
    <td valign="" bgcolor="#fafafa" height="" align="left" style="line-height:0px; font-size:16px">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                    <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> 
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>

                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
                                        Your deposit requested was successful sent. The details are provided below.
                                    </td>
                                </tr>


                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="0" border="1">
                                            <tbody>
                                                <tr>
                                                    <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">Transaction Reference :</th>
                                                    <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'"><?php echo $walletPostArr['transactionId']; ?></th>
                                                </tr>
                                                <tr>
                                                    <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">Payment Reference :</th>
                                                    <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'"><?php echo $walletPostArr['payment_response_id']; ?></th>
                                                </tr>
                                                <tr>
                                                    <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">Account Number : </th>
                                                    <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'"><?php echo $walletPostArr['user_account']; ?></th>
                                                </tr>
                                                    <tr>
                                                        <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">Amount : </th>
                                                        <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'"><?php echo $walletPostArr['amount']; ?></th>
                                                    </tr>
                                                <tr>
                                                    <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">Requested Date: </th>
                                                    <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'"><?php echo $walletPostArr['created_at']; ?></th>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>
                                <tr>

                                <tr>
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>

                                <?php $this->renderPartial('/mailtemp/footer'); ?>