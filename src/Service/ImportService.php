<?php

namespace App\Service;

use App\Entity\CourantMusical;
use App\Entity\Music;
use App\Entity\Musician;
use App\VO\MusicVO;
use Doctrine\ORM\EntityManagerInterface;

class ImportService
{
    const DEFAULT_VALUE_FIRST_COLUMN = "Nom du groupe";

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function import(array $data)
    {
        $musics = [];
        foreach ($data as $d) {
            if ($d[0] !== self::DEFAULT_VALUE_FIRST_COLUMN) {
                $musics[] = (new MusicVO())->hydrate($d);
            }
        }

        /** @var MusicVO $music */
        foreach ($musics as $music) {
            $musicEntity = new Music();
            $musicEntity->setName($music->getName());
            $musicEntity->setOrigin($music->getOrigin());
            $musicEntity->setCity($music->getCity());
            $musicEntity->setMembers($music->getMembers());
            $musicEntity->setStart($music->getStart());
            $musicEntity->setSeparation($music->getSeparation());
            $musicEntity->setSummary($music->getDescription());

            $musician = new Musician();
            $musician->setName($music->getFondateurs());

            $this->entityManager->persist($musician);
            $musicEntity->setFondator($musician);

            $musicEntity->setCourantMusical($this->getCourantMusical($music->getCourantMusical()));

            $this->entityManager->persist($musicEntity);
        }

        $this->entityManager->flush();
    }

    private function getCourantMusical(string $name): CourantMusical
    {
        $courantMusical = $this->entityManager->getRepository(CourantMusical::class)->findOneBy(['name' => $name]);

        if (is_null($courantMusical)) {
            $courantMusical = new CourantMusical();
            $courantMusical->setName($name);
            $this->entityManager->persist($courantMusical);

            return $courantMusical;
        }

        return $courantMusical;
    }
}
