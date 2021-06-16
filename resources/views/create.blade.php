
    @extends('app')
@section('titulo', 'Adicionar Diarista')

@section('conteudo')
<h1>Adicionar Diarista</h1>

            <form action ="{{route('diaristas.store')}}" method="POST" enctype="multipart/form-data">
               
                  @include('_form')

                
                
        </form>
@endsection
    
   