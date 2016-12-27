<tr>
  <td  align="left" style="font-size:15px">
	Warm Regards,
	<p style="color:#00BDAE;font-size:15px;font-family:Nunito;margin:0px;">TOE Team </p>
  </td>
</tr>
<tr>
  <td>
	<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/emailimages/emailer-bottom-banner.jpg">
  </td>
</tr>
<tr>
  <td height="20" bgcolor="" style=""></td>
</tr>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
  <td>
	<table width="600px" cellspacing="0" cellpadding="0" border="0">
	  <tbody>
		<tr>
		  <td> 
			<table>
			  <tbody>
				<tr>
				  <td  valign="middle" align="left" style="line-height:22px;font-family:Nunito; font-weight:bold;color: #6b6b6b; font-size:12px; font-family:'Nunito'">
					<?php echo isset(Yii::app()->params['mailAddressOne']) ? Yii::app()->params['mailAddressOne'] : ""; ?>
				  </td>
				</tr>
				<tr>
				  <td  valign="middle" align="left" style="line-height:22px;font-family:Nunito; font-weight:bold;color: #828282; font-size:12px; font-family:'Nunito'">
					<?php echo isset(Yii::app()->params['mailAddressTwo']) ? Yii::app()->params['mailAddressTwo'] : ""; ?> 
				  </td>
				</tr>
				<tr>
				  <td   valign="middle" align="left" style="line-height:22px; font-weight:bold;font-family:Nunito;color: #828282; font-size:12px; font-family:'Nunito'">
					<?php echo isset(Yii::app()->params['mailAddressThree']) ? Yii::app()->params['mailAddressThree'] : ""; ?>
				  </td>
				</tr>
			  </tbody>
			</table>
		  </td>
		  <td  valign="middle" align="right" style="line-height:10px; padding:10px;font-family:Nunito;font-weight:bold;color: #828282; font-size:14px; font-family:'Nunito'">
			<table  cellspacing="0" cellpadding="0" border="0">
			  <tbody>
				<tr>
				  <td valign="middle" align="right" style="line-height:15px; font-weight:bold;font-family:Nunito;color: #828282; font-size:12px;padding-top:10px;font-family:'Nunito'"><strong>Mail us:</strong><?php echo isset(Yii::app()->params['mailMailId']) ? Yii::app()->params['mailMailId'] : ""; ?></td>
				</tr>
				<tr>
				  <td  valign="middle" align="right" style="line-height:20px; font-weight:bold;font-family:Nunito;color: #828282; font-size:12px; font-family:'Nunito'"><strong>SkypeId:</strong><?php echo isset(Yii::app()->params['mailskypeId']) ? Yii::app()->params['mailskypeId'] : ""; ?></td>
				</tr>
			  </tbody>
			</table>  
		  </td>
		</tr>
	  </tbody>
	</table>
  </td>
</tr>
<tr>
  <td valign="" bgcolor="#fafafa" height="30" style="line-height:0px; border-top:1px solid #dfdfdf;font-size: 14px;color: #cccccc"><table width="100%" cellspacing="0" cellpadding="0" border="0">
	  <tbody>
		<tr>
		  <td width="100%" valign="middle" align="center" style="line-height:19px; font-size:14px; font-family:'Nunito'"> Please do not reply to this email. Emails sent to this address will not be answered. </td>
		</tr>
	  </tbody>
	</table></td>
</tr>
</tbody>
</table>
</body>
</html>