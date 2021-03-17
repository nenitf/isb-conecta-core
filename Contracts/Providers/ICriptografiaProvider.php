<?php

namespace Core\Contracts\Providers;

interface ICriptografiaProvider
{
    public function cifrar(string $senha): string;
}
