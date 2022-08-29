@extends('layouts.general')

@section('contenido')

        <!--=====================================-->
        <!--=          Contact Page Start       =-->
        <!--=====================================-->
        <section class="contact-page">
            <div class="map-area p-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3760.6382994175606!2d-96.87757068509202!3d19.51419138683797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85db33cb75a7c79f%3A0xb02728fa1a3fcff3!2sSEV%20-%20Secretar%C3%ADa%20de%20Educaci%C3%B3n%20de%20Veracruz!5e0!3m2!1ses-419!2smx!4v1647643497275!5m2!1ses-419!2smx" style="border:0;width:100%;height:450px;" allowfullscreen="" loading="lazy"></iframe>            </div>
            <div class="contact-box-wrap">
                <div class="container">
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="contact-box">
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('status') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                    <h3 class="item-title">Contáctanos</h3>
                                    <form method="post" action="/contacto" id="">
                                        @csrf
                                        <div class="row gutters-20">
                                            <div class="col-lg-6 form-group">
                                                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <input type="email" class="form-control" name="email" placeholder="E-mail">
                                            </div>
                                            <div class="col-lg-6 form-group">
                                                <input type="text" class="form-control" name="telefono" placeholder="Teléfono">
                                            </div>
                                            <div class="col-12 form-group">
                                                <textarea name="mensaje" id="message" cols="30" rows="3" class="textarea form-control" placeholder="Mensaje"></textarea>
                                            </div>
                                            <div class="col-12 form-group">
                                                <input type="submit" class="submit-btn" value="Enviar">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="contact-box contact-method">
                                    <h3 class="item-title">Información de Contacto</h3>
                                    <ul>
                                        <li><i class="icofont-location-pin"></i>Carr. Veracruz-Xalapa Km. 4.5, Sahop, 91190 Xalapa-Enríquez, Ver</li>
                                        <li><i class="icofont-ui-message"></i>vinculacion@gs.msev.gob.mx</li>
                                        <li><i class="icofont-phone"></i>228 841 7700 EXT. 7425</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection