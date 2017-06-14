<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Contact Form </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/floraforms.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/floraforms-plugins.js"></script>
        <script src="js/floraforms.js"></script>
        
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/floraforms-ie8.css">
            <script src="js/floraforms-ie8.js"></script>
        <![endif]-->
        
    </head>
    <body class="florabg1">
        <div class="flora-wrap">
        	<form method="post" action="php/formprocess.php" class="floraforms" id="floraforms">
            	<!--<div class="flora-container wrap3">
                	<div class="frm-header">
                    	<h4>Contato</h4>
                    </div>--><!-- end .frm-header section -->
                    <div class="frm-body">
                    
                        <div class="frm-row">
                            <div class="elem-group colm colm6">
                                <label class="field">
                                    <input type="text" name="firstname" id="firstname" class="flo-input" placeholder="Nome">
                                </label>                            
                            </div><!-- end .colm .elem-group section -->
                            <div class="elem-group colm colm6">
                                <label class="field">
                                    <input type="text" name="lastname" id="lastname" class="flo-input" placeholder="Sobrenome">
                                </label>                            
                            </div><!-- end .colm .elem-group section -->
                        </div><!-- end .frm-row section -->
                        
                        <div class="frm-row">
                            <div class="elem-group colm colm6">
                                <label class="field">
                                    <input type="email" name="emailaddress" id="emailaddress" class="flo-input" placeholder="Email">
                                </label>                            
                            </div><!-- end .colm .elem-group section -->
                            <div class="elem-group colm colm6">
                                <label class="field">
                                    <input type="tel" name="telephone" id="telephone" class="flo-input" placeholder="Telefone">
                                </label>                            
                            </div><!-- end .colm .elem-group section -->
                        </div><!-- end .frm-row section -->                        
                        
                     <!--   <div class="frm-row">
                            <div class="elem-group colm colm6">-->
                               <!-- <label class="field">
                                    <input type="url" name="website" id="website" class="flo-input" placeholder="Website">
                                </label>     -->                       
                           <!-- </div>--><!-- end .colm .elem-group section -->
                           <!-- <div class="elem-group colm colm6">
                                <label class="field flo-select">
                                    <select name="department" id="department">
                                        <option value=""> Departamento </option>
                                        <option value="Technical">Técnico</option>
                                        <option value="Marketing">Sales &amp; Marketing</option>
                                        <option value="Business Development">Vendas</option>
                                        <option value="General">Outros</option>
                                    </select>
                                    <i class="arrow double"></i>                             
                                </label>    -->                         
                          <!--  </div>--><!-- end .colm .elem-group section -->
                      <!--  </div>--><!-- end .frm-row section -->

                        <div class="elem-group">
                            <label class="field">
                                <textarea class="flo-textarea" name="message" id="message" placeholder="Escreva a sua mensagem"></textarea>
                               <!-- <span class="flo-hint"><strong>Hint:</strong> Don't be negative or off topic</span> -->  
                            </label>
                        </div><!-- end .elem-group section -->
                        
                        <div class="elem-group">
                            <label class="field flo-captcha">
                                <input type="text" name="captcha" id="captcha" class="flo-input" maxlength="6" placeholder="Escreve o código (letras maiúsculas)">
                                <span class="captcode">
                                    <img src="php/captcha/captcha.php?<?php echo time();?>" id="captchax" alt="captcha">
                                    <span class="refresh-captcha"><i class="fa fa-refresh"></i></span>
                                </span>                                
                            </label>                            
                        </div><!-- end .colm .elem-group section -->
                                                
                        <div class="response"></div><!-- end .response  section -->  
                        
                    </div><!-- end .frm-body section -->
                    <div class="frm-footer">
                    	<button type="reset" class="flo-button">Cancelar</button>
                        <button type="submit" data-btntext-sending="Enviando..." class="flo-button btn-themed">Enviar</button>
                    </div><!-- end .frm-footer section -->
                </div><!-- end .flora-container section -->
            </form>
        </div><!-- end .flora-wrap section -->
        <div></div><!-- end section -->
    </body>
</html>