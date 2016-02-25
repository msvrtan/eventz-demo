<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160225114131 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE TicketType (id INT AUTO_INCREMENT NOT NULL, event INT DEFAULT NULL, name VARCHAR(255) NOT NULL, ticketsSoldCounter INT NOT NULL, ticketsAvailableCounter INT NOT NULL, ticketsWantedCounter INT NOT NULL, UNIQUE INDEX UNIQ_2DA339115E237E06 (name), INDEX IDX_2DA339113BAE0AA7 (event), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE TicketType ADD CONSTRAINT FK_2DA339113BAE0AA7 FOREIGN KEY (event) REFERENCES Event (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE TicketType');
    }
}
