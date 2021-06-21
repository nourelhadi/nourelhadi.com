<?php

namespace Nourelhadi\Page\UseCase;

use App\Infrastructure\Repository\PageRepository;
use Nourelhadi\Page\Gateway\FormBuilderPostGateway;
use Nourelhadi\Tools\Data\CrudDataInterface;

class AddPage
{
    private PageRepository $pageRepository;

    private FormBuilderPostGateway $formBuilderPostGateway;

    public function __construct(PageRepository $pageRepository, FormBuilderPostGateway $formBuilderPostGateway)
    {
        $this->pageRepository = $pageRepository;
        $this->formBuilderPostGateway = $formBuilderPostGateway;
    }

    public function execute()
    {
        $postDataCrud = $this->formBuilderPostGateway->getCrudData();
        $this->formBuilderPostGateway->createForm('type', $postDataCrud->getEntity());
        $this->formBuilderPostGateway->handleRequester();
        if ($this->formBuilderPostGateway->isSubmitted() && $this->formBuilderPostGateway->isValid()) {

        }
    }
}