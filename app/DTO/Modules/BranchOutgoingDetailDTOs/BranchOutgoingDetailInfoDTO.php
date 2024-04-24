<?php

namespace App\DTO\Modules\BranchOutgoingDetailDTOs;

class BranchOutgoingDetailInfoDTO {
    public function __construct(
        public int $id,
        public int $delivered_qty,
        public ?string $verified_at,
        public string $verified_status,

        public int $branch_outgoing_id,

        public int $item_id,
        public string $jenis_item,
        public string $kode_item,

        public int $branch_from_id,
        public int $branch_to_id,

        public int $verified_by,
        public string $verified_by_nama,
    ) {}

    public function getId(): int {
        return $this->id;
    }

    public function getDeliveredQty(): int {
        return $this->delivered_qty;
    }

    public function getVerifiedAt(): ?string {
        return $this->verified_at;
    }

    public function getVerifiedStatus(): string {
        return $this->verified_status;
    }

    public function getBranchOutgoingId(): int {
        return $this->branch_outgoing_id;
    }

    public function getItemId(): int {
        return $this->item_id;
    }

    public function getJenisItem(): string {
        return $this->jenis_item;
    }

    public function getKodeItem(): string {
        return $this->kode_item;
    }

    public function getBranchFromId(): int {
        return $this->branch_from_id;
    }

    public function getBranchToId(): int {
        return $this->branch_to_id;
    }

    public function getVerifiedBy(): int {
        return $this->verified_by;
    }

    public function getVerifiedByNama(): string {
        return $this->verified_by_nama;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setDeliveredQty(int $delivered_qty): void {
        $this->delivered_qty = $delivered_qty;
    }

    public function setVerifiedAt(string $verified_at): void {
        $this->verified_at = $verified_at;
    }

    public function setVerifiedStatus(string $verified_status): void {
        $this->verified_status = $verified_status;
    }

    public function setBranchOutgoingId(int $branch_outgoing_id): void {
        $this->branch_outgoing_id = $branch_outgoing_id;
    }

    public function setItemId(int $item_id): void {
        $this->item_id = $item_id;
    }

    public function setJenisItem(string $jenis_item): void {
        $this->jenis_item = $jenis_item;
    }

    public function setKodeItem(string $kode_item): void {
        $this->kode_item = $kode_item;
    }

    public function setBranchFromId(int $branch_from_id): void {
        $this->branch_from_id = $branch_from_id;
    }

    public function setBranchToId(int $branch_to_id): void {
        $this->branch_to_id = $branch_to_id;
    }

    public function setVerifiedBy(int $verified_by): void {
        $this->verified_by = $verified_by;
    }

    public function setVerifiedByNama(string $verified_by_nama): void {
        $this->verified_by_nama = $verified_by_nama;
    }
}

?>
