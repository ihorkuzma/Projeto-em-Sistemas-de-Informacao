package com.example.restaurante.modelo;

public class Reserva {
    private int id_reserva, pessoas_reserva, cliente_id;
    private String data_reserva;

    public Reserva(int id_reserva, int pessoas_reserva, int cliente_id, String data_reserva){
        this.id_reserva=id_reserva;
        this.pessoas_reserva=pessoas_reserva;
        this.cliente_id=cliente_id;
        this.data_reserva=data_reserva;
    }

    //**************GETS*****************************

    public int getId_reserva() {
        return id_reserva;
    }

    public int getPessoas_reserva() {
        return pessoas_reserva;
    }

    public String getData_reserva() {
        return data_reserva;
    }

    //**************SETS*****************************


    public void setId_reserva(int id_reserva) {
        this.id_reserva = id_reserva;
    }

    public void setPessoas_reserva(int pessoas_reserva) {
        this.pessoas_reserva = pessoas_reserva;
    }

    public void setData_reserva(String data_reserva) {
        this.data_reserva = data_reserva;
    }

    public int getCliente_id() {
        return cliente_id;
    }

    public void setCliente_id(int cliente_id) {
        this.cliente_id = cliente_id;
    }
}
