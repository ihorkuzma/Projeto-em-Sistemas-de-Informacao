package com.example.restaurante.modelo;

public class Cliente {
    private int id;
    private String nome, telemovel, morada;

    public Cliente(int id, String nome, String telemovel, String morada) {
        this.id=id;
        this.telemovel = telemovel;
        this.nome = nome;
        this.morada = morada;
    }

    public String getTelemovel() {
        return telemovel;
    }

    public void setTelemovel(String telemovel) {
        this.telemovel = telemovel;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getMorada() {
        return morada;
    }

    public void setMorada(String morada) {
        this.morada = morada;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }
}
