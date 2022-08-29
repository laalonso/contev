@extends('layouts.app')

@section('content')
<style>
    .tagbox li .tag {
    background: lightblue;
    color: black;
}

.tagbox .selected .tag {
    background: #ECD0D0;
}

.tagbox li .delete {
    text-indent: 0px;
}

.tagbox li .delete:hover {
    color: white;
    background-color: red;
    -webkit-transition: background-color 300ms linear;
    -ms-transition: background-color 300ms linear;
    transition: background-color 300ms linear;
}
.tagbox ul {
    overflow: hidden;
    padding: 10px 10px 6px 10px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}
.tagbox {
    background: #fff;
    border: 0px;
    border-bottom: 1px solid #ddd;
}
li.new input[type="text"]{
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    font-family: 'Roboto', Arial, Tahoma, sans-serif;
    margin-left: -10px;
    border: 0;
    border-bottom: 2px solid #ddd;
    outline: none !important;
    position: relative;
    display: block;
    width: 100% !important;
    margin-left: 0px !important;
}

li.new{
    position: relative;
}

li.new::after{
    content: '';
    width: 0%;
    height: 2px;
    background: blue;
    position: absolute;
    left: 0;
    bottom: 0;
    right: 0;
    margin: auto;
    display: block;
    z-index: 10;
    transition: all 0.5s;
}

li.activo:after{
    width: 100%;
    transition: all 0.5s;
}

