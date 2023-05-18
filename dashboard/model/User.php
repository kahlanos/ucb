<?php

class User {

    public int $id;
    public string $nombre;
    public string $email;
    public string $password;
    public int $phone;
    public string $nCuenta;
    public int $rol;
    public string $encargado;
    public string $fechaAlta;
    public string $fechaBaja;
    public int $pagado;
    public array $reviews;

    function __construct($id, $nombre, $email, $password, $phone, $nCuenta, $rol, $fechaAlta, $pagado) {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->rol = $rol;
        $this->fechaAlta = $fechaAlta;
        $this->pagado = $pagado;
        $this->encargado = $encargado??'N/A';
        $this->fechaBaja = $fechaBaja??'N/A';

        if ($nCuenta == NULL) {
            $this->nCuenta = '';
        } else {
            $this->nCuenta = $nCuenta;
        }
        
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
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone(): int
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     */
    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of nCuenta
     */
    public function getNCuenta(): string
    {
        return $this->nCuenta;
    }

    /**
     * Set the value of nCuenta
     */
    public function setNCuenta(string $nCuenta): self
    {
        $this->nCuenta = $nCuenta;

        return $this;
    }

    /**
     * Get the value of rol
     */
    public function getRol(): int
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     */
    public function setRol(int $rol): self
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get the value of encargado
     */
    public function getEncargado(): string
    {
        return $this->encargado;
    }

    /**
     * Set the value of encargado
     */
    public function setEncargado(string $encargado): self
    {
        $this->encargado = $encargado;

        return $this;
    }

    /**
     * Get the value of fechaAlta
     */
    public function getFechaAlta(): string
    {
        return $this->fechaAlta;
    }

    /**
     * Set the value of fechaAlta
     */
    public function setFechaAlta(string $fechaAlta): self
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get the value of fechaBaja
     */
    public function getFechaBaja(): string
    {
        return $this->fechaBaja;
    }

    /**
     * Set the value of fechaBaja
     */
    public function setFechaBaja(string $fechaBaja): self
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get the value of pagado
     */
    public function getPagado(): int
    {
        return $this->pagado;
    }

    /**
     * Set the value of pagado
     */
    public function setPagado(int $pagado): self
    {
        $this->pagado = $pagado;

        return $this;
    }

    /**
     * Get the value of reviews
     */
    public function getReviews(): array
    {
        return $this->reviews;
    }

    /**
     * Set the value of reviews
     */
    public function setReviews(array $reviews): self
    {
        $this->reviews = $reviews;

        return $this;
    }
}

?>