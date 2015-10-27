<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">

	<?php
        include_once("layout/header.php");
    ?>
        
        <!-- Testimonials -->
	    <div class="section">
			<div class="container">
				<h2>Avisos Importantes</h2>
				<div class="row">
					<!-- Testimonial -->
					<div class="testimonial col-md-4 col-sm-6">
						<!-- Author Photo -->
						<div class="author-photo">
							<img src="img/user1.png" alt="Aviso 1">
						</div>
						<div class="testimonial-bubble alert alert-warning" id="avisoHum">
							<blockquote>
								<!-- Quote -->
								<p class="quote">
		                            A partir do mês de fevereiro de 2015, <span><strong>todos os servidores da Prefeitura receberão seu salário na <abbr title="Caixa Econômica Federal"><span class="cef-span">CAIXA</span></abbr></strong></span>. No entanto, se você ainda não tem conta corrente na Caixa <span><strong>não precisa se preocupar</strong></span>, pois todas as contas serão abertas de forma <span><strong>automática</strong></span>.
                        		</p>
                        	</blockquote>
                        	<div class="sprite arrow-speech-bubble"></div>
                        </div>
                    </div>
                    <!-- End Testimonial -->
                    <div class="testimonial col-md-4 col-sm-6">
						<div class="author-photo">
							<img src="img/user2.png" alt="Aviso 2">
						</div>
						<div class="testimonial-bubble alert alert-success" id="avisoDois">
							<blockquote>
								<p class="quote">
		                            Os servidores da Prefeitura que tiverem suas contas abertas automaticamente <span><strong>deverão</strong></span> comparecer à sua nova agência de relacionamento para <span><strong>regularização da conta</strong></span>. Para isso, faça o download e leve preenchida a <a href="#ficha"><span><strong>Ficha de Pré-Cadastro</strong></span></a> disponível abaixo.
                        		</p>
                        	</blockquote>
                        	<div class="sprite arrow-speech-bubble"></div>
                        </div>
                    </div>
					<div class="testimonial col-md-4 col-sm-6">
						<div class="author-photo">
							<img src="img/user3.png" alt="Aviso 3">
						</div>
						<div class="testimonial-bubble alert alert-warning" id="avisoTres">
							<blockquote>
								<p class="quote">
		                            As Agências da <abbr title="Caixa Econômica Federal"><span class="cef-span"><strong>CAIXA</strong></span></abbr> em Aparecida de Goiânia funcionarão em <span><strong>horário especial</strong></span> para melhor atendimento ao Servidor. <a href="#consulta"><span><strong>Consulte</strong></span></a> abaixo onde será sua agência e confira os dias e horários em que, preferencialmente, <span><strong>você deve comparecer</strong></span>.
                        		</p>
                        	</blockquote>
                        	<div class="sprite arrow-speech-bubble"></div>
                        </div>
                    </div>
				</div>
                <div class="row">
                    <div class="col-xs-12" id="alerta">
                        <div class="alert alert-danger">
                            <p class="h4">ATENÇÃO SERVIDORES CORRENTISTAS DA CAIXA</p>
                            <hr />
                            <p class="text-justify mensagem">- Informamos aos servidores que já possuem <strong><u>CONTA CORRENTE ATIVA</u></strong> (OPERAÇÃO 001), que o salário será creditado automaticamente nesta conta.</p>
                            <p class="text-justify mensagem">- Aos servidores que possuem apenas <strong><u>CONTA CAIXA FÁCIL</u></strong> (OPERAÇÃO 023) e/ou <strong><u>CONTA POUPANÇA</u></strong> (OPERAÇÃO 013), informamos que as <strong><u>CONTAS CORRENTES</u></strong> (OPERAÇÃO 001) também foram abertas automaticamente e <strong>precisam ser regularizadas</strong>.</p>
                        </div>
                    </div>
                </div>
			</div>
	    </div>
	    <!-- End Testimonials -->

		<!-- Services -->
        <div class="section">
	        <div class="container">
	        	<div class="row">
	        		<div class="col-md-4 col-sm-6">
	        			<div class="service-wrapper">
		        			<img src="img/service-icon/ruler.png" alt="Service 1">
		        			<h3 id="ficha">Atualização Cadastral</h3>
		        			<p>Faça o download da Ficha de Pré-Cadastro e leve até à sua agência para regularizar a conta.</p>
		        			<a href="attachments/Ficha de Pre-Cadastro Servidor de Aparecida.pdf" class="btn btn-red" target="_blank">Download</a>
		        		</div>
	        		</div>
	        		<div class="col-md-4 col-sm-6">
	        			<div class="service-wrapper">
		        			<img src="img/service-icon/box.png" alt="Service 2">
		        			<h3 id="consulta">Consultar Nova Agência</h3>
		        			<p>Sua conta na CAIXA foi criada automaticamente. Conheça sua nova agência de relacionamento.</p>
		        			<button type="button" class="btn btn-red" id="btnConsultar">Consultar</button>
		        		</div>
	        		</div>
	        		<div class="col-md-4 col-sm-6">
	        			<div class="service-wrapper">
                            <img src="img/service-icon/diamond.png" alt="Service 3">
		        			<h3>Benefícios</h3>
		        			<!-- <p>Conheça as vantagens que a CAIXA têm para os servidores públicos de Aparecida de Goiânia.</p> -->
                            <p>Conheça os benefícios exclusivos para os servidores públicos, aposentados e pensionistas da Prefeitura de Aparecida.</p>
		        			<button type="button" class="btn btn-red" data-toggle="modal" data-target="#myModal">Saiba +</button>
		        		</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	    <!-- End Services -->

		<!-- Call to Action Bar -->
        <div id="containerSearch">
            <div id="sectionSearch" class="section section-white hidden">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-8 col-xs-offset-2 col-md-offset-3">
                            <div class="basic-login">
                                <form action="processing/process.php" id="cpf-form" class="form-horizontal" role="form" method="post">
                                    <div class="form-group" id="cpf-field">
                                        <label for="cpf" class="col-md-2 control-label">CPF:</label>
                                        <div class="col-md-10">
                                            <input type="text" id="cpf" name="cpf" class="form-control text-center" title="Campo para consultar agência informando o CPF" placeholder="Informe os números do CPF" required pattern="[0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2}"  />
                                        </div>
                                    </div>
                                    <div>
                                    	<input type="button" id="btnLimpar" class="btn btn-grey pull-left col-xs-offset-2" value="Limpar" />
                                        <input type="submit" class="btn btn-green pull-right" value="Enviar" />
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br /><br />
                    <div id="result-form">
                        <div id="loading"><img class="center-block img-responsive" src="img/bx_loader.gif" alt="Carregando" title="Carregando" /></div>
                    </div>
                </div>
            </div>
        </div>
		<!-- End Call to Action Bar -->

		<?php
            include_once("layout/footer.php");
			include_once("partials/modal.php");
        ?>	
		
        <!-- Histats.com  START (hidden counter)-->
			<script type="text/javascript">
				document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));
			</script>
			<a href="http://www.histats.com" target="_blank" title="histats" >
				<script  type="text/javascript" >
					try {Histats.start(1,2932007,4,0,0,0,"");
					Histats.track_hits();} catch(err){};
				</script>
			</a>
			<noscript>
				<a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2932007&101" alt="histats" border="0"></a>
			</noscript>
		<!-- Histats.com  END  -->
		
    </body>
</html>