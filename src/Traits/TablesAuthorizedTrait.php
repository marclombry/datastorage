<?php
namespace App\Traits;
trait TablesAuthorizedTrait
{
    public function getTablesAuthorized(): array
    {
        return [
            'badge',
            'categorie',
            'commercial',
            'communication',
            'contact',
            'courrier',
            'departement',
            'document',
            'documentdetail',
            'langue',
            'lieu',
            'liste',
            'listesimple',
            'message',
            'message_document',
            'message_piece',
            'mobilier',
            'modereglement',
            'pays',
            'piece',
            'produit',
            'relance',
            'salon',
            'societe',
            'texte',
            'tva',
        ];
    }

    private function isAuthorized(string $table)
    {
        return in_array($table,$this->getTablesAuthorized());
    }
}