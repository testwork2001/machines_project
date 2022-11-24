<?php

namespace App\Traits;


trait ProductSpecs
{
    public function format(array $specs)
    {
        $newSpecs = [];
        foreach ($specs as $spec) {
            $spec = [
                'spec_id' => $spec['spec_id'],
                'value' => $spec['value']
            ];
            $newSpecs[] = $spec;
        }

        return $newSpecs;
    }

    public function storeSpecs(array $specs): void
    {
        $this->specs()->attach( $this->format($specs));
    }

    
}
