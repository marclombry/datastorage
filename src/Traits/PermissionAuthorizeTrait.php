<?php

namespace App\Traits;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait PermissionAuthorizeTrait
{

    /**
     * @return \string[][]
     */
    public function getLevelPermission(): array
    {
        return [
            'e3' => ['ROLE_NIV3'],
            '02' => ['ROLE_NIV2'],
            'e1' => ['ROLE_NIV1']
        ];
    }

    /**
     * @param array $request
     * @return array
     */
    public function getRoles(array $request)
    {
        $roles = [];
        foreach ($request as $paramGet)
        {
            if($paramGet == 'e3' || $paramGet == '02' || $paramGet == 'e1')
            {
               $roles[] = $this->getLevelPermission()[$paramGet][0];
            }
        }
        return $roles;
    }

    /**
     * @param string $api_permission
     * @return bool
     */
    public function isLevelPermisson(string $api_permission)
    {
        return !in_array($api_permission, $this->getLevelPermission());
    }

    // detect if request method equal roles permission

    /**
     * @param array $roles
     * @return bool
     */
    public function isAuthorizeLevel(array $roles)
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        return in_array($method,$this->getPermissionByRole($roles[0]));
    }

    // detect if token key exist in uri and equal a key env

    /**
     * @param array $get
     * @return bool
     */
    public function isDetectedTokenAndAuthorizeGetVariable(array $get)
    {
        return !empty(array_intersect_key(array_flip($get),$this->getLevelPermission()));
    }

    /**
     * @param $role
     * @return array|string[]
     */
    public function getPermissionByRole($role): array
    {
        switch ($role)
        {
            case str_contains("ROLE_NIV3", $role):
                return ['POST','GET','PUT','PATCH','DELETE'];
            case str_contains("ROLE_NIV2", $role):
                return ['POST','GET'];
            case str_contains("ROLE_NIV1", $role):
                return ['GET'];
            default:
                return [];

        }
    }

    /**
     * @return void
     */
    public function canAction(): void
    {
        $request = $this->requestStack->getCurrentRequest();
        $listGetVariable = $request->query->keys();
        $roles = $this->getRoles($listGetVariable);

        if(!$this->isDetectedTokenAndAuthorizeGetVariable($listGetVariable) || !$this->isAuthorizeLevel($roles))
        {
            throw new NotFoundHttpException();
        }
    }

}