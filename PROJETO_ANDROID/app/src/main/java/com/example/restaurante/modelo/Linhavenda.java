package com.example.restaurante.modelo;

public class Linhavenda {
    private int id_linhavenda, quantidade_linhavenda;
    private String nome_alimento;

    public Linhavenda(int id_linhavenda, int quantidade_linhavenda, String nome_alimento){
        this.id_linhavenda=id_linhavenda;
        this.quantidade_linhavenda=quantidade_linhavenda;
        this.nome_alimento=nome_alimento;

    }

    public String getNome_alimento() {
        return nome_alimento;
    }

    public void setNome_alimento(String nome_alimento) {
        this.nome_alimento = nome_alimento;
    }
//**************GETS*****************************

    public int getId_linhavenda() {
        return id_linhavenda;
    }

    public int getQuantidade_linhavenda() {
        return quantidade_linhavenda;
    }

    //**************SETS*****************************

    public void setId_linhavenda(int id_linhavenda) {
        this.id_linhavenda = id_linhavenda;
    }

    public void setQuantidade_linhavenda(int quantidade_linhavenda) {
        this.quantidade_linhavenda = quantidade_linhavenda;
    }
}
