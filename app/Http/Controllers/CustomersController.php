<?php

namespace App\Http\Controllers;

use App\Models\Customer; //pongo las rutas para que la encuentre cuando instancie
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; //import mail
use App\Mail\WelcomeNewUserMail; //import del "controller" del mail que he creado antes
use App\Events\NewCustomerHasRegisteredEvent; //importo el event
class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        
        /*return view('internals.customers', [ //envio los customers a la vista
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers
        ]); ESTA ES LA FORMA NORMAL, LA SIGUIENTE HACE LO MISMO DE FORMA COMPACTA*/ 
        return view('customers.index', compact( 'customers')); 
        //paso la variable con los datos al view.
    }

    public function create(){
        $companies = Company::all(); //pillo las compañias
        $customer = new Customer();
        return view ('customers.create',  compact('companies','customer'));
    }

    public function store()
    {
              
        $customer = Customer::create($this->validameEsto()); //creo customer a traves de customer.php con create con el array que he pasado.
        //a esto de pillar todos los datos con $data y mandarlos se le llama mass asigment
        
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
         
        $customer->update($this->validameEsto()); //instancio el customer

        return redirect('customers/'. $customer->id);
    }

    public function destroy(Customer $customer) //funcion para eliminar
    {
            $customer->delete();
            return redirect('customers');
    }

    private function validameEsto() //metodo para validar todos los atributos de un objeto que le quiero poner al crearlo.
    {
        return request()->validate([ //creo array data, donde guardo los campos introducidos
            'name'=>'required|min:3', //name viene del imput 'name' -- esta comprobacion pide que el input sea required y minimo de 3 caracteres.
            'email'=>'required|email',
            'active'=>'required',
            'company_id'=>'required'//clave foranea de la empresa
        ]);

    }
}
