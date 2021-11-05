<?php
include 'conexao.php';

$raceQuery = mysqli_query($con,'select * from corrida where status="motorista" order by idCorrida DESC');

$resulRaceQuery = mysqli_fetch_assoc($raceQuery);

$userInfoQuery = mysqli_query($con, "select * from usuario where codUser =" . $resulRaceQuery["infUser"]);

$resulUserInfoQuery = mysqli_fetch_assoc($userInfoQuery);
    
$popUp = '<div class="profileRace-container">
                    <figure class="picClient-box">
                        <img src="../img/proPic-user.png" alt="profile-picture-user">
                    </figure>
                    <div class="txtClient-box">
                    <h1 class="clientName p-title">'. $resulUserInfoQuery['nome'] .'</h1>
                    <div class="speRace-box">
                        <div class="paySpe-box">
                            <p class="p-txt">'. $resulRaceQuery['pagamento'] .'</p>
                        </div>
                        <div class="defSpe-box">
                            <figure class="def-icon">
                                <img src="../img/hand-icon.png" alt="hand-icon">
                            </figure>                        
                            <p class="p-txt">'. $resulUserInfoQuery['especificacao'] .'</p>
                        </div>
                    </div>
                    </div>
                    <div class="cashTxt-box">
                        <h1 class="cash  p-title">'. $resulRaceQuery['preco'] .'</h1>
                        <p class="distance p-txt">'. $resulRaceQuery['distancia'] .'</p>
                    </div>
                </div>
                <div class="race-container">
                    <div class="dot-container">
                        <div class="dot black-dot"></div>                        
                        <div class="trace-div"></div>
                        <div class="dot green-dot"></div>
                    </div>
                    <div class="localRequest-container">
                        <div class="local-box pickUp-box">
                            <h2 class="localType-title">Pick Up</h2>
                            <p class="local-txt">'. $resulRaceQuery['endOrigem'] .'</p>
                        </div>

                        <div class="local-box dropOff-box">
                            <h2 class="localType-title">Drop Off</h2>
                            <p class="local-txt">'. $resulRaceQuery['endDestino'] .'</p>
                        </div>
                    </div>
                </div>
                <div class="requestBtn-container">
                    <button class="btn ignore-btn"> Ignore </button>
                    <button id="btnAcceptRace" class="btn accept-btn"> Accept </button>
                </div>';
    
echo json_encode($popUp);

    

