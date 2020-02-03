package com.example.restaurante.modelo;

public class Alimento {
    private int id_alimento, preco_alimento;
    private String nome_alimento;

    public Alimento(int id_alimento, String nome_alimento, int preco_alimento) {
        this.id_alimento = id_alimento;
        this.nome_alimento = nome_alimento;
        this.preco_alimento=preco_alimento;
    }

    //**************GETS*****************************
    public int getId_alimento() {
        return id_alimento;
    }

    public int getPreco_alimento() {
        return preco_alimento;
    }

    public String getNome_alimento() {
        return nome_alimento;
    }

    //**************SETS*****************************

    public void setId_alimento(int id_alimento) {
        this.id_alimento = id_alimento;
    }

    public void setPreco_alimento(int preco_alimento) {
        this.preco_alimento = preco_alimento;
    }

    public void setNome_alimento(String nome_alimento) {
        this.nome_alimento = nome_alimento;
    }
}
