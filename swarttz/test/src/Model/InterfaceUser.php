<?php

namespace Swarttz\Test\Model;

interface InterfaceUser
{
    /*
    *  @return array
    */
    public function getAll(): array;

    /*
    *  @return array
    */
    public function findById($id): array;
}
