<form action="{{route('createLead')}}" method="post" class="StartProject container m-b-40">
    @csrf
    <p class="m-t-28 m-b-0">Inicia tu proyecto con nosotros</p>
    <div class="row justify-around middle-items">
        <div class="col-16 col-m-8">
            <h1 class="H1">DESEAMOS TRABAJAR CONTIGO</h1>
        </div>
        <div class="col-16 col-m-8 row justify-end-l justify-center">
            <div class="StartProject-infoContent">
                <figure class="StartProject-infoFigure">
                    <img src="{{asset('images/telefono.png')}}" alt="">
                </figure>
                <div class="StartProject-info">
                    <p><b>¿Prefieres hablar directamente?</b></p>
                    <p>Pregunta por David el sensual</p>
                    <a class="StartProject-infoLink" href="tel:573227753537">(+57) 322 775 3537</a>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert-error m-t-28">
            <h6>¡Algo ah pasado! Por favor revisa el formulario y envialo de nuevo</h6>
        </div>
    @endif
    <h3>1. Acerca de tu proyecto</h3>
    <h4 class="m-t-a-32"><b>¿Qué tipo de proyecto deseas realizar?</b></h4>

    @if($errors->first('project_type'))
        <p class="error-message">Debes seleccionar el tipo de proyecto</p>
    @endif
    <div class="row justify-between-m justify-center">
        @foreach($services as $service)
            <div class="StartProject-radioContent">
                <div class="row">
                    <input type="checkbox"
                           id="service_{{$service->id}}"
                           name="project_type[{{ $service->id }}]"
                           value="{{$service->id}}"
                            {{old("project_type.{$service->id}")?'checked':''}}
                    >
                    <label class="label-input" for="service_{{$service->id}}">
                        {!! $service->icon !!}
                    </label>
                </div>
                <p class="StartProject-radioP ">{{$service->name}}</p>
            </div>
        @endforeach
    </div>
    <h4 class="m-t-a-32"><b>¿Cuál es tu presupuesto?</b></h4>
    @if($errors->first('budget'))  <p class="error-message">Si no sabes que presupuesto, selecciona "?"</p> @endif
    <div class="row m-b-20 justify-start-m justify-center">
        @foreach(['1M','2M','3M','?'] as $budget)
            <div class="StartProject-radioContent justify-between-m justify-center m-r-48">
                <div class="row">
                    <p class="StartProject-radioP is-full-width">
                        @if ($loop->last) Te ayudamos @else Menos de @endif</p>
                    <input type="radio" id="budget-{{$budget}}" name="budget" value="{{$budget}}"
                            {{old('budget')?'checked':''}}
                    >
                    <label class="justify-center row  middle-items label-input" for="budget-{{$budget}}">
                        {{$budget}}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    <h4 class="m-t-a-32"><b>¿Mi proyecto es *?</b></h4>
    @if($errors->first('project_description'))
        <p class="error-message">Debes describir tu proyecto</p>
    @endif
    <textarea name="project_description" rows="10" placeholder="Describenos tu proyecto"
              required>{{old('project_description')}}</textarea>
    <h3>2. Acerca de tu ti</h3>
    <div class="StartProject-question">
        @if($errors->first('name'))
            <p class="error-message">Debes escribir tu nombre</p>
        @endif
        <label for="name">Nombre completo *</label>
        <input type="text" id="name" name="name" placeholder="¿Cuál es tu nombre?" required
               value="{{old('name')}}">
    </div>
    <div class="StartProject-question">
        @if($errors->first('name'))
            <p class="error-message">Debes escribir el nombre de la empresa</p>
        @endif
        <label for="name_company">Nombre de tu empresa *</label>
        <input type="text" id="name_company" name="name_company" placeholder="¿Cómo se llama tu empresa?" required
               value="{{old('name_company')}}">
    </div>
    <div class="StartProject-question">
        @if($errors->first('url_website'))
            <p class="error-message">Debe ser una URl valida "https://artico.io"</p>
        @endif
        <label for="url_website">URL de tu página web </label>
        <input type="text" id="url_website" name="url_website"
               placeholder="¿Cuál es la dirección de tu página web?"
               value="{{old('url_website')}}"
        >
    </div>
    <div class="StartProject-question">
        @if($errors->first('name'))
            <p class="error-message">Correo invalido</p>
        @endif
        <label for="email">Correo electrónico *</label>
        <input type="email" id="email" name="email" placeholder="¿Cómo es tu dirección de correo?" required
               value="{{old('email')}}"
        >
    </div>
    <div class="StartProject-question">
        @if($errors->first('name'))
            <p class="error-message">Debes ingresar un télefono de contacto</p>
        @endif
        <label for="phone">Télefono de contacto *</label>
        <input type="text" id="phone" name="phone" placeholder="¿Cómo podemos contactarnos?" required
               value="{{old('phone')}}"
        >
    </div>
    <div class="StartProject-question">
        <label for="how_find">¿Cómo nos encontraste?</label>
        <select name="how_find" id="how_find">
            <option value="facebook" {{old('how_find') == 'facebook'?'selected':''}}>Vi su perfil en facebook y
                pues...
            </option>
            <option value="web" {{old('how_find') =='web'?'selected':''}}>Vi su sitio web y pues...</option>
            <option value="google" {{old('how_find') =='google'?'selected':''}}>Los vi en google y pues...</option>
            <option value="friend"> {{old('how_find') == 'friend'?'selected':''}}Un amigo me los recomendo y
                pues...
            </option>
            <option value="other" {{old('how_find') =='other'?'selected':''}}>Otro</option>
        </select>
    </div>
    <div>
        <button type="submit">
            <span>Vamos hablar</span>
            <svg width="32px" height="33px" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g fill="#FFFFFF">
                        <path d="M0.771626791,18.3362719 C-0.188619882,18.1385192 -0.252636327,17.6111788 0.579577456,17.1497559 L31.0514052,0.20894411 C31.9476354,-0.252478779 32.2677177,0.0771089991 31.7555861,0.934037222 L15.3673762,32.3767113 C14.9192611,33.299557 14.4071295,33.1677219 14.2150802,32.1789586 L12.5506526,22.1594901 C12.3586033,21.1707268 11.4623731,20.247881 10.5021264,20.0501284 L0.771626791,18.3362719 Z"
                              id="Path">
                        </path>
                    </g>
                </g>
            </svg>
        </button>
    </div>
</form>
