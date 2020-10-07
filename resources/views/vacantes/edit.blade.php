@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.navegacion')
@endsection

@section('content')
<h1 class="text-2xl text-gray-700 text-center mt-4">Actualiza la Vacante: <span class="font-bold">{{ $vacante->vacante }}</span></h1>
    <form action="{{ route('vacante.update', ['vacante' => $vacante->id]) }}" method="POST" class="w-full max-w-lg mx-auto mt-5 bg-white rounded p-3 shadow-md mb-3" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="vacante" class="block tracking-wide text-gray-700 uppercase text-sm font-bold mb-2">Titulo Vacante</label>
                <input type="text" name="vacante" class="w-full block bg-gray-200 text-gray-700 appearance-none rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500 leading-tight @error('vacante') is-invalid @enderror" id="vacante" placeholder="Ejemplo: FullStack" value="{{ $vacante->vacante }}">
                @error('vacante')
                    <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="categoria" class="block tracking-wide text-gray-700 text-sm uppercase font-bold mb-2">Categoria Vacante</label>
                <select name="categoria" class="block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500 leading-tight" id="categoria">
                    <option disabled selected>---Selecciona---</option>
                    @foreach($categorias as $categoria)
                        <option {{ $vacante->categoria_id == $categoria->id ? 'selected' : '' }} value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach
                </select>
                @error('categoria')
                    <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="experiencia" class="block tracking-wide text-gray-700 text-sm uppercase font-bold mb-2">Nivel de Experiencia</label>
                <select name="experiencia" class="block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500 leading-tight" id="experiencia">
                    <option disabled selected>---Selecciona---</option>
                    @foreach($experiencias as $experiencia)
                        <option {{ $vacante->experiencia_id == $experiencia->id ? 'selected' : '' }} value="{{ $experiencia->id }}">{{ $experiencia->experiencia }}</option>
                    @endforeach
                </select>
                @error('experiencia')
                    <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                <label for="ubicacion" class="block tracking-wide text-gray-700 text-sm uppercase font-bold mb-2">Ubicación</label>
                <select name="ubicacion" class="block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500 leading-tight" id="ubicacion">
                    <option disabled selected>---Selecciona---</option>
                    @foreach($ubicaciones as $ubicacion)
                        <option {{ $vacante->ubicacion_id == $ubicacion->id ? 'selected' : '' }} value="{{ $ubicacion->id }}">{{ $ubicacion->ubicacion }}</option>
                    @endforeach
                </select>
                @error('ubicacion')
                    <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="w-full px-3 md:w-1/2 md:mb-0 mb-6">
                <label for="salario" class="block tracking-wide text-gray-700 text-sm uppercase font-bold mb-2">Rango Salarial</label>
                <select name="salario" class="block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500 leading-tight" id="salario">
                    <option disabled selected>---Selecciona---</option>
                    @foreach($salarios as $salario)
                        <option {{ $vacante->salario_id == $salario->id ? 'selected' : '' }} value="{{ $salario->id }}">{{ $salario->salario }}</option>
                    @endforeach
                </select>
                @error('salario')
                    <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="descripcion" class="block tracking-wide text-gray-700 text-sm uppercase font-bold mb-2">Descripción del Puesto</label>
                <div class="editable bg-gray-200 rounded p-3 w-full form-input text-gray-700"></div>
                <input type="hidden" name="descripcion" id="descripcion" value="{{ $vacante->descripcion }}">
                @error('descripcion')
                    <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="dropzone" class="block tracking-wide text-gray-700 text-sm uppercase font-bold mb-2">Imagen Vacante</label>
                <div id="dropzone" class="dropzone rounded bg-gray-100"></div>
                <input type="hidden" name="imagen" id="imagen" value="{{ $vacante->imagen }}">
                    @error('imagen')
                        <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                   @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="skills" class="block tracking-wide text-gray-700 text-sm uppercase font-bold mb-2">Habilidades Técnicas <span class="text-sm text-gray-500 lowercase">(Selecciona al menos una habilidad)</span></label>
                @php
                    $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular',
                    'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel',
                    'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress',
                    'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails', 'SQL Server', 'Woocomerce',
                    'Mongo DB', 'Flask', 'Java', 'Postgre SQL', 'Git', 'GitHub']
                @endphp
                <lista-skills :skills="{{ json_encode($skills) }}" :allskills="{{ json_encode($vacante->skill) }}"></lista-skills>
                @error('skill')
                    <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-teal-500 focus:outline-none rounded-full py-3 text-lg px-10 text-gray-200 hover:text-white">Publicar</button>
        </div>
    </form>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
<script>
    Dropzone.autoDiscover = false;
    document.addEventListener('DOMContentLoaded', ()=>{
        /*Script para Medium Editor*/
        const editor = new MediumEditor('.editable', {
            toolbar:{
                buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedlist', 'unorderedlist', 'h2', 'h3'],
                static: true,
                sticky: true
            },
            placeholder:{
                text: 'Descripción de la Vacante'
            }
        });
        editor.subscribe('editableInput', function(eventObj, editable){
            const contenido = editor.getContent();
            document.querySelector('#descripcion').value = contenido;
        })
        /*Llenar el editor con el contenido del input hidden*/
        editor.setContent(document.querySelector('#descripcion').value);

        /*Script para DropZone*/
        const dropZoneDevJobs = new Dropzone('#dropzone', {
            url: '/vacante/imagen',
            dictDefaultMessage: 'Carga tus imagenes aquí',
            acceptedFiles: ".png, .jpg, .jpeg, .gif, .bmp",
            addRemoveLinks: true,
            dictRemoveFile: 'Quitar Imagen',
            maxFiles: 1,
            headers:{
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
            },
            init: function () {
                if (document.querySelector('#imagen').value.trim()) {
                    let imagenPublicada = {};
                    imagenPublicada.size = 1234;
                    imagenPublicada.name = document.querySelector('#imagen').value;
                    imagenPublicada.nombreServidor = document.querySelector('#imagen').value;
                    this.options.addedfile.call(this, imagenPublicada);
                    this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);
                    imagenPublicada.previewElement.classList.add('dz-sucess');
                    imagenPublicada.previewElement.classList.add('dz-complete');
                }
            },
            success: function(file, response){
                /*Enviando la respuesta del servidor en el input hidden*/
                document.querySelector('#imagen').value = response.success;
                /*Añadir el objeto de archivo al nombre del servidor*/
                file.nombreServidor = response.success;
            },
            maxfilesexceeded: function(file) {
                if (this.files[1] != null)
                {
                    this.removeFile(this.files[0]);//Elimina el archivo anteriormente cargado
                    this.addFile(file);//Agrega el nuevo archivo cargado
                }
            },
            removedfile: function(file, response) {
                //Eliminado la vista previa de la imagen a borrar del DOM
                file.previewElement.parentNode.removeChild(file.previewElement);
                /*Creando un objeto para enviar el nombre de la imagen al servidor*/
                params = {
                    imagen: file.nombreServidor
                }
                /*Enviando la petición de borrarImagen mediante axios al servidor*/
                axios.post('/vacante/borrarimagen', params)
                .then(respuesta => console.log(respuesta))
            }
        });
    })
</script>
@endsection
