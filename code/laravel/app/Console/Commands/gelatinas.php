<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MoldeGelatina {

    protected static $material = 'metal';
    public static $capacidad = 1;

    private $sabor;

    public function __construct(string $sabor)
    {
        $this->setSabor($sabor);
    }
    //getter and setters
    public function setSabor(string $sabor) {
        $this->sabor = $sabor;
    }

    public function getSabor() {
        return $this->sabor;
    }

    static public function getMaterial() {
        return static::$material;
    }
}

class MoldeGelatinaClaberitas extends MoldeGelatina {
    public static $capacidad = 0.5;
    protected static $material = 'plastico';
}

class Singleton {
    private $name;
    private static $objeteoUnico = null;


    private function __construct($name) {
        $this->name = $name;
    }

    static public function getInstance() {
        $name = 'Hola';
        if(self::$objeteoUnico === null) {
            self::$objeteoUnico = new Singleton($name);
        }

        return self::$objeteoUnico;
    }
}


class gelatinas extends Command
{
    /** @var string */
    protected $signature = 'nerding:gelatinas';

    /** @var string */
    protected $description = 'Command description';

    public function handle(): int
    {

        $obj1 = Singleton::getInstance();
        $obj2 = Singleton::getInstance();

        $obj3 = Singleton::getInstance();

        $obj4 = Singleton::getInstance();

        dd($obj2 === $obj3 );
        die;
        $this->line(MoldeGelatina::getMaterial());
        $gelatinaDeLimon = new MoldeGelatina('limon');
        $gelatinaDeLimon->setSabor('naranja');
        $gelatinaDeFresa = new MoldeGelatina('fresa');


        $gelatinaDeCalaberitaDeLimon = new MoldeGelatinaClaberitas('limon');
        MoldeGelatinaClaberitas::$capacidad = 2;
        $this->line('Mi molde de gelatina de calaberitas es de '. MoldeGelatinaClaberitas::$capacidad . ' litros');
        $this->line('Mi molde de gelatina de calaberitas es de ' . MoldeGelatinaClaberitas::getMaterial());
        $this->line('Mi gelatina de calaberita es de sabor ' . $gelatinaDeCalaberitaDeLimon->getSabor());


        dd(
            $gelatinaDeLimon->getSabor(),
            $gelatinaDeFresa->getSabor()
        );

        /*
        $this->line('Display this on the screen');
        $this->newLine();
        $this->info('The command was successful!');

        $this->newLine(2);
        $this->error('Something went wrong!');
        $this->comment('Comentario');
        $this->question('question');
        $this->newLine(5);
        $this->warn('warning');
        */
        //
        //echo "Hola mundo! PHP en CLI :O ";
        return 0;
    }
}
