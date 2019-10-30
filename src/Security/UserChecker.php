<?php
namespace Bolt\Security;


use Bolt\Entity\User;
use Bolt\Exception\DisabledUserLoginAttemptException;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{
    public function checkPostAuth(UserInterface $user)
    {
        if (!$user instanceof User) {
            return;
        }
        if ($user->isDisabled()) {
            throw new DisabledUserLoginAttemptException();
        }
    }

    /**
     * Checks the user account before authentication.
     *
     * @throws AccountStatusException
     */
    public function checkPreAuth(UserInterface $user)
    {
    }
}
