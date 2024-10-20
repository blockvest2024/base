<script src="assets/qrcode.js"></script>         
<div class="row">
            <div class="col-xl-12">
               <div class="breadcrumb__wrapper mb-35">
                  <div class="breadcrumb__inner">
                     <div class="breadcrumb__icon">
                        <i class="flaticon-home"></i>
                     </div>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <!-- <li><span><a href="<?=site_url("home")?>">Home</a></span></li> -->
                              <li><span><a href="<?=site_url("services/add")?>">Service List</a></span></li>
                              <li><span><a href="<?=site_url("services/subtype/".$services_type['id'])?>"><?=$services_type['name']?></a></span></li>
                              <li><span><a href="<?=site_url("services/subsubtype/".$services_subtype['id'])?>"><?=$services_subtype['name']?></a></span></li>
                              <li class="active"><span><?=$data['name']?></span></li>
                              
                              
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row g-20">
             
            <div class="container">
                <div class="pricex">
                         <!-- -->
                        	 <div class="cards">
                                   
                                    <div class="card shadow">
                                       <div class="card-top">
                                    		<small class="alert alert-info"><i><?=$currency['network']?></i></small>
                                      </div>
                                          <ul>
                                            <li class="pack">
                                            <?=$data['name']?>
                                            
                                            </li>
                                            <li id="basic" class="price bottom-bar">
                                             <?=$data['prices']?> Eth
                                            
                                            </li>
                                             
                                            
                                            <li class="bottom-bar"><small><i>System Will record if you sent with amount minimum purchase</i></small></li>
                                            <li class="bottom-bar">Time Purchase In &nbsp; <br/> <strong class="countdown"> </strong></li>
                                             
                                                                    
                                          </ul>
                                      <div id="qrcode" class="qrcode" style=""></div>
                                                                    <script>
																		$(function()
																		{
																			 
																		});
																	</script>
                                                                    <hr/>
                                                                    <div class="input-group mb-12 addressv"> 
                                                                        
                                                                        <input type="text" class="form-control rounded-xs required" aria-label="address" id="addressx" value="<?=$wallet['wallet']?>" readonly="readonly" placeholder="wallet address" />
                                                                          <span class="input-group-text" onclick="javascript:CopyToClipboard('addressx');" style="cursor:pointer;"><i class="fa fa-copy"></i></span>
                                                                         	 
                                                                          
                                                                    </div>
                                       	<div class=" ">
                                                    <div class="text-run text-center">
                                                        <small><i>Noted: <b>pleased page open for confirm Purchase and will be check every 30 seconds</b></i> 
                                                         
                                                        </small>
                                                    </div> 	
                                                 </div>    
                                                 <div class=" ">
                                                    <div class="text-run text-center">
                                                        <p class="animate-charcter text-warning">Waiting Purchase.. </p>
                                                    </div> 	
                                                 </div> 
                                    </div>
                                </div>  
                         <!-- -->
                              
                         <!-- -->
                         
                </div>
            </div>
			 
             
            </div>
         </div>
          
      </div>
      <!-- App side area end -->
      
<style type="text/css">
.text-run.text-center {
    padding: 0 10px;
}
.qrcode img
{

	text-align:center;
	padding-left: 30% !important;	
}
.addressv
{
	padding:0 10% !important;	
}
@media only screen and (max-width: 600px) {

    .qrcode img
	{
		text-align:center;
		padding-left: 15% !important;
	}
	.content .input-group.addressv {
		padding: 0 15% !important;
	}
}
.animate-charcter
{
   text-transform: uppercase;
  background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
  display: inline-block;
      font-size: 15px;
}
.infos
{
	color:cyan;
	font-size:18px;
	border: 1px solid #ccc;
    padding: 10px;
}
.infos span
{
	color:red;
}
@keyframes textclip {
  to {
    background-position: 200% center;
  }
}
</style> 
<style type="text/css">
.pricex .sub {
  background: linear-gradient(
    135deg,
    rgba(163, 168, 240, 1) 0%,
    rgba(105, 111, 221, 1) 100%
  );
  display: flex;
  justify-content: flex-start;
  align-items: center;
  /* height: 25px;
  width: 50px; */
  height: 1.6rem;
  width: 3.3rem;
  border-radius: 1.6rem;
  padding: 0.3rem;
}
.pricex .circle {
  background-color: #fff;
  height: 1.4rem;
  width: 1.4rem;
  border-radius: 50%;
}
.pricex .checkbox:checked + .sub {
  justify-content: flex-end;
}

