<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180926144711 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE nota_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pago_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE impuesto_pago_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE recibo_de_caja_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE banco_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE impuesto_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE motivo_nota_credito_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cartera_log_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE glosa_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE edad_saldo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE nota (id INT NOT NULL, factura INT NOT NULL, monto DOUBLE PRECISION NOT NULL, motivo VARCHAR(255) NOT NULL, tipo VARCHAR(50) NOT NULL, descripcion VARCHAR(255) NOT NULL, activo BOOLEAN NOT NULL, cerrado BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE pago (id INT NOT NULL, recibo_de_caja_id INT NOT NULL, factura INT NOT NULL, monto DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F4DF5F3E6688FD41 ON pago (recibo_de_caja_id)');
        $this->addSql('CREATE TABLE impuesto_pago (id INT NOT NULL, impuesto_id INT NOT NULL, pago_id INT NOT NULL, porcentaje DOUBLE PRECISION NOT NULL, valor_porcentaje DOUBLE PRECISION NOT NULL, base_retencion DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_64DB24EAD23B6BE5 ON impuesto_pago (impuesto_id)');
        $this->addSql('CREATE INDEX IDX_64DB24EA63FB8380 ON impuesto_pago (pago_id)');
        $this->addSql('CREATE TABLE recibo_de_caja (id INT NOT NULL, banco_id INT NOT NULL, contrato VARCHAR(100) NOT NULL, monto DOUBLE PRECISION NOT NULL, descripcion VARCHAR(255) NOT NULL, cruzado BOOLEAN NOT NULL, activo BOOLEAN NOT NULL, cerrado BOOLEAN NOT NULL, fecha_movimiento TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, fecha_creacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3F5F8F69CC04A73E ON recibo_de_caja (banco_id)');
        $this->addSql('CREATE TABLE banco (id INT NOT NULL, nombre VARCHAR(50) NOT NULL, numero_cuenta VARCHAR(50) NOT NULL, activo BOOLEAN NOT NULL, fecha_creacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE impuesto (id INT NOT NULL, nombre VARCHAR(50) NOT NULL, porcentaje DOUBLE PRECISION NOT NULL, activo BOOLEAN NOT NULL, fecha_creacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE motivo_nota_credito (id INT NOT NULL, descripcion VARCHAR(255) NOT NULL, fecha_creacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE cartera_log (id INT NOT NULL, movimiento INT NOT NULL, tipo_movimiento VARCHAR(50) NOT NULL, usuario INT NOT NULL, accion BOOLEAN NOT NULL, fecha TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE glosa (id INT NOT NULL, factura INT NOT NULL, monto_revision DOUBLE PRECISION NOT NULL, monto_acordado DOUBLE PRECISION NOT NULL, porcentaje DOUBLE PRECISION NOT NULL, descripcion VARCHAR(255) NOT NULL, activo BOOLEAN NOT NULL, cerrado BOOLEAN NOT NULL, fecha_acuerdo TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE edad_saldo (id INT NOT NULL, intervalo_inicial INT NOT NULL, intervalo_final INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE pago ADD CONSTRAINT FK_F4DF5F3E6688FD41 FOREIGN KEY (recibo_de_caja_id) REFERENCES recibo_de_caja (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE impuesto_pago ADD CONSTRAINT FK_64DB24EAD23B6BE5 FOREIGN KEY (impuesto_id) REFERENCES impuesto (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE impuesto_pago ADD CONSTRAINT FK_64DB24EA63FB8380 FOREIGN KEY (pago_id) REFERENCES pago (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recibo_de_caja ADD CONSTRAINT FK_3F5F8F69CC04A73E FOREIGN KEY (banco_id) REFERENCES banco (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE impuesto_pago DROP CONSTRAINT FK_64DB24EA63FB8380');
        $this->addSql('ALTER TABLE pago DROP CONSTRAINT FK_F4DF5F3E6688FD41');
        $this->addSql('ALTER TABLE recibo_de_caja DROP CONSTRAINT FK_3F5F8F69CC04A73E');
        $this->addSql('ALTER TABLE impuesto_pago DROP CONSTRAINT FK_64DB24EAD23B6BE5');
        $this->addSql('DROP SEQUENCE nota_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pago_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE impuesto_pago_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE recibo_de_caja_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE banco_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE impuesto_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE motivo_nota_credito_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cartera_log_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE glosa_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE edad_saldo_id_seq CASCADE');
        $this->addSql('DROP TABLE nota');
        $this->addSql('DROP TABLE pago');
        $this->addSql('DROP TABLE impuesto_pago');
        $this->addSql('DROP TABLE recibo_de_caja');
        $this->addSql('DROP TABLE banco');
        $this->addSql('DROP TABLE impuesto');
        $this->addSql('DROP TABLE motivo_nota_credito');
        $this->addSql('DROP TABLE cartera_log');
        $this->addSql('DROP TABLE glosa');
        $this->addSql('DROP TABLE edad_saldo');
    }
}
