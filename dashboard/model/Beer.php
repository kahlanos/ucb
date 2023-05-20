<?php


class Beer {

    public int $id;
    public string $nombre;
    public string $estilo;
    public string $descripcion;
    public string $fecha_fabric;
    public string $fecha_distrib;
    public string $consumo_pref;
    public float $alcohol;
    public int $temp_guardado;
    public int $ibus;
    public string $img_tapon;
    public string $img_botella;
    public string $detalles;


    function __construct($id, $nombre, $estilo, $descripcion, $fecha_fabric, $fecha_distrib, $consumo_pref, $alcohol, $temp_guardado, $ibus, $img_tapon, $img_botella, $detalles) {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->estilo = $estilo;
        $this->descripcion = $descripcion;
        $this->fecha_fabric = $fecha_fabric;
        $this->fecha_distrib = $fecha_distrib ?? 'N/A';
        $this->consumo_pref = $consumo_pref;
        $this->alcohol = $alcohol;
        $this->temp_guardado = $temp_guardado;
        $this->ibus = $ibus;
        $this->img_tapon = $img_tapon ?? '';
        $this->img_botella = $img_botella ?? '';
        $this->detalles = $detalles ?? '';

    }




    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of estilo
     */
    public function getEstilo(): string
    {
        return $this->estilo;
    }

    /**
     * Set the value of estilo
     */
    public function setEstilo(string $estilo): self
    {
        $this->estilo = $estilo;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of fecha_fabric
     */
    public function getFechaFabric(): string
    {
        return $this->fecha_fabric;
    }

    /**
     * Set the value of fecha_fabric
     */
    public function setFechaFabric(string $fecha_fabric): self
    {
        $this->fecha_fabric = $fecha_fabric;

        return $this;
    }

    /**
     * Get the value of fecha_distrib
     */
    public function getFechaDistrib(): string
    {
        return $this->fecha_distrib;
    }

    /**
     * Set the value of fecha_distrib
     */
    public function setFechaDistrib(string $fecha_distrib): self
    {
        $this->fecha_distrib = $fecha_distrib;

        return $this;
    }

    /**
     * Get the value of consumo_pref
     */
    public function getConsumoPref(): string
    {
        return $this->consumo_pref;
    }

    /**
     * Set the value of consumo_pref
     */
    public function setConsumoPref(string $consumo_pref): self
    {
        $this->consumo_pref = $consumo_pref;

        return $this;
    }

    /**
     * Get the value of alcohol
     */
    public function getAlcohol(): float
    {
        return $this->alcohol;
    }

    /**
     * Set the value of alcohol
     */
    public function setAlcohol(float $alcohol): self
    {
        $this->alcohol = $alcohol;

        return $this;
    }

    /**
     * Get the value of temp_guardado
     */
    public function getTempGuardado(): int
    {
        return $this->temp_guardado;
    }

    /**
     * Set the value of temp_guardado
     */
    public function setTempGuardado(int $temp_guardado): self
    {
        $this->temp_guardado = $temp_guardado;

        return $this;
    }

    /**
     * Get the value of ibus
     */
    public function getIbus(): int
    {
        return $this->ibus;
    }

    /**
     * Set the value of ibus
     */
    public function setIbus(int $ibus): self
    {
        $this->ibus = $ibus;

        return $this;
    }

    /**
     * Get the value of img_tapon
     */
    public function getImgTapon(): string
    {
        return $this->img_tapon;
    }

    /**
     * Set the value of img_tapon
     */
    public function setImgTapon(string $img_tapon): self
    {
        $this->img_tapon = $img_tapon;

        return $this;
    }

    /**
     * Get the value of img_botella
     */
    public function getImgBotella(): string
    {
        return $this->img_botella;
    }

    /**
     * Set the value of img_botella
     */
    public function setImgBotella(string $img_botella): self
    {
        $this->img_botella = $img_botella;

        return $this;
    }

    /**
     * Get the value of detalles
     */
    public function getDetalles(): string
    {
        return $this->detalles;
    }

    /**
     * Set the value of detalles
     */
    public function setDetalles(string $detalles): self
    {
        $this->detalles = $detalles;

        return $this;
    }
}