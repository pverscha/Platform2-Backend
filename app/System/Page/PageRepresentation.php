<?php
/**
 * @author Pieter Verschaffelt
 */

namespace App\System\Page;

use Illuminate\Support\Facades\View;

class PageRepresentation
{
    private $title;
    private $containers = [];

    public function __construct(string $title, array $containers)
    {
        $this->title = $title;
        $this->containers = $containers;
    }

    public function createView(): string
    {
        return View::make('frontend.pages.page', [
            'title' => $this->title,
            'columns' => $this->containers
        ]);
    }

    /**
     * @return Column[]
     */
    public function getContainers(): array
    {
        return $this->containers;
    }
}