.pricex .cards {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

.pricex .card {
  background: #fff;
  color: hsl(233, 13%, 49%);
  border-radius: 0.8rem;
}

.pricex .cards .card.active {
  background: linear-gradient(
    135deg,
    rgba(163, 168, 240, 1) 0%,
    rgba(105, 111, 221, 1) 100%
  );
  color: #fff;
  display: flex;
  align-items: center;
  transform: scale(1.1);
  z-index: 1;
}
.pricex ul {
  margin: 2.6rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
}
.pricex ul li {
  list-style-type: none;
  display: flex;
  justify-content: center;
  width: 100%;
  padding: 1rem 0;
}
.pricex ul li.price {
  font-size: 3rem;
  color: hsl(232, 13%, 33%);
  padding-bottom: 2rem;
}
.pricex .shadow {
  box-shadow: -5px 5px 15px 1px rgba(0, 0, 0, 0.1);
}

.pricex .card.active .price {
  color: #fff;
}

.pricex .btn {
  margin-top: 1rem;
  height: 2.6rem;
  width: 13.3rem;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 4px;
  background: linear-gradient(
    135deg,
    rgba(163, 168, 240, 1) 0%,
    rgba(105, 111, 221, 1) 100%
  );
  color: #fff;
  outline: none;
  border: 0;
  font-weight: bold;
}
.pricex .active-btn {
  background: #fff;
  color: hsl(237, 63%, 64%);
}
.pricex .bottom-bar {
  border-bottom: 2px solid hsla(240, 8%, 85%, 0.582);
}
.pricex .card.active .bottom-bar {
  border-bottom: 2px solid hsla(240, 8%, 85%, 0.253);
}
.pricex .pack {
  font-size: 1.1rem;
}
.card-top {
    margin-top: 15px;
    margin-left: 5px;
    color: white;
}
.card-top small.alert.alert-info {
    color: darkorange;
    text-transform: uppercase;
    border-radius: 45%;
}
@media (max-width: 280px) {
  .pricex ul {
    margin: 1rem;
  }
 .pricex  h1 {
    font-size: 1.2rem;
  }
  .pricex .toggle {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    height: 80px;
  }
  .pricex .cards {
    margin: 0;
    display: flex;
    flex-direction: column;
  }

  .pricex.card {
    transform: scale(0.8);
    margin-bottom: 1rem;
  }
  .pricex .cards .card.active {
    transform: scale(0.8);
  }
}

@media (min-width: 280px) and (max-width: 320px) {
  .pricex ul {
    margin: 20px;
  }
  .pricex .cards {
    display: flex;
    flex-direction: column;
  }
  .pricex .card {
    margin-bottom: 1rem;
  }
  .pricex .cards .card.active {
    transform: scale(1);
  }
}

@media (min-width: 320px) and (max-width: 414px) {
  .pricex .cards {
    display: flex;
    flex-direction: column;
  }
  .pricex .card {
    margin-bottom: 1rem;
  }
  .pricex .cards .card.active {
    transform: scale(1);
  }
}
@media (min-width: 414px) and (max-width: 768px) {
  .pricex .card {
    margin-bottom: 1rem;
    margin-right: 1rem;
  }
  .pricex .cards .card.active {
    transform: scale(1);
  }
}
@media (min-width: 768px) and (max-width: 1046px) {
  .pricex .cards {
    display: flex;
  }
  .pricex .card {
    margin-bottom: 1rem;
    margin-right: 1rem;
  }
  .pricex .cards .card.active {
    transform: scale(1);
  }
}
</style>     
<script>
function CopyToClipboard(id)
  {
			$("#smart-loader").modal('show'); 
			/*
			var r = document.createRange();
			r.selectNode(document.getElementById(id));
			window.getSelection().removeAllRanges();
			window.getSelection().addRange(r);
			document.execCommand('copy');
			window.getSelection().removeAllRanges();*/
			var texts = $("#"+ id).val();
			console.log(texts);
			copyToClipboard_val(texts);
			smart_message("copy to clipboard");
			 
  }
function copyToClipboard_val(text) {
		if (window.clipboardData && window.clipboardData.setData) {
			// Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
			return window.clipboardData.setData("Text", text);
	
		}
		else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
			var textarea = document.createElement("textarea");
			textarea.textContent = text;
			textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in Microsoft Edge.
			document.body.appendChild(textarea);
			textarea.select();
			try {
				return document.execCommand("copy");  // Security exception may be thrown by some browsers.
			}
			catch (ex) {
				console.warn("Copy to clipboard failed.", ex);
				return prompt("Copy to clipboard: Ctrl+C, Enter", text);
			}
			finally {
				document.body.removeChild(textarea);
			}
		}
	}
	
