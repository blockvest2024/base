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
                <div class="pricex row">
                        <?php
						 for($i=0;$i<count($types);$i++)
						 {
						?>
                        	<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                            	<div class="cards">
                                    <div class="card shadow">
                                      <ul>
                                        <li class="pack"><?=$types[$i]['name']?></li>
                                        <li id="basic" class="price bottom-bar"><?=$types[$i]['prices']?> Eth</li>
                                        <!-- 
                                        <li class="bottom-bar"><?=$services_type['name']?></li>
                                        <li class="bottom-bar"><?=$data['name']?></li>
                                        --> 
                                        <li><a href="<?=site_url('services/details/'.$types[$i]['id'])?>" class="btn">Detail</a></li>
                                      </ul>
                                    </div>
                                </div> 
                                <br/> 
                            </div>       
                        <?php
						 }
						?>
                         
                </div>
            </div>
			 
             
            </div>
         </div>
          
      </div>
      <!-- App side area end -->
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