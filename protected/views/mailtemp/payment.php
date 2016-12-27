<?php include('header.php'); ?>
<!-- text description -->
                <tr>
                    <td valign="" bgcolor="#fafafa" height="" align="left" style="line-height:0px; font-size:16px">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> 
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>

                                                <tr>
                                                    <td height=""  valign="middle" align="left" style="line-height:40px; color: #E3762D;font-size:16px; font-family:'Nunito'">
                                                        Hello <?php echo isset($userName) ? $userName : "User"; ?>,
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #00BDAE; font-size:16px; margin-left:10px;font-family:'Nunito'">
                                                        Congratulations!  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="5"  >

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height=""  valign="middle" align="c" style="line-height:22px; color: #6b6b6b; font-size:14px; font-family:'Nunito'">
                                                         Your Order <?php echo isset($paymentObjectArray['orderId'])?$paymentObjectArray['orderId']:""; ?> has been completed successfully!
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td height="5"  >

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height=""  valign="middle" align="center" style="line-height:22px; color: #6b6b6b; font-size:14px; font-family:'Nunito'">
                                                        <p> Order Details </p>

                                                        <table  align="center" cellspacing="0" cellpadding="0" border="1">
                                                            <tbody>
                                                                <tr>
                                                                    <td  valign="middle" align="left" style="line-height:10px;padding:10px; color: #6b6b6b; font-size:12px; font-family:'Nunito'">
                                                                        Order Id:
                                                                    </td>
                                                                    <td  valign="middle" align="left" style="line-height:10px;padding:10px; color: #6b6b6b; font-size:12px; font-family:'Nunito'">
                                                                        <?php echo isset($paymentObjectArray['orderId']) ? $paymentObjectArray['orderId'] : ""; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="middle" align="left" style="line-height:10px;padding:10px; color: #828282; font-size:12px; font-family:'Nunito'">
                                                                        Order Status:
                                                                    </td>
                                                                    <td  valign="middle" align="left" style="line-height:10px;padding:10px; color: #6b6b6b; font-size:12px; font-family:'Nunito'">
                                                                        <?php
                                                                            $orderStatus = "";
                                                                            if (isset($paymentObjectArray['orderStatus']) && $paymentObjectArray['orderStatus'] == "AAA") {
                                                                                $orderStatus = "Awaiting Admin Action";
                                                                            } elseif (isset($paymentObjectArray['orderStatus']) && $paymentObjectArray['orderStatus'] == "AUA") {
                                                                                $orderStatus = "Awaiting User action";
                                                                            } elseif (isset($paymentObjectArray['orderStatus']) && $paymentObjectArray['orderStatus'] == "CANCELLED") {
                                                                                $orderStatus = "Cancelled";
                                                                            } else {
                                                                                $orderStatus = $paymentObjectArray['orderStatus'];
                                                                            }
                                                                            echo $orderStatus;
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td  valign="middle" align="left" style="line-height:10px;padding:10px; color: #828282; font-size:12px; font-family:'Nunito'">
                                                                        From:
                                                                    </td>
                                                                    <td  valign="middle" align="left" style="line-height:10px;padding:10px; color: #6b6b6b; font-size:12px; font-family:'Nunito'">
                                                                        <?php echo isset($sourceCurrencyName) ? $sourceCurrencyName : ""; ?> => <?php echo isset($paymentObjectArray['sourceAmount']) ? $paymentObjectArray['sourceAmount'] : ""; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td  valign="middle" align="left" style="line-height:10px;padding:10px; color: #828282; font-size:12px; font-family:'Nunito'">
                                                                        To:
                                                                    </td>
                                                                    <td  valign="middle" align="left" style="line-height:10px;padding:10px; color: #6b6b6b; font-size:12px; font-family:'Nunito'">
                                                                        <?php echo isset($destinationCurrencyName) ? $destinationCurrencyName : ""; ?> => <?php echo isset($paymentObjectArray['destinationAmount']) ? $paymentObjectArray['destinationAmount'] : ""; ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="5"></td>
                                                </tr>
                                                <tr>
                                                    <td height=""  valign="middle" align="center" style="line-height:22px; color: #6b6b6b; font-size:14px; font-family:'Nunito'">
                                                        <p>We appreciate your interest and urge you to keep using TopOneExchange.</p>
                                                    </td>
                                                </tr>
                                              <?php include('footer.php'); ?>  