<label for="name">Name:</label>
        <div class="form-group">
            <input type="text" name="name" value="{{old('name') ?? $customer->name}}" class="form-control">
             <!-- con old guardo los datos para que se vuelvan a poner en caso de que se resetee al enviar el formulario en el list -->
              <!-- hago un if para que muestre el nombre del usuario a editar en caso de que el form se use en edit -->

            </div>
        <div class="text-danger">{{ $errors->first('name')}}</div> <!-- le pido a laravel que me muestre el primer error de name, si lo hay -->
    
        <label for="email">Email:</label>
        <div class="form-group">
            <input type="text" name="email" value="{{old('email') ?? $customer->email}}" class="form-control">
        </div>
        <div class="text-danger">{{ $errors->first('email')}}</div> <!-- le pido a laravel que me muestre el primer error de email, si lo hay -->
        
        <div class="form-group">
            <label for="active">Status:</label>
            <select name="active" id="active" class="form-control">
                <option value="" disabled> Select customer status </option>

                @foreach ($customer->opcionesActivacion() as $opcionesActivacionKey => $opcionesActivacionValue)<!-- pillo todos posibles atributos de activacion y las guardo en OAKey guardo cada una en OAValue -->
                <!-- por cada opcion de activacion hace un foreach y si el valor de active es igual al valor que llega lo deja como selected -->
                <option value="{{$opcionesActivacionKey}}" {{ $customer->active == $opcionesActivacionValue ? 'selected' : ''}}> {{ $opcionesActivacionValue}} </option> 
                @endforeach
                
            </select>
        </div>
        
        <div class="form-group">
            <label for="company_id">Company:</label>
            <select name="company_id" id="company_id" class="form-control">
                @foreach($companies as $company)
                <option value="{{$company->id}}" {{$company->id == $customer->company_id ? 'selected' : ''}}> {{$company->name}} </option>
                 <!-- si el usuario introducido tiene una compañía, seleccionala, si no, no-->
                @endforeach
            </select>
        </div>

        <div class="form-group d-flex flex-column">
            <label for="image"> Profile Image </label>
            <input name="image" type="file" class="py-2">
            <div class="text-danger">{{ $errors->first('image')}}</div> <!-- le pido a laravel que me muestre el primer error de image, si lo hay -->
        </div>
        @csrf