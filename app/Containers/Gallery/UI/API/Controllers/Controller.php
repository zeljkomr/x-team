<?php

namespace App\Containers\Gallery\UI\API\Controllers;

use App\Containers\Gallery\UI\API\Requests\CreateGalleryRequest;
use App\Containers\Gallery\UI\API\Requests\DeleteGalleryRequest;
use App\Containers\Gallery\UI\API\Requests\GetAllGalleriesRequest;
use App\Containers\Gallery\UI\API\Requests\FindGalleryByIdRequest;
use App\Containers\Gallery\UI\API\Requests\UpdateGalleryRequest;
use App\Containers\Gallery\UI\API\Transformers\GalleryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Gallery\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateGalleryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createGallery(CreateGalleryRequest $request)
    {
        $gallery = Apiato::call('Gallery@CreateGalleryAction', [$request]);

        return $this->created($this->transform($gallery, GalleryTransformer::class));
    }

    /**
     * @param FindGalleryByIdRequest $request
     * @return array
     */
    public function findGalleryById(FindGalleryByIdRequest $request)
    {
        $gallery = Apiato::call('Gallery@FindGalleryByIdAction', [$request]);

        return $this->transform($gallery, GalleryTransformer::class);
    }

    /**
     * @param GetAllGalleriesRequest $request
     * @return array
     */
    public function getAllGalleries(GetAllGalleriesRequest $request)
    {
        $galleries = Apiato::call('Gallery@GetAllGalleriesAction', [$request]);

        return $this->transform($galleries, GalleryTransformer::class);
    }

    /**
     * @param UpdateGalleryRequest $request
     * @return array
     */
    public function updateGallery(UpdateGalleryRequest $request)
    {
        $gallery = Apiato::call('Gallery@UpdateGalleryAction', [$request]);

        return $this->transform($gallery, GalleryTransformer::class);
    }

    /**
     * @param DeleteGalleryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteGallery(DeleteGalleryRequest $request)
    {
        Apiato::call('Gallery@DeleteGalleryAction', [$request]);

        return $this->noContent();
    }
}
