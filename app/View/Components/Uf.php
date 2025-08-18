<?php
namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class Uf extends Component
{
    public $valor;

    public function __construct()
    {
        $this->valor = $this->getUf();
    }

    private function getUf()
    {
        try {
            $response = Http::get('https://mindicador.cl/api/uf');
            if ($response->ok()) {
                $data = $response->json();
                return $data['serie'][0]['valor'] ?? 'No disponible';
            }
        } catch (\Exception $e) {
            return 'No disponible';
        }
        return 'No disponible';
    }

    public function render()
    {
        return view('components.uf');
    }
}
