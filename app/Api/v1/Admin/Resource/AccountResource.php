<?php

declare(strict_types=1);

namespace App\Api\v1\Admin\Resource;

use App\Resource\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * @var array
     */
    private array $accounts;

    /**
     * @param array $accounts
     */
    public function __construct(array $accounts)
    {
        $this->accounts = $accounts;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];

        foreach ($this->accounts['data'] as $account) {
            array_push($result, $this->getData($account));
        }

        return $result;
    }

    /**
     * @param array $account
     *
     * @return array
     */
    protected function getData(array $account): array
    {
        return [
            'id'            => $account['id'],
            'name'          => $account['client_name'],
            'address1'      => $account['address1'],
            'address2'      => $account['address2'],
            'city'          => $account['city'],
            'state'         => $account['state'],
            'country'       => $account['country'],
            'zipCode'       => $account['zip'],
            'latitude'      => $account['latitude'],
            'longitude'     => $account['longitude'],
            'phoneNo1'      => $account['phone_no1'],
            'phoneNo2'      => $account['phone_no2'],
            'totalUser'     => [],
            'startValidity' => $account['start_validity'],
            'endValidity'   => $account['end_validity'],
            'status'        => $account['status'],
            'createdAt'     => $account['created_at'],
            'updatedAt'     => $account['updated_at'],
        ];
    }

    /**
     * @return array
     */
    public function getLinks(): array
    {
        return [
            'path'         => $this->accounts['path'],
            'firstPageUrl' => $this->accounts['first_page_url'],
            'lastPageUrl'  => $this->accounts['last_page_url'],
            'nextPageUrl'  => $this->accounts['next_page_url'],
            'prevPageUrl'  => $this->accounts['prev_page_url'],
        ];
    }

    /**
     * @return array
     */
    public function getMeta(): array
    {
        return [
            'currentPage' => $this->accounts['current_page'],
            'from'        => $this->accounts['from'],
            'lastPage'    => $this->accounts['last_page'],
            'perPage'     => $this->accounts['per_page'],
            'to'          => $this->accounts['to'],
            'total'       => $this->accounts['total'],
            'count'       => $this->accounts['per_page'],
        ];
    }
}
