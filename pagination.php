<?php
// pagination.php

class Pagination
{
    private $totalItems;
    private $itemsPerPage;
    private $currentPage;
    private $totalPages;
    private $urlParams;

    public function __construct($totalItems, $itemsPerPage, $currentPage, $urlParams = '')
    {
        $this->totalItems = (int)$totalItems;
        $this->itemsPerPage = (int)$itemsPerPage;
        $this->currentPage = (int)$currentPage;
        $this->totalPages = (int)ceil($this->totalItems / $this->itemsPerPage);
        $this->urlParams = $urlParams;
    }

    public function getOffset()
    {
        return ($this->currentPage - 1) * $this->itemsPerPage;
    }

    public function getTotalPages()
    {
        return $this->totalPages;
    }

    public function getLinks()
    {
        $links = '';
        if ($this->totalPages > 1) {
            $links .= '<div class="pagination">';

            // Previous page link
            if ($this->currentPage > 1) {
                $prevPage = $this->currentPage - 1;
                $links .= "<a href='index.php?page={$prevPage}{$this->urlParams}'>&laquo; Previous</a> ";
            }

            // Page numbers
            for ($i = 1; $i <= $this->totalPages; $i++) {
                if ($i == $this->currentPage) {
                    $links .= "<span class='current-page'>{$i}</span> ";
                } else {
                    $links .= "<a href='index.php?page={$i}{$this->urlParams}'>{$i}</a> ";
                }
            }

            // Next page link
            if ($this->currentPage < $this->totalPages) {
                $nextPage = $this->currentPage + 1;
                $links .= "<a href='index.php?page={$nextPage}{$this->urlParams}'>Next &raquo;</a>";
            }

            $links .= '</div>';
        }

        return $links;
    }
}
