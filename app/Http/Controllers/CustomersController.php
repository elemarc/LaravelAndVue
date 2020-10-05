<?php

namespace App\Http\Controllers;

use App\Models\Customer; //pongo las rutas para que la encuentre cuando instancie
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; //import mail
use App\Mail\WelcomeNewUserMail; //import del "controller" del mail que he creado antes
use App\Events\NewCustomerHasRegisteredEvent; //importo el event
use Intervention\Image\Facades\Image;//importo el facade de intervention para poder restringir y cambiar tamaño de las imagenes


class CustomersController extends Controller
{
    public function index()
    {                                               //hago que envie de 15 en 15 para paginarlos
        $customers = Customer::with('company')->simplepaginate(15);//hago que me pille el customer, y la compañia ligada entera directamente, añadiendola como un campo más al objeto
        return view('customers.index', compact( 'customers')); //el customers en el compact es $customers
        //paso la variable con los datos al view.
    }

    public function create(){
        $companies = Company::all(); //pillo las compañias
        $customer = new Customer();
        return view ('customers.create',  compact('companies','customer'));
    }

    public function store()
    {
        $this->authorize('create', Customer::class);//aplico la policy create en CustomerPolicy.php, y le paso la clase del modelo, ya que esta define lo que se va a crear (en este caso un customer)
        $customer = Customer::create($this->validameEsto()); //creo customer a traves de customer.php con create con el array que he pasado.
        //a esto de pillar todos los datos con $data y mandarlos se le llama mass asigment
        
        $this->guardarImagen($customer); //llamo a la funcion para guardar la imagen
        event(new NewCustomerHasRegisteredEvent($customer)); //evento para cuando se crea un nuevo customer y mando en el el customer
        
       return redirect('customers'); //redirect de vuelta a la pagina
    }

    /*public function show($customer)
    {
        $customer = Customer::where('id', $customer)->firstOrFail(); //first or fail hace que si no devuelve resultado, lance un 404
        
        return view('customers.show', compact('customer'));
    }*/

    public function show(Customer $customer)//si pongo Customer (app.customer y el objeto que es un app.customer isntanciado, me hace lo de arriba automaticamente)
    {        
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)//si pongo Customer (app.customer y el objeto que es un app.customer isntanciado, me hace lo de arriba automaticamente)
    {        
        $companies = Company::all(); //pillo las compañias
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)//si pongo Customer (app.customer y el objeto que es un app.customer isntanciado, me hace lo de arriba automaticamente)
    {        
         
        $customer->update($this->validameEsto());
        $this->guardarImagen($customer);//para la imagen

        return redirect('customers/'. $customer->id);
    }

    public function destroy(Customer $customer) //funcion para eliminar
    {
            $this->authorize('delete', $customer);//aplico la policy create en CustomerPolicy.php, y le paso el customer que se tiene que eliminar
            $customer->delete();
            return redirect('customers');
    }

    private function validameEsto() //metodo para validar todos los atributos de un objeto que le quiero poner al crearlo.
    { //creo array data, donde guardo los campos introducidos
        return request()->validate([ //tap hace que pueda meter estos datos primero y luego 
            //pueda hacer una funcion con el if para comprobar si hay imagen, y lo junta todo
            'name'=>'required|min:3', //name viene del imput 'name' -- esta comprobacion pide que el input sea required y minimo de 3 caracteres.
            'email'=>'required|email',
            'active'=>'required',
            'company_id'=>'required',
            'image'=>'sometimes|file|image|max:5000', //que sea un fichero, que tenga extension de imagen, que sea 5mb como maximo
        ]);             //sometimes hace que lo acepte si lo hay y no si no lo hay
    }

    private function guardarImagen($customer)
    {
        if (request()->has('image')){ //si la request tiene imagen
        $customer->update([ //updateo customer con la imagen
            'image' => request()->image->store('uploads', 'public'), //lo guardo en la carpeta uploads en public (store es propio, no es mi store)
        ]);                         //este image es clase uploadedFile

        $image = Image::make(public_path('storage/' . $customer->image))->fit(300,300); //limito la imagen a 300x300 con Intervention
        $image->save();
        //trabajo con la imagen con la clase Image de Intervention, pillando la ruta de la imagen del cliente
        }
    }
}
