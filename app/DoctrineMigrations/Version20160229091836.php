<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160229091836 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE WantedTickets (id INT AUTO_INCREMENT NOT NULL, event INT DEFAULT NULL, ticketsNeeded INT NOT NULL, maximumPricePerTicket INT NOT NULL, maximumPricePerTicketCurrency VARCHAR(255) NOT NULL, notificationEmail VARCHAR(255) NOT NULL, ticketType INT DEFAULT NULL, INDEX IDX_71B8DEAC3BAE0AA7 (event), INDEX IDX_71B8DEAC62FE3AC1 (ticketType), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE WantedTickets ADD CONSTRAINT FK_71B8DEAC3BAE0AA7 FOREIGN KEY (event) REFERENCES Events (id)');
        $this->addSql('ALTER TABLE WantedTickets ADD CONSTRAINT FK_71B8DEAC62FE3AC1 FOREIGN KEY (ticketType) REFERENCES TicketTypes (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE WantedTickets');
    }
}
