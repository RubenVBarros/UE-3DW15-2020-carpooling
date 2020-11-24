<?php

namespace App\Services;

use App\Entities\AnnonceComments;

class AnnonceCommentsService
{
    /**
     * Create or update an Annonce.
     */
    public function setAnnonceComments(?int $id, int $idAnnonce, int $idUser, string $comment): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        
        if (empty($id)) {
            $isOk = $dataBaseService->createAnnonceComments($idAnnonce, $idUser, $comment);
        } else {
            $isOk = $dataBaseService->updateAnnonceComments($id, $idAnnonce, $idUser, $comment);
        }

        return $isOk;
    }

    /**
     * Return all Annonce.
     */
    public function getAnnonceComments(): array
    {
        $comments = [];

        $dataBaseService = new DataBaseService();
        $commentsDTO = $dataBaseService->getAnnonceComments();
        if (!empty($commentsDTO)) {
            foreach ($commentsDTO as $commentDTO) {
                $comment = new AnnonceComments();
                $comment->setId($commentDTO['id']);
                $comment->setComment($commentDTO['comments']);

                
                
                $comment->setIdAnnonce($commentDTO['idAnnonce']);
                $comment->setIdUser($commentDTO['idUser']);
                $comments[] = $comment;
            }
        }

        return $comments;
    }

    /**
     * Delete an Annonce.
     */
    public function deleteAnnonceComments(int $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAnnonceComments($id);

        return $isOk;
    }
}
