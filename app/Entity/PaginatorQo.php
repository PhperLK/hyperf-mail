<?php


namespace App\Entity;


/**
 * Class PaginatorQo
 * @package App\Entity
 * @property int $currentPage
 * @property int $pageSize
 */
class PaginatorQo extends BaseEntity
{
    public function __construct($data = [])
    {
        parent::__construct($data);
        if (array_key_exists('page', $data)) {
            $this->currentPage = $data['page'];
        }
        if (array_key_exists('pageSize', $data)) {
            $this->pageSize = $data['pageSize'];
        }
    }
}