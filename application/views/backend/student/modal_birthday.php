<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-body" style="height:550px;padding:0px 6px !important;">
    	<audio id="beep__active" src="<?=base_url()?>assets/Traditional-Happy-Birthday-To-You-Song.mp3"></audio>
        <script>
        $("document").ready(function(){
            // function musicPlay() {
            //     document.getElementById('beep__active').play();
            // }
            musicPlay();
            
            document.addEventListener('click', musicPlay);
            document.addEventListener('load', musicPlay);
            function musicPlay() {
                document.getElementById('beep__active').play();
                document.removeEventListener('click', musicPlay);
                
            }
        });    
        </script>

        <!--Birthday Wish Card-->
        <style>
            .modal .modal-content,.panel
            {
                background: transparent !important;
                box-shadow: 0px 0px 0px 0px !important;
            }
            .birthday_card
            {
                background-image: linear-gradient(to right top, #1f0537, #380c60, #55108c, #7413bb, #9612eb) !important;
                height: 350px;
                width: 100%;
                margin: 0px auto;
                /*margin: 0;*/
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            .card {
            	 position: relative;
            	 top:-25px;
            	 bottom:20px;
            	 width: 300px;
            	 height: 425px;
            	 /*border: 10px solid #fff;*/
            	 margin: 60px auto 0 auto;
            	 box-shadow: inset 10px 0px 15px 0px rgba(0, 0, 0, 0.1);
                background-image: linear-gradient(to bottom, rgba(255, 255, 255), rgba(255, 255, 255, 0.5)), url("https://images.unsplash.com/photo-1527481138388-31827a7c94d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60");
                background-position: center; /* Center the image */
                background-repeat: no-repeat; /* Do not repeat the image */
                background-size: cover;
            	background-color: #e6f0e6;
            }
            @media only screen and (max-width: 400px) 
            {
                .card {
                    width:100%;
                    height:100%;
                }
                .birthday_card
                {
                    height:76%;
                    background: transparent !important;
                }
            }
            .card .text-container {
            	 width: 80%;
            	 height: 80%;
            	 margin: auto;
            }
            .strikethrough {
            	 text-decoration: line-through;
            }
            .card .text-container #head {
            	 font-family: 'Nobile', sans-serif;
            	 font-size: 1.5em;
            	 margin: 60px auto 60px auto;
            }
            .card p {
            	 font-size: 1.1em;
            	 line-height: 1.4;
            	 font-family: 'Nobile';
            	 color: #331717;
            	 font-style: italic;
            	 text-align: center;
            	 margin: 30px auto 0px auto;
            }
            .card .front {
            	 position: absolute;
            	 width: 100%;
            	 height: 100%;
            	 margin: -10px 0px 0px -10px;
            	 border: 10px solid #9612eb;
            	 backface-visibility: hidden;
            	 background-color: #9612eb;
            	/* background-image: url($cover-image);
            	 */
            	 background-size: contain;
            	 transform-style: preserve-3d;
            	 transform-origin: 0% 50%;
            	 transform: perspective(800px) rotateY(0deg);
            	 transition: all 0.8s ease-in-out;
            }
            .card:hover .front {
            	 transform: perspective(800px) rotateY(-170deg);
            	 background-color: #41718d;
            }
            .card:hover .back {
            	 transform: perspective(800px) rotateY(-170deg);
            	 box-shadow: 7px 0px 5px 0px rgba(0, 0, 0, 0.3), inset 2px 0px 15px 0px rgba(0, 0, 0, 0.1);
            	 background-color: #d2dcd2;
            }
            .card .back {
            	 position: absolute;
            	 width: 100%;
            	 height: 100%;
            	 border: 10px solid #9612eb;
            	 margin: -10px 0px 0px -10px;
            	 backface-visibility: visible;
            	 filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, .5));
            	 transform-style: preserve-3d;
            	 transform-origin: 0% 50%;
            	 transform: perspective(800px) rotateY(0deg);
            	 transition: all 0.8s ease-in-out;
            	 background-color: #e6f0e6;
            	 box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.1);
            }
            .imgset
            {
              position: relative;
              z-index: 1;
              margin-bottom: -215px;
             }
            .imgset img
            {
                box-shadow: 0px 6px 11px 7px rgba(0, 0, 0, 0.22);
                border-radius: 5px;
            }
     </style>
        <div class="birthday_card">
            <div class="card">
                <div class="back"></div>
                <div class="front">
                  <div class="imgset">
                    <img width="100%" src="https://1.bp.blogspot.com/-Mgj9-rbs65E/XfMoPSD5gtI/AAAAAAAAURk/NBokE2gSS2cTSJ2em5lZ5hJDuTtRN7UVwCLcBGAsYHQ/s1600/2713997.png">
                  </div>
                </div>
                <div class="text-container">
                  <p id="head">Happy Birthday <?=ucfirst($_SESSION['name']);?>!</p>
                  <p>I hope your special day will bring you lots of happiness, love, and fun. You deserve them a lot. Enjoy!</p>
                  <p>Hope your day goes great!</p>
                  <p>From <?= $_SESSION['school_name'] ?> Management</p>
                </div>
                <!--<button class="modal_save_btn" style="position:relative;top:50px;">Close</button>-->
            </div>
        </div> 
        <br>
        <!--Birthday Wish Card-->            
    </div>    
</div> 