</script> 
<script>
var network_name = "bsc"; 
function noaktive_tab()
{
	$.each($(".toptab"),function()
	{
		$(this).attr("aria-expanded",false);
		$(this).removeClass("active"); 
	});
	$.each($(".coltab"),function()
	{
		$(this).removeClass("show");
		$(this).removeClass("active");
		 
	});
}
$(function()
{
	

	callnetwork();
	new QRCode(document.getElementById("qrcode"), '<?=$wallet['wallet']?>'); 
	//
	var timer2 = '30:01';
	var interval = setInterval(function() {
	
	
	  var timer = timer2.split(':');
	  //by parsing integer, I avoid all extra string processing
	  var minutes = parseInt(timer[0], 10);
	  var seconds = parseInt(timer[1], 10);
	  --seconds;
	  minutes = (seconds < 0) ? --minutes : minutes;
	  if (minutes < 0){
		  clearInterval(interval);
		  //document.location.href = "<?=site_url("deposit")?>";
	  }
	  seconds = (seconds < 0) ? 59 : seconds;
	  seconds = (seconds < 10) ? '0' + seconds : seconds;
	  //minutes = (minutes < 10) ?  minutes : minutes;
	  $('.countdown').html(minutes + ':' + seconds);
	  timer2 = minutes + ':' + seconds;
	}, 1000);
	// 
});
/*
function callnetwork()
{
	saveData();
	window.setTimeout(function(){
		window.setInterval(function(){
			saveData();
		},1*60*1000);
		saveData();
	},(1*60*1000));	
}
*/

function callnetwork()
{
	saveData();
	setTimeout("callnetwork()", 30000);
}
function saveData()
{
			var linkurl =  "<?="deposit/gettran-partner/".$currency['id']."/".$data['id']?>";
			console.log(linkurl);
			$.ajax({
                            url: linkurl,
                            type: 'GET',
                            data: {id:1},
                            async: false,
                            cache: false,
                            contentType: "json",
                            processData: false,
                            beforeSend: function(){
                                 
                            },
                            success: function(out)
                            {
                                
                                  
                            },
                            error: function()
                            {
                                  
                            },
                            complete:function(out){
                                console.log(out);
								var data = out.responseJSON;
								 
								if(typeof data.success_detect !== "undefined")
								{
									 
									if(data.error==true)
									{
										
										$(".text-"+ network_name).addClass('infos');
										//
										$(".text-"+ network_name).removeClass('animate-charcter');
										var txtdepo = "Purchase Trouble with Api";
										$(".text-"+ network_name).html(txtdepo);
										return;
									}else if(data.approve_payments)
									{
										$(".text-"+ network_name).addClass('infos');
										//
										$(".text-"+ network_name).removeClass('animate-charcter');
										var txtdepo = "Purchase is Confirmed <hr/>";
										txtdepo += "TXID: <span> <a href='"+ data.new_data.url +"' target='_blank'>"+ data.new_data.transaction_id + "</a></span><hr/>";
										txtdepo += "FROM: <span>"+ data.new_data.from + "</span> </hr/>";
										//txtdepo += "<br/>Page Will be Redirect...";
										//txtdepo += "<a href='<?=site_url("depo")?>' class='btn btn-info btn-full'>Thank You For Deposit, Back To Page</a>";
										
										
										$(".text-"+ network_name).html(txtdepo);
										setTimeout(function()
										{
											if(parseFloat(data.total)>0)
											{
												bootbox.alert({
													message: 'Thank You, Purchase has been receive',
													backdrop: true,
													callback: function (result) {
													  document.location.href = "<?=site_url("services")?>";
													}
					
												});
											}
										},15000);
										return;
									} 
								} 
								
                            }
                        });	
}
</script>