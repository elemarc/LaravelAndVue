<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Company;

class AddCompanyCommand extends Command
{ //COMANDO: PHP ARTISAN CONTACT:COMPANY 'ARG' 'ARG'
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company {name} {phone=N/A}'; 
    //{name} despues para que el usuario introduzca el nombre en el comando como argumento
    //{phone=N/A} para si el usuario no ha introducido phone lo mete cmo n/a
  
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new Company';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name =$this->ask('Cual es el nombre de la compania?'); //pido que introduzca el nombre de la compañia
        if ($name!=null){
            $this->info($name);
            $phone =$this->ask('Cual es el telefono de la compania?'); //pido que introduzca el nombre de la compañia
            if ($phone!=null){
            $this->info($phone);
            } else{
                $phone='N/A';
            }

            if ($this->confirm('Seguro que quieres insertar "' . $name . '"?')){

                $company = Company::create([ //CREO UN OBJETO TIPO COMPANY, MIRO LOS ATRIBUTOS EN EL CREATE COMPANIES
                    'name' => $name, //pillo el nombre de la variable name que pilla lo preguntado
                    'phone' => $phone, //
                ]);
                $this->info('Compania "' . $name . '" anadida');
                }else{
                    $this->warn('No se ha añadido ninguna compania');
            }

        } else {
            $this->error('No se ha introducido ningun nombre');
        }

        

      
        //$this->warn('warning String here');
        //$this->error('error String here');
    }
}
