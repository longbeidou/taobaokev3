<?php

namespace App\Services\PC;

use App\Services\Share\GuessYouLikeService;
use App\Repositories\Contracts\AlimamaRepositoryInterface;
use App\Services\WX\SearchService as Search;
use App\Services\Share\TpwdService;

class SearchService extends Search
{
    public $guessYouLike;
    public $alimama;
    public $tpwdService;

    public function __construct(GuessYouLikeService $guess, AlimamaRepositoryInterface $alimama, TpwdService $tpwd)
    {
        $this->guessYouLike = $guess;
        $this->alimama = $alimama;
        $this->tpwdService = $tpwd;
    }
}
