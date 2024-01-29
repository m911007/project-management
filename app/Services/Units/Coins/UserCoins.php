<?php

namespace App\Services\Units\Coins;

use App\Models\Badge;
use App\Models\User;

class UserCoins
{

    protected function userUpdateCoins(User $user, int $coins): bool
    {
        if ($coins == 0)
            return false;

        $user->coins = $user->coins + ($coins);
        $user->save();

        return true;
    }


    /**
     * getUserBadge
     *
     * @param  User $user
     * @return Badge
     */
    public function getUserBadge(User $user): Badge|null
    {
        $badge = Badge::where('min_coins', '<=', $user->coins)
            ->where('max_coins', '>', $user->coins)
            ->first();

        if (!$badge) {
            $badge = Badge::orderBy('max_coins', 'desc')->first();
        }

        if (!$badge) {
            $badge = Badge::factory()->create();
        }

        return $badge;
    }

}
