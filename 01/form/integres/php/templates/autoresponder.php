<?php  
$automessage = ' 
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Flora forms - Email message template </title>    
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    <center>
        <table style="padding:15px 15px;background:#F4F4F4;width:100%;font-family:arial" cellpadding="0" cellspacing="0">
                
                <tbody>
                    <tr>
                        <td>
                        
                            <table style="max-width:540px;min-width:320px" align="center" cellspacing="0">
                                <tbody>
                                
                                    <tr>
                                        <td style="background:#fff;border:1px solid #D8D8D8;padding:30px 30px" align="center">
                                        
                                            <table align="center">
                                                <tbody>
                                                
                                                    <tr>
                                                        <td style="border-bottom:1px solid #D8D8D8;color:#666;text-align:center;padding-bottom:30px">
                                                            
                                                            <table style="margin:auto" align="center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="color:#005f84;font-size:22px;font-weight:bold;text-align:center;font-family:arial">
                                                                            CONFIRMAÇÃO DE MENSAGEM	
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                               <td style="color:#666;padding:15px; padding-bottom:0;font-size:14px;line-height:20px;font-family:arial;text-align:left">
                                    
                                                    <div style="font-style:normal;padding-bottom:15px;font-family:arial;line-height:20px;text-align:left">
                                                        
                                                        <p> Hello <span style="font-weight:bold;color:#4296CE;font-size:16px">'.$firstname.'  '.$lastname.' </span> 
														Nós recebemos sua mensagem e agradecemos a você o contato. Retornaremos o mais breve possível. 
														</p>
														
														<p style="font-weight:bold;font-size:18px">Below are the details we received:</p>
														
														<p style="border-bottom:1px solid #fff; height:0; color:#666;text-align:center;"></p>
	                                                    <p><span style="font-weight:bold;font-size:16px">Nome:</span> '.$firstname.'</p>
                                                        <p><span style="font-weight:bold;font-size:16px">Sobrenome:</span> '.$lastname.'</p>
                                                        <p><span style="font-weight:bold;font-size:16px">E-mail:</span> '.$emailaddress.'</p>
														<p><span style="font-weight:bold;font-size:16px">Telefone:</span> '.$telephone.'</p>
														<p><span style="font-weight:bold;font-size:16px">Website:</span> '.$website.'</p>
														<p><span style="font-weight:bold;font-size:16px">Departmento:</span> '.$department.'</p>
                                                        <p><span style="font-weight:bold;font-size:16px;">Mensagem:<br/></span> </p>
                                                        <p style="margin-bottom:0; margin-top:15px;"> '.nl2br($message).' </p>
														
														<p style="border-bottom:1px solid #D8D8D8; height:0; color:#666;text-align:center;padding:15px 0 0 0"></p>
														<p style="margin-top:20px;">Para maiores informações use o e-mail abaixo</p>
														<p><span style="font-weight:bold;font-size:13px">Outro e-mail de contato:</span> 
															<span style="color:#4296CE;font-size:13px;">'.$receiver_email.'</span>
														</p>														
                                                        
                                                      </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="background:#f9f9f9;border:1px solid #D8D8D8;border-top:none;padding:15px 10px" align="center">
                                            
                                            <table style="width:100%;max-width:650px" align="center">
                                               
                                            </table>
                                            
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <table style="max-width:650px" align="center">
                                
                                <tbody>
                                    <tr>
                                        <td style="color:#b4b4b4;font-size:11px;padding-top:10px;line-height:15px;font-family:arial">
                                            <span> &copy; Mifisa  - ALL RIGHTS RESERVED </span>
                                        </td>
            
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
            </tbody>
        </table>
    </center>
</body>
</html>';
?>