li.new input[type="text"]::-moz-placeholder {
    color: #999;
    opacity: 1;
}
li.new input[type="text"]:-ms-input-placeholder {
    color: #999;
}
li.new input[type="text"]::-webkit-input-placeholder {
    color: #999;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Iniciar Test de') }} {{Auth::user()->name}} {{Auth::user()->f_surname}} {{Auth::user()->s_surname}}</div>

                <div class="card-body">
                 <form action="{{ url('/estudiante/test') }}" method="POST">
                        @csrf
                    
                                <div class="card">    
                                    'Instrucciones:Seleccione la opciòn que sea mas representativa de la actitud del postulante: + (aceptable) o - (no aceptable)'
                                </div> <br>
 <div class="row">                               
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="primero">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        1.- <small>Persuasivo</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="1" name="persuasivo"  type="checkbox" value="1" />+
                            <input class="check_boxes required" id="2" name="persuasivo"  type="checkbox" value="-1"  /> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                2.- <small>Gentil</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="1" name="gentil"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="2" name="gentil"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                3.- <small>humilde</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="1" name="humilde"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="2" name="humilde"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                4.- <small>Original</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="1" name="original"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="2" name="original"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
                                    
                                    
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="segundo">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        25.- <small>voluntad</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="3" name="voluntad"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="4" name="voluntad"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                26.- <small>mente</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="3" name="mente"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="4" name="mente"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                27.- <small>complaciente</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="3" name="complaciente"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="4" name="complaciente"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                28.- <small>animoso</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="3" name="animoso"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="4" name="animoso"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>

                                    
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="tercero">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        49.- <small>obediente</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="5" name="obediente"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="6" name="obediente"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                50.- <small>remilgoso</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="5" name="remilgoso"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="6" name="remilgoso"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                51.- <small>inconquistable</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="5" name="inconquistable"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="6" name="inconquistable"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                52.- <small>jugueton</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="5" name="jugueton"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="6" name="jugueton"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>

        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="cuarto">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        73.- <small>aventurero</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="7" name="aventurero"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="8" name="aventurero"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                74.- <small>receptivo</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="7" name="receptivo"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="8" name="receptivo"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                75.- <small>cordial</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="7" name="cordial"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="8" name="cordial"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                76.- <small>moderado</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="7" name="moderado"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="8" name="moderado"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
</div> <br>  

<div class="row">                               
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="quinto">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        5.- <small>decidido</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="9" name="decidido"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="10" name="decidido"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                6.- <small>Alma de fiesta</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="9" name="fiesta"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="10" name="fiesta"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                7.- <small>comodino</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="9" name="comodino"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="10" name="comodino"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                8.- <small>temeroso</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="9" name="temeroso"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="10" name="temeroso"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
                                    
                                    
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="sexto">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        29.- <small>confiado</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="11" name="confiado"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="12" name="confiado"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                30.- <small>simpatico</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="11" name="simpatico"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="12" name="simpatico"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                31.- <small>tolerante</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="11" name="tolerante"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="12" name="tolerante"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                32.- <small>afirmativo</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="11" name="afirmativo"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="12" name="afirmativo"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>

                                    
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="septimo">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        53.- <small>respetuoso</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="13" name="respetuoso"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="14" name="respetuoso"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                54.- <small>emprendedor</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="13" name="emprendedor"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="14" name="emprendedor"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                55.- <small>optimista</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="13" name="optimista"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="14" name="optimista"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                56.- <small>servicial</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="13" name="servicial"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="14" name="servicial"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>

        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="octavo">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        77.- <small>indulgente</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="15" name="indulgente"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="16" name="indulgente"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                78.- <small>estetico</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="15" name="estetico"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="16" name="estetico"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                79.- <small>vigoroso</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="15" name="vigoroso"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="16" name="vigoroso"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                80.- <small>sociable</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="15" name="sociable"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="16" name="sociable"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
</div> <br>                                         
       
<div class="row">                               
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="noveno">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        9.- <small>agradable</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="17" name="agradable"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="18" name="agradable"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                10.- <small>Temeroso de dios</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="17" name="tdios"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="18" name="tdios"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                11.- <small>tenaz</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="17" name="tenaz"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="18" name="tenaz"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                12.- <small>atractivo</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="17" name="atractivo"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="18" name="atractivo"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
                                    
                                    
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="decimo">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        33.- <small>ecuanime</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="19" name="ecuanime"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="20" name="ecuanime"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                34.- <small>preciso</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="19" name="preciso"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="20" name="preciso"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                35.- <small>nervioso</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="19" name="nervioso"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="20" name="nervioso"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                36.- <small>jovial</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="19" name="jovial"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="20" name="jovial"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
                       
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="once">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        57.- <small>valiente</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="21" name="valiente"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="22" name="valiente"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                58.- <small>inspirador</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="21" name="inspirador"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="22" name="inspirador"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                59.- <small>sumiso</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="21" name="sumiso"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="22" name="sumiso"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                60.- <small>timido</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="21" name="timido"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="22" name="timido"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>

        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="doce">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        81.- <small>parlanchin</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="23" name="parlanchin"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="24" name="parlanchin"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                82.- <small>controlado</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="23" name="controlado"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="24" name="controlado"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                83.- <small>convencional</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="23" name="convencional"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="24" name="convencional"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                84.- <small>terminante</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="23" name="terminante"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="24" name="terminante"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
</div> <br>                                         

<div class="row">                               
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="trece">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        13.- <small>cauteloso</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="25" name="cauteloso"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="26" name="cauteloso"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                14.- <small>determinado</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="25" name="determinado"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="26" name="determinado"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                15.- <small>convincente</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="25" name="convincente"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="26" name="convincente"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                16.- <small>nonachon</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="25" name="nonachon"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="26" name="nonachon"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
                                    
                                    
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="catorce">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        37.- <small>diciplinado</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="27" name="diciplinado"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="28" name="diciplinado"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                38.- <small>generoso</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="27" name="generoso"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="28" name="generoso"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                47.- <small>animado</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="27" name="animado"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="28" name="animado"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                40.- <small>persistente</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="27" name="persistente"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="28" name="persistente"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
                       
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="quince">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        61.- <small>adaptable</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="29" name="adaptable"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="30" name="adaptable"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                62.- <small>disputador</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="29" name="disputador"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="30" name="disputador"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                63.- <small>indiferente</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="29" name="indiferente"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="30" name="indiferente"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                64.- <small>Sangre liviana</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="29" name="sangreliviana"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="30" name="sangreliviana"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>

        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="diezseis">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        85.- <small>cohibido</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="31" name="cohibido"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="32" name="cohibido"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                86.- <small>Exacto</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="31" name="exacto"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="32" name="exacto"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                87.- <small>Franco</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="31" name="franco"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="32" name="franco"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                88.- <small>Buen compañero</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="31" name="buencompañero"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="32" name="buencompañero"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
</div> <br>                                         
     
<div class="row">                               
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="diezsiete">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        17.- <small>docil</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="33" name="docil"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="34" name="docil"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                18.- <small>atrevido</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="33" name="atrevido"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="34" name="atrevido"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                19.- <small>leal</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="33" name="leal"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="34" name="leal"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                20.- <small>cautivador</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="33" name="cautivador"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="34" name="cautivador"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
                                    
                                    
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="diezocho">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        41.- <small>competitivo</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="35" name="competitivo"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="36" name="competitivo"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                42.- <small>alegre</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="35" name="alegre"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="36" name="alegre"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                43.- <small>considerado</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="35" name="considerado"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="36" name="considerado"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                44.- <small>armonioso</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="35" name="armonioso"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="36" name="armonioso"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
                       
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="dieznueve">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        65.- <small>amiguero</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="37" name="amiguero"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="38" name="amiguero"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                66.- <small>paciente</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="37" name="paciente"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="38" name="paciente"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                67.- <small>Seguro de si</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="37" name="segurodesi"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="38" name="segurodesi"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                68.- <small>De hablar suave</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="37" name="hablarsuave"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="38" name="hablarsuave"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>

        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="veinte">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        89.- <small>diplomatico</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="39" name="diplomatico"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="40" name="diplomatico"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                90.- <small>Audaz</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="39" name="audaz"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="40" name="audaz"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                91.- <small>Refinado</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="39" name="refinado"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="40" name="refinado"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                92.- <small>satisfecho</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="39" name="satisfecho"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="40" name="satisfecho"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
</div>  <br>                                        
       
   
<div class="row">                               
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="veinteuno">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        21.- <small>dispuesto</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="41" name="dispuesto"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="42" name="dispuesto"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                22.- <small>deseoso</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="41" name="deseoso"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="42" name="deseoso"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                23.- <small>Condescendiente</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="41" name="condescendiente"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="42" name="condescendiente"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                24.- <small>Entusiasta</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="41" name="entusiasta"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="42" name="entusiasta"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
                                    
                                    
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="veintedos">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        45.- <small>Admirable</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="43" name="admirable"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="44" name="admirable"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                46.- <small>bondadoso</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="43" name="bondadoso"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="44" name="bondadoso"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                47.- <small>resignado</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="43" name="resignado"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="44" name="resignado"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                48.- <small>Caracter firme</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="43" name="firme"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="44" name="firme"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
                       
        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="veintetres">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        69.- <small>Conforme</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="45" name="conforme"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="46" name="conforme"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                70.- <small>Confiable</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="45" name="confiable"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="46" name="confiable"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                71.- <small>Pacifico</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="45" name="pacifico"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="46" name="pacifico"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                72.- <small>Positivo</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="45" name="positivo"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="46" name="positivo"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>

        <div class="col-sm-3">
            <div class="card" >                                    
                <div class="veintecuatro">
                    <span class="checkbox payment-radio">     
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        93.- <small>inquieto</small>
                        <fieldset>
                            <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="47" name="inquieto"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="48" name="inquieto"  type="checkbox" value="-1"> - 
                            </div>
                        </fieldset>
                        </li>
                    </span>
            <span class="checkbox payment-radio">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                94.- <small>popular</small>
                    <fieldset>
                        <div class="form-check form-check-inline">
                            <input class="check_boxes required" id="47" name="popular"  type="checkbox" value="1">+
                            <input class="check_boxes required" id="48" name="popular"  type="checkbox" value="-1"> -
                        </div>
                    </fieldset>
                    </li>
            </span>
            <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                95.- <small>Buen vecino</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="47" name="buenvecino"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="48" name="buenvecino"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
                <span class="checkbox payment-radio">
                <li class="list-group-item d-flex justify-content-between align-items-center">                      
                96.- <small>Devoto</small>
                <fieldset>
                        <div class="form-check form-check-inline">
                        <input class="check_boxes required" id="47" name="devoto"  type="checkbox" value="1">+
                        <input class="check_boxes required" id="48" name="devoto"  type="checkbox" value="-1">-
                        </div>
                </fieldset>
                </li>
                </span>
        
        </div>
        </div>
        </div>
</div> <br>                                         
       
                     
                   
<!--
                        <fieldset>
                              <label>Extra toppings;</label>
                              <input type="checkbox" name="toppings[]" value="1">Mushrooms<br/>
                              <input type="checkbox" name="toppings[]" value="1">Pappers<br/>
                              <input type="checkbox" name="toppings[]" value="1">Garlic<br/>
                              <input type="checkbox" name="toppings[]" value="1">Olives<br/>
                          </fieldset>
-->
                        <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="tagbox">
                                        <ul>
                                            <li class="new">
                                                <label for="observacion">Observaciones:</label>
                                                <input type="text" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}" id="observacion" name="observacion" maxlength="200" value="{{ old('observacion') }}" autocomplete="off" tabindex="0" type="text" placeholder="Ingrese un observacion" style="width: 200px; margin-left: -10px;">      @if ($errors->has('observacion'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('observacion') }}</strong>
                                                    </span>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                          
                           
                        
                            <div class="form-group col-md-12" align="right">
                             <!--     <a   href="{{ url('/root/enterprise/vacancies') }}" class="btn btn-secondary"" >Cancelar</a>-->
                                <!--<button class="btn btn-success">Guardar</button>-->
                                <input  id='submit' class="btn btn-primary" type="submit"  value="Enviar respuestas">
                           </div>   
                            
                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$( document ).ready(function() {
    $("#telefono").inputmask({"mask": "(+52) 999-999-99-99"});
});
</script>

<script type="text/javascript">

$("input:checkbox").on('click', function() {
 
  var $box = $(this);
  if ($box.is(":checked")) {
   
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>
<script type="text/javascript">

$("input:checkbox").on('click', function() {
 
  var $box = $(this);
  if ($box.is(":checked")) {
   
    var group = "input:checkbox[id='" + $box.attr("id") + "']";
    
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.primero .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.segundo .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.tercero .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.cuarto .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.quinto .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.sexto .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.septimo .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.octavo .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.noveno .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.decimo .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.once .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.doce .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.trece .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.catorce .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.quince .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.diezseis .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.diezsiete .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.diezocho .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.dieznueve .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.veinte .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.veinteuno .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>

<script>
var verifyPaymentType = function () {
  var checkboxes = $('.veintedos .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.veintetres .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>
<script>
var verifyPaymentType = function () {
  var checkboxes = $('.veintecuatro .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'seleccione dos respuestas' : '');
}

$('#submit').click(verifyPaymentType);

</script>

@endsection
