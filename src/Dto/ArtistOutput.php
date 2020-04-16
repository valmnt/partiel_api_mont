<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;

final class ArtistOutput
{
    /**
     * @Groups("artist_read")
     */
    public $id;

    /**
     * @Groups("artist_read")
     */
    public $name;

    /**
     * @Groups("artist_read")
     */
    public $startYear;

    /**
     * @Groups("artist_read")
     */
    public $nbAlbums;

    /**
     * @Groups("artist_read")
     */
    public $nbFans;

    /**
     * @Groups("artist_read")
     */
    public $styles;
}
