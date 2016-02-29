<?php
namespace Resources\Behat;

use Behat\Behat\Hook\Scope\BeforeScenarioScope;

/**
 * Class CleanDbTrait.
 */
trait CleanDbTrait
{
    protected function cleanDb()
    {
        $em            = $this->getEntityManager();
        $orderedTables = ['Events', 'TicketTypes'];

        $em->getConnection()->executeUpdate('SET foreign_key_checks = 0;');
        $platform = $em->getConnection()->getDatabasePlatform();
        foreach ($orderedTables as $tbl) {
            $em->getConnection()->executeUpdate($platform->getTruncateTableSQL($tbl, true));
        }
        $em->getConnection()->executeUpdate('SET foreign_key_checks = 1;');
    }
}
