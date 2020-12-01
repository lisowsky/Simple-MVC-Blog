<?php

namespace BlogMVC\Engine\Router;

/**
 * Klasa zawiera kolekcję elementów klasy Route.
 * @package BlogMVC\Engine\Router
 * 
 * 
 */
class RouteCollection
{
    /**
     * @var array Tablica obiektów klasy Route
     */
    protected $items;

    /**
     * Dodaje obiekt Route do kolekcji
     * @param string $name Nazwa elementu
     * @param Route $item Obiekt Route
     */
    public function add($name, $item)
    {
        $this->items[$name] = $item;
    }

    public function get($name)
    {
        if (array_key_exists($name, $this->items)) {
            return $this->items[$name];
        } else {
            return null;
        }
    }

    /**
     * Zwraca wszystkie obiekty kolekcji
     * @return array array
     */
    public function getAll()
    {
        return $this->items;
    }
} 