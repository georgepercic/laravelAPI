<?php

namespace App\Http\Controllers\Api;

use App\Tag;
use App\TagEntity;
use JWTAuth;
use App\Http\Controllers\ApiController;

class TagController extends ApiController
{
    public function __construct(Tag $tag)
    {
        parent::__construct($tag);
        $this->middleware('jwt.auth');
    }

    public function destroy($id) {
        //check if there is any entity assigned to tag
        $assignment = TagEntity::where('tag_id', $id)->first();

        if(!$assignment instanceof TagEntity) {
            $tag = new Tag();
            $tag->deleteData($id);

            return $this->response->send();
        }

        return $this->response->errorWrongArgs();
    }

    public function assignToEntity(array $data, $entity_id, $entity_model) {
        if (is_array($data) && !empty($data)) {
            try {
                $tag_entity = new TagEntity();
                foreach ($data as $tag_id) {
                    $tag_entity->tag_id = $tag_id;
                    $tag_entity->entity_id = $entity_id;
                    $tag_entity->entity_model = $entity_model;
                    $tag_entity->save();

                    //update tag count
                    $tag = Tag::find($tag_id);
                    $tag->entities_count = $tag->entities_count + 1;
                    $tag->save();
                }
                return $this->response->send();
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return $this->response->errorInternalError();
            }
        }
        return $this->response->errorWrongArgs();
    }

    public function deleteAssignment($tag_id, $entity_id) {

        $condition = ['tag_id'=> $tag_id, 'entity_id'=> $entity_id];
        try {
            TagEntity::where($condition)->delete();

            //update tag count
            $tag = Tag::find($tag_id);

            if ($tag->entities_count > 0)
            {
                $tag->entities_count = $tag->entities_count + 1;
                $tag->save();
            }

            return $this->response->send();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->response->errorInternalError();
        }
    }
}
