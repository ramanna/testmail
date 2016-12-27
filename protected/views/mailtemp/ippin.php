<?php include('header.php'); ?>
<!-- text description -->
<tr>
  <td valign="" bgcolor="#fafafa" height="" align="left" style="line-height:0px; font-size:16px">
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
	  <tbody>
		<tr>
		  <td valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> 
			<table width="100%" style="text-align: center; background: #e6feff" cellspacing="0" cellpadding="0" border="0">
			  <tbody>
				<tr>
				  <td height=""  valign="middle" align="center" style="line-height:20px;padding-top:5px;color: #E3762D;font-size:16px; font-family:Nunito;font-family:'Nunito'">
					Hello <?php echo isset($userName) ? $userName : 'User'; ?>,
				  </td>
				</tr>
				<tr>
				  <td height=""  valign="middle" align="left" style="line-height:22px; color: #252525; font-size:14px; font-family:'Nunito'">
					A login attempt has been made to log into the TopOneExchange account associated with this email, and the IP address/Browser upon authorization does not comply with the Security Settings of this account.
				  </td>
				</tr>
				<tr>
				  <td height="30">
					&nbsp;
				  </td>
				</tr>
				<tr>
				  <td height=""  valign="middle" align="left" style="line-height:22px; color: #252525; font-size:14px; font-family:'Nunito'">
					If you have not requested this login and are unaware of these details then , please change your password immediately and also report this matter to us. If this has been authorized by you then carefully check the information below before you apply the Security Pin
				  </td>
				</tr>
				<tr>
				  <td height="30">
					&nbsp;
				  </td>
				</tr>
				<tr>
				  <td width="600" align="center" valign="middle" >
					<table cellspacing="0" cellpadding="0" border="0" align="center">
					  <tbody>
						<tr>
						  <td width="300" align="center" valign="middle">
							<table cellspacing="0" cellpadding="0" border="0" align="center">
							  <tr>
								<td width="100%" align="center" valign="middle">
								  <h4 style="line-height:22px; color: #0dbbaf; font-size:16px; margin: 0; margin-bottom: 10px; padding: 0; text-transform: uppercase; font-weight: 400; font-family:'Nunito'">LAST LOGIN FROM</h4>
                                                                  <?php if(isset($lastLogin['country']) && !empty($lastLogin['country'])){ ?><p style="line-height:16px; color: #252525; font-size:13px; margin: 0; margin-bottom: 6px; padding: 0; font-weight: 300; font-family:'Nunito'">Country : <strong><?php echo $lastLogin['country']; ?></strong> </p><?php } ?>
								  <?php if(isset($lastLogin['browser']) && !empty($lastLogin['browser'])){ ?><p style="line-height:16px; color: #252525; font-size:13px; margin: 0; margin-bottom: 6px; padding: 0; font-weight: 300; font-family:'Nunito'">Browser : <strong><?php echo $lastLogin['browser']; ?></strong> </p><?php } ?>
								  <?php if(isset($lastLogin['ip']) && !empty($lastLogin['ip'])){ ?><p style="line-height:16px; color: #252525; font-size:13px; margin: 0; padding: 0; font-weight: 300; font-family:'Nunito'">IP Address : <strong><?php echo $lastLogin['ip']; ?></strong> </p><?php } ?>
								  </p>
								</td>
							  </tr>
							</table>
						  </td>
						  <td width="300" align="center" valign="middle">
							<table cellspacing="0" cellpadding="0" border="0" align="center">
							  <tr>
								<td width="100%" align="center" valign="middle">
								  <h4 style="line-height:22px; color: #0dbbaf; font-size:16px; margin: 0; margin-bottom: 10px; padding: 0; text-transform: uppercase; font-weight: 400; font-family:'Nunito'">CURRENT LOGIN FROM</h4>
								  <?php if(isset($newLogin['country']) && !empty($newLogin['country'])){ ?><p style="line-height:16px; color: #252525; font-size:13px; margin: 0; margin-bottom: 6px; padding: 0; font-weight: 300; font-family:'Nunito'">Country : <strong><?php echo $newLogin['country']; ?></strong>  </p><?php } ?>
								  <?php if(isset($newLogin['browser']) && !empty($newLogin['browser'])){ ?><p style="line-height:16px; color: #252525; font-size:13px; margin: 0; margin-bottom: 6px; padding: 0; font-weight: 300; font-family:'Nunito'">Browser : <strong><?php echo $newLogin['browser']; ?></strong> </p><?php } ?>
								  <?php if(isset($newLogin['ip']) && !empty($newLogin['ip'])){ ?><p style="line-height:16px; color: #252525; font-size:13px; margin: 0; padding: 0; font-weight: 300; font-family:'Nunito'">IP Address : <strong><?php echo $newLogin['ip']; ?></strong> </p><?php } ?>
								  </p>
								</td>
							  </tr>
							</table>
						  </td>
						</tr>

					  </tbody>
					</table>
				  </td>
				</tr>
				<tr>
				  <td height="30">
					&nbsp;
				  </td>
				</tr>
				<tr valign="middle" align="center">
				  <td align="center">
					<table cellspacing="0" cellpadding="0" border="0" align="center">
					  <tr>
						<td width="100%" align="center" valign="middle">
						  <h4 style="line-height:22px; color: #0dbbaf; font-size:16px; margin: 0; margin-bottom: 10px; padding: 0; text-transform: uppercase; font-weight: 400; font-family:'Nunito'">** IMPORTANT NOTICE **</h4>
						  <p style="line-height:16px; color: #252525; font-size:13px; margin: 0; padding: 0; font-weight: 300; font-family:'Nunito'">Only If you are satisfied with the information provided , then provide this security pin as requested during login attempt : <strong><?php echo $pin?$pin:""; ?></strong></p>
						  </p>
						</td>
					  </tr>
					</table>
				  </td>
				</tr>
				<tr>
				  <td height="20">
					&nbsp;
				  </td>
				</tr>
				<tr>
				  <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:14px; font-family:'Nunito'">
					<p style="line-height:16px; color: #252525; font-size:13px; margin: 0; margin-bottom: 10px; padding: 0; font-weight: 300; font-family:'Nunito'">We appreciate your interest and urge you to keep using TopOneExchange.</p>
				  </td>
				</tr>
				<?php include('footer.php'); ?>