<?php
//Mensaje para correo
    $fin =  '<html><body style="background-color:#CCC;">';
    $fin .= '
                    <center>
            
                        <div style="font-family:arial; background:#FFF; width:800px; color:#000; text-align:justify; padding:15px; border-radius:5px; margin-top:20px;">

                
							<p style="color:#000;">
                                Name: '.$_POST["name"].'<br>
                                Email: '.$_POST["email"].'<br>
                                Message:<br> '.$_POST["message"].'<br>
							</p>

							<p align="center" style="color:#000;">
								Thank you for reach out us, have a good day!
							</p>

						</div>
					</center>
					<p>&nbsp;</p>
				';
    $fin .= '';
    $fin .=  '<html><body>';